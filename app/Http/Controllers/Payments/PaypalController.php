<?php

namespace App\Http\Controllers\Payments;

use App\Constants;
use PayPal\Api\Item;
use App\Models\Order;
use App\Models\Payment as PayPalPayment;
use PayPal\Api\Payer;
use App\Http\Requests;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use App\Http\Controllers\Controller;
use PayPal\Auth\OAuthTokenCredential;

class PaypalController extends Controller
{
    private $_api_context;

    public function __construct()
    {
        $this->_api_context = new ApiContext(new OAuthTokenCredential(config('paypal.client_id'), config('paypal.secret')));
        $this->_api_context->setConfig(config('paypal.settings'));
    }

    public function create(Request $request, Order $order)
    {
        if ($order->user_id != auth()->user()->id) {
            abort(403);
        }

        if ($order->status_id != Constants::ORDER_STATUS_UNPAID) {
            return redirect()
                ->back()
                ->withError('Order tidak tersedia untuk pembayaran');
        }

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $items = [];
        $n = 1;
        foreach ($order->items as $item) {
            $items[$n] = new Item();
            $items[$n]->setName($item->product->name)
                ->setCurrency('USD')
                ->setQuantity($item->qty)
                ->setPrice($item->price / config('paypal.idr_to_usd_rate'));

            $n++;
        }

        $item_list = new ItemList();
        $item_list->setItems($items);

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($order->total_price / config('paypal.idr_to_usd_rate'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Pembayaran untuk order #'. $order->number .' di MJ Shop');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(route('payments.paypal.callback'))
            ->setCancelUrl(route('payments.paypal.callback'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (config('app.debug')) {
                return redirect()
                    ->back()
                    ->with('error', 'Sepertinya terjadi masalah koneksi...');
            } else {
                return redirect()
                    ->back()
                    ->with('error', 'Upps.. Terjadi kesalahan teknis. Silahkan coba kembali');
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        session(['paypal_payment_id' => $payment->getId()]);
        session(['order' => $order]);

        if(isset($redirect_url)) {
            return redirect()
                ->to($redirect_url);
        }

        return redirect()
            ->back()
            ->with('error', 'Suatu kesalahan tidak terduga terjadi. Mohon ulangi kembali.');
    }

    public function callback(Request $request)
    {
        $payment_id = session()->get('paypal_payment_id');
        $order = session()->get('order');

        session()->forget('paypal_payment_id');

        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            return redirect()
                ->to(route('orders.show', $order->id))
                ->withError('Pembayaran gagal. Terjadi kesalahan teknis');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == Constants::PAYPAL_PAYMENT_APPROVED) {
            $payPalPayment = new payPalPayment();
            $payPalPayment->number = generatePaymentNumber();
            $payPalPayment->order_id = $order->id;
            $payPalPayment->payment_method_id = Constants::PAYMENT_METHOD_PAYPAL;
            $payPalPayment->status = Constants::PAYMENT_STATUS_APPROVED;
            $payPalPayment->total = $order->total_price;
            $payPalPayment->save();

            $payPalPaymentData = [
                'rate' => config('paypal.idr_to_usd_rate'),
                'idr_price' => $order->total_price,
                'usd_price' => clearPrice($result->transactions[0]->amount->total),
                'paypal_payment_id' => $payment_id,
                'state' => $result->getState(),
                'paypal_cart_id' => $result->getCart()
            ];

            $paypal = $payPalPayment->paypal()->create($payPalPaymentData);

            $payerData = [
                'payer_id' => $result->getPayer()->getPayerInfo()->getPayerId(),
                'method' => $result->getPayer()->getPaymentMethod(),
                'status' => $result->getPayer()->getStatus(),
                'email' => $result->getPayer()->getPayerInfo()->getEmail(),
                'first_name' => $result->getPayer()->getPayerInfo()->getFirstName(),
                'last_name' => $result->getPayer()->getPayerInfo()->getLastName(),
                'last_name' => $result->getPayer()->getPayerInfo()->getLastName(),
            ];

            $paypal->payer()->create($payerData);

            $order->status_id = Constants::ORDER_STATUS_ON_PROCESS;
            $order->save();

            return redirect()
                ->to(route('payments.success'))
                ->with('payment', $payPalPayment)
                ->withSuccess('Berhasil melakukan pembayaran');
        }

        return redirect()
            ->to(route('orders.show', $order->id))
            ->withError('Pembayaran gagal. Terjadi kesalahan teknis');
    }
}

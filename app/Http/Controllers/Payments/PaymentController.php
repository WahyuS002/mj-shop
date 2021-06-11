<?php

namespace App\Http\Controllers\Payments;

use App\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConfirmPaymentRequest;
use App\Models\Bank;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::whereHas('order', function ($query) {
            return $query->where('user_id', auth()->user()->id);
        })->get();

        return view('public.user.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = Bank::all();
        $orders = Order::where(['user_id' => auth()->user()->id, 'status_id' => getConstants()::ORDER_STATUS_UNPAID])->get();

        return view('public.user.payments.create', compact('banks', 'orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConfirmPaymentRequest $request)
    {
        $request->validated();

        $order = Order::findOrFail($request->order_id);

        if ($order->user_id != auth()->user()->id) {
            abort(404);
        }

        $payment = new Payment();
        $payment->number = generatePaymentNumber();
        $payment->order_id = $request->order_id;
        $payment->payment_method_id = Constants::PAYMENT_METHOD_BANK;
        $payment->status = Constants::PAYMENT_STATUS_WAITING_FOR_CONFIRMATION;
        $payment->total = clearPrice($request->transfer_amount);
        $payment->save();

        $bankPayment = [
            'bank_id' => $request->bank_id,
            'sender_name' => $request->sender_name,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'transfer_amount' => $request->transfer_amount
        ];

        $payment->bank()->create($bankPayment);

        if ($request->has('picture') && $request->file('picture')->isValid()) {
            $payment->addMediaFromRequest('picture')
                ->toMediaCollection('payment_pictures');
        }

        $order->status_id = Constants::ORDER_STATUS_WAITING_FOR_CONFIRMATION;
        $order->save();

        session(['order' => $order]);
        session(['payment' => $payment]);

        return redirect()
            ->to(route('payments.success'))
            ->withSuccess('Berhasil mengirim konfirmasi pembayaran. Kami akan memeriksa segera');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('public.user.payments.show', compact('payment'));
    }

    public function success()
    {
        $order = session()->get('order');
        $payment = session()->get('payment');

        if (!session()->has('order')) {
            return redirect()
                ->to(route('orders.index'))
                ->withSuccess('Terima kasih telah melakukan pembayaran!');
        }

        session()->forget(['order', 'payment']);

        return view('public.user.payments.success', compact('order', 'payment'));
    }
}

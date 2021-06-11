<?php

namespace App\Http\Controllers\Admin;

use App\Constants;
use App\Http\Controllers\Controller;
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
        $payments = Payment::with(['paypal', 'paymentStatus', 'method', 'order'])->latest()->paginate();

        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('admin.payments.show', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $action = $request->action;

        if (!in_array($action, ['accept', 'decline'])) {
            abort(404);
        }

        $order = Order::findOrFail($payment->order_id);

        if ($action == 'accept') {
            $payment->status = Constants::PAYMENT_STATUS_APPROVED;
            $payment->save();

            $message = 'Berhasil menerima pembayaran';

            $order->status_id = Constants::ORDER_STATUS_ON_PROCESS;
            $order->save();
        }
        else if ($action == 'decline') {
            $payment->status = Constants::PAYMENT_STATUS_FAILED;
            $payment->save();

            $message = 'Berhasil menolak pembayaran, order telah dibatalkan.';

            $order->status_id = Constants::ORDER_STATUS_CANCELLED;
            $order->save();

            $cancellations = [
                'user_id' => auth()->user()->id,
                'reason' => 'Data pembayaran tidak ditemukan'
            ];

            $order->cancellations()->create($cancellations);
        }

        return redirect()
            ->back()
            ->withSuccess($message);
    }
}

<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function success()
    {
        $order = session()->get('order');
        $payment = session()->get('payment');

        if ( ! session()->has('order')) {
            return redirect()
                ->to(route('orders.index'))
                ->withSuccess('Terima kasih telah melakukan pembayaran!');
        }

        session()->forget(['order', 'payment']);

        return view('public.user.payments.success', compact('order', 'payment'));
    }
}

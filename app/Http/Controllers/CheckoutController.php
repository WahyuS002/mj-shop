<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Models\Order;
use App\Models\Address;
use App\Models\Order_item;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function create()
    {
        $address = Address::where(['user_id' => auth()->user()->id, 'is_primary' => TRUE])->first();
        $carts = Cart::content();
        $count = Cart::count();
        $subtotal = Cart::total();

        return view('public.shop.checkout', compact('address', 'carts', 'count', 'subtotal'));
    }

    public function store(Request $request)
    {
        $carts = Cart::content();

        $order = new Order();
        $order->status_id = Constants::ORDER_STATUS_UNPAID;
        $order->user_id = auth()->user()->id;
        $order->number = generateOrderNumber();
        $order->total_items = Cart::count();
        $order->total_price = clearPrice(Cart::total());
        $order->notes = $request->notes;
        $order->save();

        $n = 0;
        foreach ($carts as $cart) {
            $items[$n] = [
                'order_id' => $order->id,
                'product_id' => ($cart->options->has('product_id') ? $cart->options->product_id : null),
                'qty' => $cart->qty,
                'price' => $cart->price
            ];

            $n++;
        }

        Order_item::insert($items);
        $order->address()->create($request->address);

        Cart::destroy();

        $request->session()->flash('orderId', $order->id);

        return redirect()
            ->to(route('checkout.success'))
            ->withSuccess('Berhasil membuat order baru');
    }

    public function success()
    {
        return view('public.shop.order-success');
    }
}

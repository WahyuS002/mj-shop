<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Models\Order;
use App\Models\Address;
use App\Models\Order_item;
use App\Models\Province;
use App\Models\Shipping_courier;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function create()
    {
        $address = Address::where(['user_id' => auth()->user()->id, 'is_primary' => TRUE])->first();
        $carts = Cart::content();
        $count = Cart::count();
        $provinces = Province::orderBy('name', 'ASC')->get();
        $subtotal = Cart::total();

        return view('public.shop.checkout', compact('address', 'carts', 'count', 'provinces', 'subtotal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'courier' => 'required'
        ], ['courier.required' => 'Silahkan pilih kurir pengiriman. Pilih provinsi dan kota / kabupaten terlebih dahulu.']);

        $carts = Cart::content();
        $courier = json_decode($request->courier);

        $order = new Order();
        $order->status_id = Constants::ORDER_STATUS_UNPAID;
        $order->user_id = auth()->user()->id;
        $order->number = generateOrderNumber();
        $order->total_items = Cart::count();
        $order->total_price = clearPrice(Cart::total());
        $order->shipment_cost = $courier->cost->cost[0]->value;
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

        $courierData = Shipping_courier::where('code', $courier->code)->first();
        $orderCourier = [
            'courier_id' => $courierData->id,
            'province_id' => $request->province_id,
            'city_id' => $request->address['city_id'],
            'service' => $courier->cost->description,
            'cost' => $courier->cost->cost[0]->value,
            'estimation_day' => $courier->cost->cost[0]->etd
        ];

        $order->courier()->create($orderCourier);

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

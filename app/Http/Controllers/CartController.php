<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::content();
        $count = Cart::count();
        $total = Cart::total();

        $hasCart = ($count > 0);

        return view('public.shop.cart', compact('carts', 'count', 'hasCart', 'total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        $request->validated();

        $qty = $request->qty;
        $product_id = $request->product_id;
        $id = md5(time());

        $product = Product::findOrFail($product_id);

        Cart::add($id, $product->name, $qty, ($product->price - $product->discount));

        return redirect()
            ->to(route('cart.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $items = $request->items;
        $delete_items = $request->_delete_cart_id;

        foreach ($items as $rowId => $val) {
            $qty = $val['qty'];

            Cart::update($rowId, $qty);
        }

        if ( ! empty($delete_items)) {
            $delete_items = explode(',', $delete_items);

            if (is_array($delete_items) && count($delete_items) > 0) {
                foreach ($delete_items as $item) {
                    Cart::remove($item);
                }
            }
        }

        return redirect()
            ->back()
            ->withSuccess('Berhasil memperbarui keranjang belanja');
    }
}

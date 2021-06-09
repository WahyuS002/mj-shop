@extends('layouts.public')
@section('title', 'Order Berhasil!')

@section('content')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <span>Order Berhasil!</span>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="text-align: center !important">
                <div>
                    <img src="{{ asset('assets/illustrations/order_confirmed.svg') }}" alt="Order Berhasil" style="width: 35%">
                </div>
                <h3 class="text-success mt-5">Order Berhasil!</h3>

                <p class="mt-3">
                    Order kamu berhasil diterima. Silahkan lakukan pembayaran supaya order dapat segera diproses.
                </p>

                <div class="cart__btn">
                    <a href="{{ route('orders.show', session()->get('orderId')) }}">Lihat Order</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

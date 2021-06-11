@extends('layouts.public')
@section('title', 'Pembayaran Berhasil!')

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="">Pembayaran</a>
                        <span>Pembayaran Berhasil</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__content">
                        <div class="blog__details__item">
                            <img src="img/blog/details/blog-details.jpg" alt="">
                        </div>

                        <div class="blog__details__desc text-center">
                            <div>
                                <img src="{{ asset('assets/illustrations/order_confirmed.svg') }}"
                                    alt="Pembayaran Berhasil" style="width: 40%">
                            </div>

                            <h3 class="mt-5 mb-2 text-success"><strong>Pembayaran Berhasil!</strong></h3>

                            <p>Pembayaran Anda berhasil kami terima. Kami akan segera memproses order ini.</p>

                            <div class="cart__btn">
                                <a href="{{ route('orders.show', $order->id) }}">Lihat Order</a>
                                <a href="{{ route('payments.show', $payment->id) }}">Lihat Pembayaran</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

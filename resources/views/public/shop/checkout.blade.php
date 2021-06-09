@extends('layouts.public')
@section('title', 'Checkout')

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout spad">
        <div class="container">

            <form action="{{ route('checkout.store') }}" method="POST" class="checkout__form">
                @csrf

                <div class="row">
                    <div class="col-lg-8">
                        <h5>Alamat Pengiriman</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Nama Lengkap <span>*</span></p>
                                    <input type="text" name="address[full_name]"
                                        value="{{ optional($address)->full_name }}" placeholder="Nama lengkap penerima"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>No. HP <span>*</span></p>
                                    <input type="text" name="address[phone_number]"
                                        value="{{ optional($address)->phone_number }}" placeholder="No. HP Penerima"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Alamat <span>*</span></p>
                                    <input type="text" name="address[address]" value="{{ optional($address)->address }}"
                                        placeholder="Alamat lengkap penerima" required>
                                    <input type="text" name="address[notes]" value="{{ optional($address)->notes }}"
                                        placeholder="Keterangan alamat">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Catatan Order</p>
                                    <input type="text" name="notes">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout__order">
                            <h5>Keranjang Belanja</h5>
                            <div class="checkout__order__product">
                                <ul>
                                    <li>
                                        <span class="top__text">Produk</span>
                                        <span class="top__text__right">Total</span>
                                    </li>
                                    @foreach ($carts as $cart)
                                        <li>
                                            {{ $cart->name }}

                                            <span>
                                                Rp {{ displayPrice($cart->total, true) }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    {{-- <li>Subtotal <span>Rp {{ displayPrice($subtotal, true) }}</span></li> --}}
                                    <li>Total <span>Rp {{ displayPrice($subtotal, true) }}</span></li>
                                </ul>
                            </div>

                            @if ($count > 0)
                                <button type="submit" class="site-btn">Buat Order</button>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

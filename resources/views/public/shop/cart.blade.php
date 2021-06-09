@extends('layouts.public')
@section('title', 'Keranjang Belanja')

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Keranjang Belanja</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="shop-cart spad">
        <div class="container">
            <form action="{{ route('cart.update', 'update') }}" method="post">
                <div class="row">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-12">
                        @if ($hasCart)
                            <div class="shop__cart__table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Kuantitas</th>
                                            <th>Subtotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $cart)
                                            <tr class="item-{{ $cart->rowId }}">
                                                <td class="cart__product__item">
                                                    <div class="cart__product__item__title">
                                                        <h6>{{ $cart->name }}</h6>
                                                        <span class="will-be-deleted"></span>
                                                    </div>
                                                </td>
                                                <td class="cart__price">Rp {{ displayPrice($cart->price) }}</td>
                                                <td class="cart__quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" name="items[{{ $cart->rowId }}][qty]"
                                                            value="{{ $cart->qty }}">
                                                    </div>
                                                </td>
                                                <td class="cart__total">Rp {{ displayPrice($cart->total) }}</td>
                                                <td class="cart__close">
                                                    <a href="#" class="btn-remove-cart-item" data-id="{{ $cart->rowId }}">
                                                        <span class="icon_close"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                Tidak ada produk dalam keranjang
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="cart__btn">
                            <a href="{{ route('shop.browse') }}">Lanjutkan Belanja</a>
                        </div>
                    </div>
                    @if ($hasCart)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="cart__btn update__btn">
                                <button type="submit"><span class="icon_loading"></span> Update cart</button>
                            </div>
                        </div>
                    @endif
                </div>

                <input type="hidden" name="_delete_cart_id" value="" class="delete-cart-id">
            </form>
            @if ($hasCart)
                <div class="row">
                    {{-- <div class="col-lg-6">
                        <div class="discount__content">
                            <h6>Discount codes</h6>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">Apply</button>
                            </form>
                        </div>
                    </div> --}}
                    <div class="col-lg-6"></div>
                    <div class="col-lg-4 offset-lg-2">
                        <div class="cart__total__procced">
                            <h6>Total Keranjang</h6>
                            <ul>
                                <li>Total <span>Rp {{ displayPrice($total, true) }}</span></li>
                            </ul>
                            <a href="" class="primary-btn">Checkout</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('custom_js')
    <script>
        const btnRemoveItem = document.querySelectorAll('.btn-remove-cart-item');
        const deleteCartItems = document.querySelector('.delete-cart-id');

        btnRemoveItem.forEach((btn) => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();

                const id = btn.getAttribute('data-id');
                const willBeDeleted = document.querySelector(`.item-${id} .will-be-deleted`);

                let currentDeleted = deleteCartItems.value;
                currentDeleted = (currentDeleted == '') ? `${id}` : `${currentDeleted},${id}`;
                deleteCartItems.value = currentDeleted;

                setTimeout(function() {
                    willBeDeleted.innerHTML = '<small>Item ini akan dihapus. Klik "Update Cart"</small>';
                }, 1000);
            });
        });

    </script>
@endpush

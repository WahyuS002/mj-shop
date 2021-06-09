@extends('layouts.public')
@section('title', 'Order #' . $order->number)

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ route('orders.index') }}">Order Saya</a>
                        <span>#{{ $order->number }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="blog__details__content">
                        <div class="blog__details__item">
                            <img src="img/blog/details/blog-details.jpg" alt="">
                            <div class="blog__details__item__title">
                                <span class="tip">{{ $order->status->name }}</span>
                                <h4>Order #{{ $order->number }}</h4>
                                {{ date('l, d M Y H:i', strtotime($order->created_at)) }}
                            </div>
                        </div>

                        <div class="blog__details__desc text-center">
                            <div class="table-responsive">
                                <table class="table table-bordered striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Produk</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->items as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->product->name }}</td>
                                                <td>Rp {{ displayPrice($item->price) }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>Rp {{ displayPrice($item->price * $item->qty) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <div class="section-title">
                                <h4>Tindakan</h4>
                            </div>
                            <ul>
                                @if ($order->status_id == getConstants()::ORDER_STATUS_UNPAID)
                                    <li>
                                        <div class="cart__btn">
                                            <a href="">Bayar Order</a>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

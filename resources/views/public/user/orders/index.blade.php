@extends('layouts.public')
@section('title', 'Order Saya')

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Order Saya</span>
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
                        <div class="blog__details__desc">
                            @if (count($orders) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Total Harga</th>
                                            <th scope="col">Total Items</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td><a href="{{ route('orders.show', $order->id) }}">#{{ $order->number }}</a></td>
                                                <td>{{ date('d M Y H:i', strtotime($order->created_at)) }}</td>
                                                <td>Rp {{ displayPrice($order->total_price) }}</td>
                                                <td>{{ $order->total_items }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                <div class="text-success">
                                    Tidak ada data order untuk ditampilkan.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <div class="section-title">
                                <h4>Belanja</h4>
                            </div>
                            <ul>
                                <li><a href="{{ route('orders.index') }}">Semua Pesanan
                                        <span>({{ $countOrders['all'] }})</span></a></li>
                                <li><a href="{{ route('orders.status', 'unpaid') }}">Belum Dibayar
                                        <span>({{ $countOrders['unpaid'] }})</span></a></li>
                                <li><a href="{{ route('orders.status', 'on-process') }}">Sedang Diproses
                                        <span>({{ $countOrders['on_process'] }})</span></a></li>
                                <li><a href="{{ route('orders.status', 'on-delivery') }}">Dalam Pengiriman
                                        <span>({{ $countOrders['on_delivery'] }})</span></a></li>
                                <li><a href="{{ route('orders.status', 'finish') }}">Selesai
                                        <span>({{ $countOrders['finished'] }})</span></a></li>
                                <li><a href="{{ route('orders.status', 'cancelled') }}">Dibatalkan
                                        <span>({{ $countOrders['cancelled'] }})</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

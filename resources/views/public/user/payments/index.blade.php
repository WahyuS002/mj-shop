@extends('layouts.public')
@section('title', 'Pembayaran Saya')

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Pembayaran Saya</span>
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
                            @if (count($payments) > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Order</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Jumlah Bayar</th>
                                                <th scope="col">Metode</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($payments as $payment)
                                                <tr>
                                                    <td><a
                                                            href="{{ route('payments.show', $payment->id) }}">#{{ $payment->number }}</a>
                                                    </td>
                                                    <td><a
                                                            href="{{ route('orders.show', $payment->order_id) }}">#{{ $payment->order->number }}</a>
                                                    </td>
                                                    <td>{{ date('d M Y H:i', strtotime($payment->created_at)) }}</td>
                                                    <td>Rp {{ displayPrice($payment->total) }}</td>
                                                    <td>{{ $payment->method->name }}</td>
                                                    <td>{{ $payment->status }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-success">
                                    Tidak ada data pembayaran untuk ditampilkan.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <div class="section-title">
                                <h4>Pembayaran</h4>
                            </div>
                            <ul>
                                <li><a href="{{ route('payments.create') }}">Konfirmasi Pembayaran</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

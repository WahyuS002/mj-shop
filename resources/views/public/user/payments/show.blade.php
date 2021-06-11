@extends('layouts.public')
@section('title', 'Pembayaran #' . $payment->number)

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ route('payments.index') }}">Pembayaran</a>
                        <span>#{{ $payment->number }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="blog__details__content">
                        <div class="blog__details__desc">
                            <strong>Pembayaran #{{ $payment->number }}</strong>

                            <div class="mt-2 table-responsive">
                                <table class="table table-hover table-striped">
                                    <tr>
                                        <td>Nomor Pembayaran</td>
                                        <td>#{{ $payment->number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Order</td>
                                        <td><a
                                                href="{{ route('orders.show', $payment->order_id) }}">#{{ $payment->order->number }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Metode Pembayaran</td>
                                        <td>{{ $payment->method->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Bayar</td>
                                        <td>Rp {{ displayPrice($payment->total) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>{{ $payment->paymentStatus->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>{{ date('l, d M Y H:i', strtotime($payment->created_at)) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="blog__sidebar">
                        @if ($payment->payment_method_id == getConstants()::PAYMENT_METHOD_BANK)
                            <div class="blog__sidebar__item">
                                <div class="section-title">
                                    <h4>Data Pembayaran</h4>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Atas Nama</td>
                                            <td>{{ $payment->bank->sender_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Bank</td>
                                            <td>{{ $payment->bank->bank_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>No. Rekening</td>
                                            <td>{{ $payment->bank->account_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Transfer</td>
                                            <td>Rp {{ displayPrice($payment->bank->transfer_amount) }}</td>
                                        </tr>
                                        @isset($payment->media[0])
                                            <tr>
                                                <td>Bukti Pembayaran</td>
                                                <td><a href="{{ $payment->media[0]->getFullUrl() }}" target="_blank">Lihat
                                                        bukti</a></td>
                                            </tr>
                                        @endisset
                                        <tr>
                                            <td>Transfer ke</td>
                                            <td>{{ $payment->bank->bank->bank_name }} /
                                                {{ $payment->bank->bank->owner_name }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        @endif

                        @if ($payment->payment_method_id == getConstants()::PAYMENT_METHOD_PAYPAL)
                            <div class="blog__sidebar__item">
                                <div class="section-title">
                                    <h4>Data Pembayaran</h4>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Nama Pengirim</td>
                                            <td>{{ $payment->paypal->payer->first_name }} {{ $payment->paypal->payer->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $payment->paypal->payer->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status Rekening</td>
                                            <td>{{ $payment->paypal->payer->status }}</td>
                                        </tr>
                                        <tr>
                                            <td>ID Pembayaran</td>
                                            <td>{{ $payment->paypal->paypal_payment_id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Rate transaksi</td>
                                            <td>Rp {{ displayPrice($payment->paypal->rate) }} /  dollar</td>
                                        </tr>
                                        <tr>
                                            <td>Harga dalam rupiah</td>
                                            <td>Rp {{ displayPrice($payment->paypal->idr_price) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Harga dalam dollar</td>
                                            <td>USD {{ $payment->paypal->usd_price }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

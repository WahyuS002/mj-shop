@extends('layouts.public')
@section('title', 'Konfirmasi Pembayaran')

@section('custom_head')
    <style>
        .contact__form input:hover,
        .contact__form textarea:hover {
            border: 1px solid #6C63FF
        }

    </style>
@endsection

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ route('payments.index') }}">Pembayaran</a>
                        <span>Konfirmasi Pembayaran</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__content">
                        <div class="contact__form">
                            <h5>KONFIRMASI PEMBAYARAN</h5>
                            <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <p>Order</p>
                                    <select name="order_id">
                                        @foreach ($orders as $order)
                                            <option value="{{ $order->id }}" @if (old('order_id') == $order->id) selected @endif>#{{ $order->number }} (Rp
                                                {{ displayPrice($order->total_price + $order->shipment_cost) }})</option>
                                        @endforeach
                                    </select>

                                    @if (count($orders) == 0)
                                        <small>Tidak ada order yang perlu dikonfirmasi pembayarannya.</small>
                                    @endif

                                    @error('order_id')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" name="sender_name" placeholder="Nama Pengirim"
                                        value="{{ old('sender_name') }}" autofocus required>

                                    @error('sender_name')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="text" name="bank_name" value="{{ old('bank_name') }}"
                                                placeholder="Nama bank" required>

                                            @error('bank_name')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="text" name="account_number" value="{{ old('account_number') }}"
                                                placeholder="No. Rekening" required="required">

                                            @error('account_number')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="transfer_amount" placeholder="Jumlah transfer (hanya angka)"
                                        value="{{ old('transfer_amount') }}" required>

                                    @error('transfer_amount')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <p>Dikirim ke</p>
                                    <select name="bank_id">
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}">{{ $bank->bank_name }} /
                                                {{ $bank->owner_name }} ({{ $bank->account_number }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea name="notes" placeholder="Catatan">{{ old('notes') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <p>Bukti Pembayaran</p>
                                    <input type="file" name="picture" required>

                                    @error('picture')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="site-btn">Konfirmasi</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map text-center mt-5">
                        <img src="{{ asset('assets/illustrations/confirm-payment.svg') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

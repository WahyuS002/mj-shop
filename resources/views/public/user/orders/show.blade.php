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

                        <div class="blog__details__desc">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="items-tab" data-toggle="tab" href="#items" role="tab"
                                        aria-controls="items" aria-selected="true">Items</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="receiver-tab" data-toggle="tab" href="#receiver" role="tab"
                                        aria-controls="receiver" aria-selected="false">Penerima</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="courier-tab" data-toggle="tab" href="#courier" role="tab"
                                        aria-controls="courier" aria-selected="false">Kurir</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="items" role="tabpanel"
                                    aria-labelledby="items-tab">
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
                                <div class="tab-pane fade" id="receiver" role="tabpanel" aria-labelledby="receiver-tab">
                                    <table class="table table-hover table-striped table-condensed">
                                        <tr>
                                            <td>Penerima</td>
                                            <td><strong>{{ $order->address->full_name }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>No. HP</td>
                                            <td><strong>{{ $order->address->phone_number }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td><strong>{{ $order->address->address }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td><strong>{{ $order->address->notes }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Provinsi</td>
                                            <td><strong>{{ $order->address->city->province->name }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Kota / Kabupaten</td>
                                            <td><strong>{{ $order->address->city->name }}</strong></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="courier" role="tabpanel" aria-labelledby="courier-tab">
                                    <table class="table table-hover table-striped table-condensed">
                                        <tr>
                                            <td>Kurir</td>
                                            <td><strong>{{ $order->courier->courier->name }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Layanan</td>
                                            <td><strong>{{ $order->courier->service }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Biaya</td>
                                            <td><strong>Rp {{ displayPrice($order->courier->cost) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Dikirim ke</td>
                                            <td><strong>{{ $order->courier->province->name }} /
                                                    {{ $order->courier->city->name }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Estimasi Pengiriman</td>
                                            <td><strong>{{ $order->courier->estimation_day }} hari</strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        @if ($order->status_id == getConstants()::ORDER_STATUS_UNPAID)
                            <div class="blog__sidebar__item">
                                <div class="section-title">
                                    <h4>Pembayaran</h4>
                                </div>
                                <p>Lakukan pembayaran ke salah satu rekening berikut.</p>
                                <div class="table">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Bank</th>
                                            <th>Atas Nama</th>
                                            <th>No. Rekening</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($banks as $bank)
                                                <tr>
                                                    <td>{{ $bank->bank_name }}</td>
                                                    <td>{{ $bank->owner_name }}</td>
                                                    <td>{{ $bank->account_number }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <div class="section-title">
                                <h4>Ringkasan</h4>
                            </div>
                            <ul>
                                <li>Subtotal: Rp {{ displayPrice($order->total_price) }}</li>
                                <li>Biaya Pengiriman: Rp {{ displayPrice($order->courier->cost) }}</li>
                                <li>Total: <u>Rp {{ displayPrice($order->shipment_cost + $order->total_price) }}</u></li>
                            </ul>
                        </div>

                        <div class="blog__sidebar__item">
                            <div class="section-title">
                                <h4>Tindakan</h4>
                            </div>
                            <ul>
                                @if ($order->status_id == getConstants()::ORDER_STATUS_UNPAID)
                                    <li>
                                        <div class="cart__btn">
                                            <a href="{{ route('payments.paypal.create', $order->id) }}">Bayar dengan
                                                PayPal ($
                                                {{ number_format(($order->total_price + $order->shipment_cost) / config('paypal.idr_to_usd_rate'), 2, ',', '.') }})</a>

                                            <a href="{{ route('payments.create') }}" class="mt-2">Konfirmasi
                                                Pembayaran</a>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="cart__btn">
                                            <a href="#" class="btn-cancel-order">Batalkan Order</a>
                                        </div>
                                    </li>
                                @endif
                                @if ($order->status_id == getConstants()::ORDER_STATUS_CANCELLED)
                                    <li>
                                        Order dibatalkan oleh
                                        {{ $order->cancellations->user_id == auth()->user()->id ? 'saya' : 'admin' }}
                                        pada {{ date('l, d M Y H:i', strtotime($order->cancellations->created_at)) }}
                                        <br>
                                        Alasan:
                                        {{ $order->cancellations->reason }}
                                    </li>
                                @endif
                                @if ($order->status_id == getConstants()::ORDER_STATUS_WAITING_FOR_CONFIRMATION)
                                <li>
                                    <p>Order ini sudah dibayar, tetapi masih menunggu konfirmasi admin.</p>
                                    <div class="cart__btn">
                                        <a href="{{ route('payments.show', $order->payment->id) }}">Lihat Pembayaran</a>
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

@section('custom_html')
    @if ($order->status_id == getConstants()::ORDER_STATUS_UNPAID)
        <form action="{{ route('orders.cancel', $order->id) }}" method="post" id="cancel-form">
            @csrf
            @method('PUT')
            <input type="hidden" name="reason" value="" id="cancel-reason">
        </form>
    @endif
@endsection

@push('custom_js')
    @if ($order->status_id == getConstants()::ORDER_STATUS_UNPAID)
        <script>
            let btnCancelOrder = document.querySelector('.btn-cancel-order');
            btnCancelOrder.addEventListener('click', function(e) {
                e.preventDefault();

                swal({
                    title: 'Alasan Pembatalan Order',
                    input: 'textarea',
                    showCancelButton: true
                }).then(function(text) {
                    const reason = text.value;
                    if (reason == '') {
                        swal(
                            'Upps...!',
                            'Pesan pembatalan harus diisi',
                            'error'
                        )
                    } else {
                        const cancelForm = document.querySelector('#cancel-form');
                        const cancelReason = cancelForm.querySelector('#cancel-reason');

                        cancelReason.value = reason;
                        cancelForm.submit();
                    }
                })
            })

        </script>
    @endif
@endpush

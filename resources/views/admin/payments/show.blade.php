@extends('layouts.admin')
@section('title', 'Pembayaran #' . $payment->number)

@section('custom_head')
    <link href="{{ asset('plugins/animate/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dashboard/dash_2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/custom-modal.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">

    <link href="{{ asset('plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/custom-sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-8 col-lg-8 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <h5 class="display-5">Pembayaran #{{ $payment->number }}</h5>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-condensed">
                            <tr>
                                <td>Pembayaran</td>
                                <td>#{{ $payment->number }}</td>
                            </tr>
                            <tr>
                                <td>Order</td>
                                <td><a
                                        href="{{ route('admin.orders.show', $payment->order_id) }}">#{{ $payment->order->number }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>{{ date('l, d M Y H:i', strtotime($payment->created_at)) }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ $payment->paymentStatus->name }}</td>
                            </tr>
                            <tr>
                                <td>Metode Pembayaran</td>
                                <td>{{ $payment->method->name }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Bayar</td>
                                <td>Rp {{ displayPrice($payment->total) }}</td>
                            </tr>
                            @if ($payment->payment_method_id == getConstants()::PAYMENT_METHOD_PAYPAL)
                                <tr>
                                    <td>Rate Transaksi</td>
                                    <td>Rp {{ displayPrice($payment->paypal->rate) }} / dollar</td>
                                </tr>
                                <tr>
                                    <td>Pembayaran dalam dollar</td>
                                    <td>USD {{ $payment->paypal->usd_price }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>

                @if ($payment->payment_method_id == getConstants()::PAYMENT_METHOD_PAYPAL)
                    <div class="widget-content widget-content-area mt-3">
                        <h5 class="display-5">Data Pembayaran</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-condensed">
                                <tr>
                                    <td>Nama Pengirim</td>
                                    <td>{{ $payment->paypal->payer->first_name }}
                                        {{ $payment->paypal->payer->last_name }}</td>
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
                            </table>
                        </div>
                    </div>
                @endif

                @if ($payment->payment_method_id == getConstants()::PAYMENT_METHOD_BANK)
                    <div class="widget-content widget-content-area mt-3">
                        <h5 class="display-5">Data Pembayaran</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-condensed">
                                <tr>
                                    <td>Nama Pengirim</td>
                                    <td>{{ $payment->bank->sender_name }}</td>
                                </tr>
                                <tr>
                                    <td>Bank Pengirim</td>
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
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <h5 class="display-5">Tindakan</h5>

                    @if ($payment->status == getConstants()::PAYMENT_STATUS_APPROVED)
                        <div class="alert alert-info mt-3">
                            Pembayaran berhasil diterima. Tidak ada tindakan apapun.
                        </div>
                    @endif

                    @if ($payment->status == getConstants()::PAYMENT_STATUS_FAILED)
                        <div class="alert alert-info mt-3">
                            Pembayaran gagal diterima / dikonfirmasi.
                        </div>
                    @endif

                    @if ($payment->status == getConstants()::PAYMENT_STATUS_WAITING_FOR_CONFIRMATION)
                        <div class="alert alert-info mt-3">
                            Silahkan periksa data pembayaran, kemudian berikan konfirmasi apakah pembayaran diterima atau
                            ditolak.
                            Order tidak dapat dilanjutkan sebelum pembayaran dikonfirmasi.
                        </div>

                        <div class="mt-2 row">
                            <div class="col-12 col-md-6 ml-auto text-right">
                                <a href="#" class="btn btn-success btn-accept">Terima</a>
                            </div>
                            <div class="col-12 col-md-6">
                                <a href="#" class="btn btn-danger btn-decline">Tolak</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection

@section('custom_html')
    <form action="{{ route('admin.payments.update', $payment->id) }}" method="post" id="action-form">
        @csrf
        @method('PUT')
        <input type="hidden" name="action" value="" class="action">
    </form>
@endsection

@push('custom_js')
    <script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/custom-sweetalert.js') }}"></script>

    @if (session()->has('success'))
        <script>
            swal({
                title: 'Berhasil!',
                text: '{{ session()->get('success') }}',
                type: 'success',
                padding: '2em'
            });

        </script>
    @endif

    <script>
        const actionForm = document.querySelector('#action-form');
        const actionValue = actionForm.querySelector('.action');

        const btnAccept = document.querySelector('.btn-accept');
        const btnDecline = document.querySelector('.btn-decline');

        btnAccept.addEventListener('click', function(e) {
            e.preventDefault();

            swal({
                title: 'Anda yakin?',
                text: "Yakin menerima pembayaran ini? Pastikan data pembayaran benar!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Terima',
                padding: '2em'
            }).then(function(result) {
                if (result.value) {
                    actionValue.value = 'accept';
                    actionForm.submit();
                }
            })
        })

        btnDecline.addEventListener('click', function(e) {
            e.preventDefault();

            swal({
                title: 'Anda yakin?',
                text: "Yakin ingin menolak pembayaran ini? Order juga akan dibatalkan.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Tolak',
                padding: '2em'
            }).then(function(result) {
                if (result.value) {
                    actionValue.value = 'decline';
                    actionForm.submit();
                }
            })
        })

    </script>
@endpush

@extends('layouts.admin')
@section('title', 'Kelola Pembayaran')

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

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="category-table" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Status</th>
                                    <th>Metode Pembayaran</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>#{{ $payment->number }}</td>
                                        <td>#{{ $payment->order->number }}</td>
                                        <td>{{ date('d M Y H:i', strtotime($payment->created_at)) }}</td>
                                        <td>
                                            Rp {{ displayPrice($payment->total) }}
                                            @if ($payment->payment_method_id == getConstants()::PAYMENT_METHOD_PAYPAL)
                                                / $ {{ $payment->paypal->usd_price }}
                                            @endif
                                        </td>
                                        <td>{{ $payment->paymentStatus->name }}</td>
                                        <td>{{ $payment->method->name }}</td>
                                        <td><a class="btn btn-info"
                                                href="{{ route('admin.payments.show', $payment->id) }}">Lihat</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center">
                        {{ $payments->links() }}
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

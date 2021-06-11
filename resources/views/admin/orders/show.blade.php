@extends('layouts.admin')
@section('title', 'Order #'. $order->number)

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
                    <h5 class="display-5">Order #{{ $order->number }}</h5>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-condensed">
                            <tr>
                                <td>Order</td>
                                <td>#{{ $order->number }}</td>
                            </tr>
                            <tr>
                                <td>Customer</td>
                                <td>{{ $order->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>{{ date('l, d M Y H:i', strtotime($order->created_at)) }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ $order->status->name }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Item</td>
                                <td>{{ $order->total_items }}</td>
                            </tr>
                            <tr>
                                <td>Total Harga</td>
                                <td>Rp {{ displayPrice($order->total_price) }}</td>
                            </tr>
                            <tr>
                                <td>Ongkos Kirim</td>
                                <td>Rp {{ displayPrice($order->shipment_cost) }}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>Rp {{ displayPrice($order->total_price + $order->shipment_cost) }}</td>
                            </tr>
                            <tr>
                                <td>Catatan</td>
                                <td>{{ $order->notes }}</td>
                            </tr>
                            <tr>
                                <td>Invoice</td>
                                <td><a href="">Cetak Invoice {{ $order->number }}</a></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="widget-content widget-content-area mt-3">
                    <h5 class="display-5">Barang Dalam Order</h5>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-condensed">
                            <thead class="thead-dark">
                                <tr>
                                    <td>#</td>
                                    <td>Produk</td>
                                    <td>Harga</td>
                                    <td class="text-center">Kuantitas</td>
                                    <td>Subtotal</td>
                                </tr>
                            </thead>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>Rp {{ displayPrice($item->price) }}</td>
                                    <td class="text-center">{{ $item->qty }}</td>
                                    <td>Rp {{ displayPrice($item->price * $item->qty) }}</td>
                                </tr>
                            @endforeach
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right" style="padding-right: 3em">{{ $order->total_items }}</td>
                                    <td>Rp {{ displayPrice($order->total_price) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="widget-content widget-content-area mt-3">
                    <h5 class="display-5 mb-3">Tindakan</h5>

                    @if ($order->status_id == getConstants()::ORDER_STATUS_UNPAID)
                    <div class="alert alert-info">
                        Order ini belum dibayar, tidak ada tindakan untuk dilakukan.
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <h5 class="display-5">Kurir Pengiriman</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed table-hover">
                            <tr>
                                <td>Kurir</td>
                                <td>{{ $order->courier->courier->name }}</td>
                            </tr>
                            <tr>
                                <td>Layanan</td>
                                <td>{{ $order->courier->service }}</td>
                            </tr>
                            <tr>
                                <td>Biaya Pengiriman</td>
                                <td>Rp {{ displayPrice($order->courier->cost) }}</td>
                            </tr>
                            <tr>
                                <td>Estimasi Pengiriman</td>
                                <td>{{ $order->courier->estimation_day }} hari</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="widget-content widget-content-area mt-3 br-6">
                    <h5 class="display-5">Alamat Penerima</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed table-hover">
                            <tr>
                                <td>Nama Penerima</td>
                                <td>{{ $order->address->full_name }}</td>
                            </tr>
                            <tr>
                                <td>No. HP</td>
                                <td>{{ $order->address->phone_number }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>{{ $order->address->address }}</td>
                            </tr>
                            <tr>
                                <td>Catatan</td>
                                <td>{{ $order->address->notes }}</td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>{{ $order->address->city->province->name }}</td>
                            </tr>
                            <tr>
                                <td>Kota / Kabupaten</td>
                                <td>{{ $order->address->city->name }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@extends('layouts.admin')
@section('title', 'Kelola Produk')

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
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th class="text-center">Jumlah Item</th>
                                    <th>Total Harga</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>#{{ $order->number }}</td>
                                    <td>{{ date('d M Y H:i', strtotime($order->created_at)) }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->status->name }}</td>
                                    <td class="text-center">{{ $order->total_items }}</td>
                                    <td>Rp {{ displayPrice($order->total_price + $order->shipment_cost) }}</td>
                                    <td><a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm">Lihat</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

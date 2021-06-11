@extends('layouts.admin')
@section('title', 'Order #' . $order->number)

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
                            @if ($order->status_id == getConstants()::ORDER_STATUS_CANCELLED)
                                <tr>
                                    <td>Dibatalkan Oleh</td>
                                    <td>
                                        {{ $order->cancellations->user->name }}
                                        @if ($order->cancellations->user_id == auth()->user()->id)
                                            (Penjual)
                                        @else
                                            (Pembeli)
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alasan Pembatalan</td>
                                    <td>{{ $order->cancellations->reason }}</td>
                                </tr>
                                <tr>
                                    <td>Dibatalkan Pada</td>
                                    <td>{{ date('l, d M Y H:i', strtotime($order->cancellations->created_at)) }}</td>
                                </tr>
                            @endif
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
                                    <td colspan="4" class="text-right" style="padding-right: 3em">
                                        {{ $order->total_items }}</td>
                                    <td>Rp {{ displayPrice($order->total_price) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="widget-content widget-content-area mt-3">
                    <h5 class="display-5 mb-3">Tindakan</h5>

                    @if ($order->status_id == getConstants()::ORDER_STATUS_UNPAID)
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#cancelModal">Batalkan</a>
                    @endif

                    @if ($order->status_id == getConstants()::ORDER_STATUS_CANCELLED)
                    <div class="alert alert-info">Order dibatalkan</div>
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

@section('custom_html')
    <div class="modal fade animated zoomInUp custo-zoomInUp" id="cancelModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('admin.orders.update', $order->id) }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="action" value="cancel-order">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Batalkan Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form">
                            <div class="form-group">
                                <label for="reason">Alasan Pembatalan</label>
                                <textarea name="reason" id="reason" class="form-control"
                                    placeholder="Jelaskan mengapa order ini dibatalkan"
                                    required>{{ old('reason') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-cancel" data-dismiss="modal">
                            <i class="flaticon-cancel-12"></i> Kembali
                        </button>
                        <button type="submit" class="btn btn-primary btn-submit">Batalkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
@endpush

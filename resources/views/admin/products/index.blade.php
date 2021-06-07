@extends('layouts.admin')
@section('title', 'Kelola Produk')

@section('custom_head')
    <link href="{{ asset('plugins/animate/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/cards/card.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dashboard/dash_2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/custom-modal.css') }}" rel="stylesheet">

    <link href="{{ asset('plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/custom-sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class="">Kelola Produk</h5>
                        <ul class="tabs tab-pills">
                            <li>
                                <a href="{{ route('admin.products.create') }}"><i class="fa fa-plus"></i></a>
                            </li>
                        </ul>
                    </div>

                    @if (count($products) == 0)
                        <div class="alert alert-info mt-5">Belum ada data produk. Cobalah menambahkan satu.</div>
                    @endif
                </div>
            </div>
        </div>

        @if (count($products) > 0)
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 col-12 mb-1">
                        <div class="card component-card_9">
                            @isset($product->media[0])
                                <img src="{{ $product->media[0]->getFullUrl() }}" class="card-img-top" alt="widget-card-2">
                            @else
                                <img src="{{ asset('assets/img/400x300.jpg') }}" class="card-img-top" alt="widget-card-2">
                            @endisset
                            <div class="card-body">
                                <p class="meta-date">
                                    Rp {{ displayPrice($product->price) }}
                                </p>

                                <h5 class="card-title">
                                    <a
                                        href="{{ route('admin.products.show', $product->id) }}">{{ $product->name }}</a>

                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle float-right" data-toggle="dropdown"
                                            style="margin-top: -25px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-more-vertical">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="12" cy="5" r="1"></circle>
                                                <circle cx="12" cy="19" r="1"></circle>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                                href="{{ route('admin.products.edit', $product->id) }}">Edit</a>
                                            <a class="dropdown-item delete-product-link" data-id="{{ $product->id }}"
                                                href="#">Hapus</a>
                                        </div>
                                    </div>
                                </h5>
                                <p class="card-text">
                                    Stok: {{ $product->stock }}
                                    <br>
                                    Tersedia: {{ $product->is_available ? 'Ya' : 'Tidak' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

@section('custom_html')
    <form action="#" method="post" id="delete-product-form">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('custom_js')
    <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/promise-polyfill.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/custom-sweetalert.js') }}"></script>

    <script>
        @if (session()->has('success'))
            swal({
            title: 'Berhasil!',
            text: "{{ session()->get('success') }}",
            type: 'success',
            padding: '2em'
            })
        @endif

        const deleteBrandLink = document.querySelectorAll('.delete-product-link');
        deleteBrandLink.forEach((link) => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                let id = link.getAttribute('data-id');

                swal({
                    title: 'Yakin ingin menghapus?',
                    text: "Tindakan ini tidak dapat dibatalkan!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    padding: '2em'
                }).then(function(result) {
                    if (result.value) {
                        const action =
                            `{{ route('admin.products.destroy', false) }}/${id}`;
                        const deleteForm = document.querySelector('#delete-product-form');
                        deleteForm.setAttribute('action', action);

                        deleteForm.submit();
                    }
                })
            });
        });

    </script>
@endpush

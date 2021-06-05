@extends('layouts.admin')
@section('title', 'Brand Produk')

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
                        <h5 class="">Brand</h5>
                        <ul class="tabs tab-pills">
                            <li>
                                <a href="#" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i></a>
                            </li>
                        </ul>
                    </div>

                    @if (count($brands) == 0)
                        <div class="alert alert-info mt-5">Belum ada data brand. Cobalah menambahkan satu.</div>
                    @endif
                </div>
            </div>
        </div>

        @if (count($brands) > 0)
            <div class="row">
                @foreach ($brands as $item)
                    <div class="col-md-3 col-12 mb-1">
                        <div class="card component-card_2">
                            @isset($item->media[0])
                                <img src="{{ $item->media[0]->getFullUrl() }}" class="card-img-top" alt="widget-card-2">
                            @else
                                <img src="{{ asset('assets/img/400x300.jpg') }}" class="card-img-top" alt="widget-card-2">
                            @endisset
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $item->name }}

                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle float-right" data-toggle="dropdown"
                                            style="margin-top: -28px;">
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
                                            <a class="dropdown-item edit-brand-link" data-brand='{!! $item !!}'
                                                href="#">Edit</a>
                                            <a class="dropdown-item delete-brand-link" data-id="{{ $item->id }}"
                                                href="#">Hapus</a>
                                        </div>
                                    </div>
                                </h5>
                                <p class="card-text">{{ \Str::limit($item->description, 120, '...') }}</p>

                                <a href="{{ route('admin.products.brands.show', $item->id) }}"
                                    class="btn btn-primary btn-sm">Lihat &raquo;</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

@section('custom_html')
    <div class="modal fade animated zoomInUp custo-zoomInUp" id="addModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('admin.products.brands.store') }}" method="post" id="add-brand"
                enctype="multipart/form-data">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Brand</h5>
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
                                <label for="name">Nama Brand</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Brand"
                                    required="required">

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Deskripsi brand">{{ old('description') }}</textarea>

                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="picture">Foto</label>
                                <input type="file" name="picture" id="picture"
                                    class="form-control @error('picture') is-invalid @enderror">

                                @error('picture')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal">
                            <i class="flaticon-cancel-12"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade animated zoomInUp custo-zoomInUp" id="editModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="#" method="post" id="edit-brand"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
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
                                <label for="brand_name">Nama Brand</label>
                                <input type="text" name="brand_name" id="brand_name" value="{{ old('brand_name') }}"
                                    class="form-control brand-name @error('brand_name') is-invalid @enderror" placeholder="Brand"
                                    required="required">

                                @error('brand_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="brand_description">Deskripsi</label>
                                <textarea name="brand_description" id="brand_description"
                                    class="form-control brand-description @error('brand_description') is-invalid @enderror"
                                    placeholder="Deskripsi brand">{{ old('brand_description') }}</textarea>

                                @error('brand_description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="brand_picture">Foto</label>
                                <input type="file" name="brand_picture" id="brand_picture"
                                    class="form-control brand-picture @error('brand_picture') is-invalid @enderror">

                                <small class="text-muted">Pilih foto baru untuk mengganti yang lama.</small>

                                @error('brand_picture')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal">
                            <i class="flaticon-cancel-12"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <form action="#" method="post" id="delete-brand-form">
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
        @if (session()->has('errors') && session()->has('store'))
            $('#addModal').modal('show');
        @endif

        @if (session()->has('errors') && session()->has('update'))
            $('#editModal').modal('show');
        @endif

        @if (session()->has('success'))
            swal({
            title: 'Berhasil!',
            text: "{{ session()->get('success') }}",
            type: 'success',
            padding: '2em'
            })
        @endif

        const deleteBrandLink = document.querySelectorAll('.delete-brand-link');
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
                            `{{ route('admin.products.brands.destroy', false) }}/${id}`;
                        const deleteForm = document.querySelector('#delete-brand-form');
                        deleteForm.setAttribute('action', action);

                        deleteForm.submit();
                    }
                })
            });
        });

        const editBrandLink = document.querySelectorAll('.edit-brand-link');
        editBrandLink.forEach((link) => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                let data = link.getAttribute('data-brand');
                data = JSON.parse(data);

                const editForm = document.querySelector('#edit-brand');

                const editAction = `{{ route('admin.products.brands.update', FALSE) }}/${data.id}`;
                editForm.setAttribute('action', editAction);

                const brandName = editForm.querySelector('.brand-name');
                brandName.value = data.name;
                brandName.classList.remove('is-invalid');

                const brandDescription = editForm.querySelector('.brand-description');
                brandDescription.value = data.description;
                brandDescription.classList.remove('is-invalid');

                const brandPicture = editForm.querySelector('.brand-picture');
                brandPicture.classList.remove('is-invalid');

                $('#editModal').modal('show');
            });
        });

    </script>
@endpush

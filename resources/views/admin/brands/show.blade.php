@extends('layouts.admin')
@section('title', $brand->name)

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
            <div class="col-4 mx-auto layout-spacing">
                <div class="card component-card_9">
                    @isset($brand->media[0])
                        <img src="{{ $brand->media[0]->getFullUrl() }}" class="card-img-top" alt="widget-card-2">
                    @else
                        <img src="{{ asset('assets/img/400x300.jpg') }}" class="card-img-top" alt="widget-card-2">
                    @endisset
                    <div class="card-body">
                        <h5 class="card-title">{{ $brand->name }}</h5>
                        <p class="card-text">{{ $brand->description }}</p>

                        <div class="meta-info text-right">
                            <div class="meta-action">
                                <a href="#" class="delete-brand-link btn btn-sm btn-danger" data-id="{{ $brand->id }}">
                                    <i class="fa fa-trash"></i>
                                </a>

                                <a href="#" class="edit-brand-link btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal"
                                    data-brand='{!! $brand !!}'>
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_html')
    <div class="modal fade animated zoomInUp custo-zoomInUp" id="editModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="#" method="post" id="edit-brand" enctype="multipart/form-data">
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
                                    class="form-control brand-name @error('brand_name') is-invalid @enderror"
                                    placeholder="Brand" required="required">

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

        const deleteBrandLink = document.querySelector('.delete-brand-link');
        deleteBrandLink.addEventListener('click', function(e) {
            e.preventDefault();

            let id = deleteBrandLink.getAttribute('data-id');

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

        const editBrandLink = document.querySelector('.edit-brand-link');
        editBrandLink.addEventListener('click', function(e) {
            e.preventDefault();

            let data = editBrandLink.getAttribute('data-brand');
            data = JSON.parse(data);

            const editForm = document.querySelector('#edit-brand');

            const editAction = `{{ route('admin.products.brands.update', false) }}/${data.id}`;
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

    </script>
@endpush

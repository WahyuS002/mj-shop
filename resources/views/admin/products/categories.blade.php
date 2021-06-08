@extends('layouts.admin')
@section('title', 'Kategori Produk')

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

        <div class="row layout-top-spacing">
            <div class="col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class="">Kategori Produk</h5>
                        <ul class="tabs tab-pills">
                            <li>
                                <a href="#" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="category-table" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('custom_html')
    <div class="modal fade animated zoomInUp custo-zoomInUp" id="addModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="#" method="post" id="add-category" enctype="multipart/form-data">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
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
                        <div class="message"></div>

                        <div class="form">
                            <div class="form-group name-field">
                                <label for="name">Nama Kategori</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control"
                                    placeholder="Kategori" required="required">

                                <div></div>
                            </div>

                            <div class="form-group description-field">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description" class="form-control"
                                    placeholder="Deskripsi kategori">{{ old('description') }}</textarea>

                                <div></div>
                            </div>

                            <div class="form-group picture-field">
                                <label for="picture">Foto</label>
                                <input type="file" name="picture" id="picture" class="form-control">

                                <div></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-cancel" data-dismiss="modal">
                            <i class="flaticon-cancel-12"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary btn-submit">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade animated zoomInUp custo-zoomInUp" id="editModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="#" method="post" id="edit-category" enctype="multipart/form-data">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
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
                        <div class="message"></div>

                        <div class="form">
                            <div class="form-group name-field">
                                <label for="edit-name">Nama Kategori</label>
                                <input type="text" name="name" id="edit-name" value="{{ old('name') }}"
                                    class="form-control" placeholder="Kategori" required="required">

                                <div></div>
                            </div>

                            <div class="form-group description-field">
                                <label for="edit-description">Deskripsi</label>
                                <textarea name="description" id="edit-description" class="form-control"
                                    placeholder="Deskripsi kategori">{{ old('description') }}</textarea>

                                <div></div>
                            </div>

                            <div class="form-group picture-field">
                                <label for="edit-picture">Foto</label>
                                <input type="file" name="picture" id="edit-picture" class="form-control">

                                <small class="text-muted">Pilih foto baru untuk mengganti yang lama.</small>
                                <div></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-cancel" data-dismiss="modal">
                            <i class="flaticon-cancel-12"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary btn-submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade animated zoomInUp custo-zoomInUp" id="viewModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card component-card_2 category-profile">
                    <img src="#" class="card-img-top" alt="widget-card-2">
                    <div class="card-body">
                        <h5 class="card-title title">{category.title}</h5>
                        <p class="card-text description">{category.description}</p>
                        <div class="text-right">
                            <a href="#" class="btn btn-primary" data-dismiss="modal">Tutup</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script src="{{ asset('plugins/sweetalerts/promise-polyfill.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>

    <script>
        const categoryTable = $('#category-table').DataTable({
            "ajax": {
                "url": "{{ route('api.products.categories.index') }}",
                "beforeSend": function(xhr) {
                    xhr.setRequestHeader("Authorization", "Bearer " + passportAccessToken);
                },
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "name"
                },
                {
                    "data": function(data, type, row) {
                        return `<div class="text-right">
                                                                                                                            <a href="#" class="btn btn-sm btn-info btn-view" data-id="${data.id}">
                                                                                                                                <i class="fa fa-eye"></i>
                                                                                                                            </a>
                                                                                                                            <a href="#" class="btn btn-sm btn-warning btn-edit" data-id="${data.id}">
                                                                                                                                <i class="fa fa-edit"></i>
                                                                                                                            </a>
                                                                                                                            <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="${data.id}">
                                                                                                                                <i class="fa fa-trash"></i>
                                                                                                                            </a>
                                                                                                                        </div>`;
                    }
                }
            ],
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Cari...",
                "sLengthMenu": "Tampilkan:  _MENU_",
            },
            "order": [
                [1, "desc"]
            ],
            "stripeClasses": [],
            "lengthMenu": [10, 20, 50],
            "pageLength": 10,
            drawCallback: function() {
                $('.dataTables_paginate > .pagination').addClass(
                    ' pagination-style-13 pagination-bordered mb-5');
            }
        });

        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();

            const id = $(this).data('id');

            swal({
                title: 'Yakin ingin menghapus?',
                text: "Tindakan ini tidak dapat dibatalkan!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                padding: '2em'
            }).then(function(result) {
                if (result.value) {
                    fetch(`{{ route('api.products.categories.destroy', false) }}/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'Authorization': `Bearer ${passportAccessToken}`
                            }
                        })
                        .then(res => res.json())
                        .then(res => {
                            swal({
                                title: 'Terhapus!',
                                text: res.message,
                                type: 'success',
                                padding: '2em'
                            });

                            categoryTable.ajax.reload();
                        })
                        .catch(errors => {
                            swal({
                                title: 'Ups.. Terjadi kesalahan',
                                text: errors,
                                type: 'error',
                                padding: '2em'
                            })
                        })
                }
            })
        });

        const editCategoryForm = document.querySelector('#edit-category');
        const editNameField = editCategoryForm.querySelector('.name-field');
        const editDescriptionField = editCategoryForm.querySelector('.description-field');
        const editPictureField = editCategoryForm.querySelector('.picture-field');
        const editBtnSubmit = editCategoryForm.querySelector('.btn-submit');
        const editBtnCancel = editCategoryForm.querySelector('.btn-cancel');
        const editMessageContainer = editCategoryForm.querySelector('.message');

        const editNameInput = editNameField.querySelector('input');
        const editNameMessage = editNameField.querySelector('div');

        const editDescriptionInput = editDescriptionField.querySelector('textarea');
        const editDescriptionMessage = editDescriptionField.querySelector('div');

        const editPictureInput = editPictureField.querySelector('input');
        const editPictureMessage = editPictureField.querySelector('div');

        let __edit_id = null;

        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();

            const id = $(this).data('id');
            __edit_id = id;

            fetch(`{{ route('api.products.categories.show', false) }}/${id}`, {
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`
                    }
                })
                .then(res => res.json())
                .then(res => {
                    const data = res.data;

                    editNameInput.value = data.name;
                    editDescriptionInput.value = data.description;

                    $('#editModal').modal('show');
                })
        })

        editCategoryForm.addEventListener('submit', function(e) {
            e.preventDefault();

            editBtnSubmit.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menyimpan...';
            editBtnSubmit.setAttribute('disabled', 'disabled');

            const name = editNameInput.value;
            const description = editDescriptionInput.value;
            const picture = editPictureInput.files[0];

            const data = new FormData();
            data.append('_method', 'PUT');
            data.append('name', name);
            data.append('description', description);
            if (typeof picture != 'undefined') {
                data.append('picture', picture);
            }

            if (editNameInput.classList.contains('is-invalid')) {
                editNameInput.classList.remove('is-invalid');
                editNameMessage.classList.remove('invalid-feedback');
                editNameMessage.innerHTML = null;
            }
            if (editDescriptionInput.classList.contains('is-invalid')) {
                editDescriptionInput.classList.remove('is-invalid');
                editDescriptionMessage.classList.remove('invalid-feedback');
                editDescriptionMessage.innerHTML = null;
            }
            if (editPictureInput.classList.contains('is-invalid')) {
                editPictureInput.classList.remove('is-invalid');
                editPictureMessage.classList.remove('invalid-feedback');
                editPictureMessage.innerHTML = null;
            }

            fetch(`{{ route('api.products.categories.update', false) }}/${__edit_id}`, {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`
                    },
                    body: data
                })
                .then(res => res.json())
                .then(res => {
                    if (res.error) {
                        editBtnSubmit.innerHTML = 'Simpan';
                        editBtnSubmit.removeAttribute('disabled');

                        const errors = res.errors;
                        if (errors.name) {
                            editNameInput.classList.add('is-invalid');
                            editNameMessage.classList.add('invalid-feedback');
                            editNameMessage.innerHTML = errors.name[0];
                        }

                        if (errors.description) {
                            editDescriptionInput.classList.add('is-invalid');
                            editDescriptionMessage.classList.add('invalid-feedback');
                            editDescriptionMessage.innerHTML = errors.description[0];
                        }

                        if (errors.picture) {
                            editPictureInput.classList.add('is-invalid');
                            editPictureMessage.classList.add('invalid-feedback');
                            editPictureMessage.innerHTML = errors.picture[0];
                        }
                    } else if (res.data) {
                        categoryTable.ajax.reload();

                        editMessageContainer.classList.add('alert');
                        editMessageContainer.classList.add('alert-success');

                        editMessageContainer.innerHTML = 'Berhasil memperbarui data kategori';
                        editBtnSubmit.innerHTML = '<i class="fa fa-check"></i> Berhasil!';

                        $('#editModal').on('hidden.bs.modal', function() {
                            editBtnSubmit.innerHTML = 'Simpan';
                            editBtnSubmit.removeAttribute('disabled');

                            editNameInput.value = null;
                            editDescriptionInput.value = null;

                            editCategoryForm.reset();

                            if (editNameInput.classList.contains('is-invalid')) {
                                editNameInput.classList.remove('is-invalid');
                                editNameMessage.classList.remove('invalid-feedback');
                                editNameMessage.innerHTML = null;
                            }
                            if (editDescriptionInput.classList.contains('is-invalid')) {
                                editDescriptionInput.classList.remove('is-invalid');
                                editDescriptionMessage.classList.remove('invalid-feedback');
                                editDescriptionMessage.innerHTML = null;
                            }
                            if (editPictureInput.classList.contains('is-invalid')) {
                                editPictureInput.classList.remove('is-invalid');
                                editPictureMessage.classList.remove('invalid-feedback');
                                editPictureMessage.innerHTML = null;
                            }

                            if (editMessageContainer.classList.contains('alert')) {
                                editMessageContainer.innerHTML = null;
                                editMessageContainer.classList.remove('alert');

                                if (editMessageContainer.classList.contains('alert-success')) {
                                    editMessageContainer.classList.remove('alert-success');
                                }
                                if (editMessageContainer.classList.contains('alert-danger')) {
                                    editMessageContainer.classList.remove('alert-danger');
                                }
                            }
                        });
                    }
                })
                .catch(errors => {
                    messageContainer.classList.add('alert');
                    messageContainer.classList.add('alert-danger');

                    messageContainer.innerHTML = errors;
                })
        });

        const addCategoryForm = document.querySelector('#add-category');
        const nameField = addCategoryForm.querySelector('.name-field');
        const descriptionField = addCategoryForm.querySelector('.description-field');
        const pictureField = addCategoryForm.querySelector('.picture-field');
        const btnSubmit = addCategoryForm.querySelector('.btn-submit');
        const btnCancel = addCategoryForm.querySelector('.btn-cancel');
        const messageContainer = addCategoryForm.querySelector('.message');

        const nameInput = nameField.querySelector('input');
        const nameMessage = nameField.querySelector('div');

        const descriptionInput = descriptionField.querySelector('textarea');
        const descriptionMessage = descriptionField.querySelector('div');

        const pictureInput = pictureField.querySelector('input');
        const pictureMessage = pictureField.querySelector('div');

        function clearInput(clearValue = true) {
            if (clearValue == true) {
                addCategoryForm.reset();
            }

            if (nameInput.classList.contains('is-invalid')) {
                nameInput.classList.remove('is-invalid');
                nameMessage.classList.remove('invalid-feedback');
                nameMessage.innerHTML = null;
            }
            if (descriptionInput.classList.contains('is-invalid')) {
                descriptionInput.classList.remove('is-invalid');
                descriptionMessage.classList.remove('invalid-feedback');
                descriptionMessage.innerHTML = null;
            }
            if (pictureInput.classList.contains('is-invalid')) {
                pictureInput.classList.remove('is-invalid');
                pictureMessage.classList.remove('invalid-feedback');
                pictureMessage.innerHTML = null;
            }
        }

        function clearMessage() {
            if (messageContainer.classList.contains('alert')) {
                messageContainer.innerHTML = null;
                messageContainer.classList.remove('alert');

                if (messageContainer.classList.contains('alert-success')) {
                    messageContainer.classList.remove('alert-success');
                }
                if (messageContainer.classList.contains('alert-danger')) {
                    messageContainer.classList.remove('alert-danger');
                }
            }
        }

        addCategoryForm.addEventListener('submit', function(e) {
            e.preventDefault();

            btnSubmit.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Menambah...';
            btnSubmit.setAttribute('disabled', 'disabled');

            const name = nameInput.value;
            const description = descriptionInput.value;
            const picture = pictureInput.files[0];

            const data = new FormData();
            data.append('name', name);
            data.append('description', description);
            if (typeof picture != 'undefined') {
                data.append('picture', picture);
            }

            clearInput(false);

            fetch('{{ route('api.products.categories.store') }}', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`
                    },
                    body: data
                })
                .then(res => res.json())
                .then(res => {
                    if (res.error) {
                        btnSubmit.innerHTML = 'Tambah';
                        btnSubmit.removeAttribute('disabled');

                        const errors = res.errors;
                        if (errors.name) {
                            nameInput.classList.add('is-invalid');
                            nameMessage.classList.add('invalid-feedback');
                            nameMessage.innerHTML = errors.name[0];
                        }

                        if (errors.description) {
                            descriptionInput.classList.add('is-invalid');
                            descriptionMessage.classList.add('invalid-feedback');
                            descriptionMessage.innerHTML = errors.description[0];
                        }

                        if (errors.picture) {
                            pictureInput.classList.add('is-invalid');
                            pictureMessage.classList.add('invalid-feedback');
                            pictureMessage.innerHTML = errors.picture[0];
                        }
                    } else if (res.data) {
                        categoryTable.ajax.reload();

                        messageContainer.classList.add('alert');
                        messageContainer.classList.add('alert-success');

                        messageContainer.innerHTML = 'Berhasil menambah data kategori';
                        btnSubmit.innerHTML = '<i class="fa fa-check"></i> Berhasil!';

                        $('#addModal').on('hidden.bs.modal', function() {
                            btnSubmit.innerHTML = 'Tambah';
                            btnSubmit.removeAttribute('disabled');

                            clearInput();
                            clearMessage();
                        });
                    }
                })
                .catch(errors => {
                    messageContainer.classList.add('alert');
                    messageContainer.classList.add('alert-danger');

                    messageContainer.innerHTML = errors;
                })
        });

        btnCancel.addEventListener('click', function(e) {
            clearInput();
            clearMessage();
        });

        $(document).on('click', '.btn-view', function(e) {
            e.preventDefault();

            const id = $(this).data('id');

            fetch(`{{ route('api.products.categories.show', false) }}/${id}`, {
                    headers: {
                        'Authorization': `Bearer ${passportAccessToken}`
                    }
                })
                .then(res => res.json())
                .then(res => {
                    const data = res.data;
                    const categoryProfile = document.querySelector('.category-profile');

                    const img = categoryProfile.querySelector('img');
                    const title = categoryProfile.querySelector('.title');
                    const description = categoryProfile.querySelector('.description');

                    img.setAttribute('src', data.picture);
                    title.innerHTML = data.name;
                    description.innerHTML = data.description;
                    $('#viewModal').modal('show');
                })
        })

    </script>
@endpush

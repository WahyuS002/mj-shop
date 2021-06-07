@extends('layouts.admin')
@section('title', 'Tambah Produk Baru')

@section('custom_head')
    <link href="{{ asset('plugins/animate/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dashboard/dash_2.css') }}" rel="stylesheet">

    <link href="{{ asset('plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
                <h3>Tambah Produk Baru</h3>
            </div>
        </div>

        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row" id="cancel-row">
                <div class="col-xl-8 col-lg-8 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="form">
                            <h5 class="mb-3">Identitas Produk</h5>

                            <div class="form-group">
                                <label for="name">Nama Produk <span class="text-danger font-weight-bold">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" id="name" maxlength="255" placeholder="Nama produk"
                                    autofocus required>

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="stock">Stok <span class="text-danger font-weight-bold">*</span></label>
                                <input type="number" name="stock" value="{{ old('stock') }}" id="stock"
                                    placeholder="Stok awal"
                                    class="form-control @error('stock') is-invalid @enderror" required="required">

                                @error('stock')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Deskripsikan produk kamu">{{ old('description') }}</textarea>

                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="price">Harga <span class="text-danger font-weight-bold">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" value="{{ old('price') }}"
                                                class="form-control @error('price') is-invalid @enderror" name="price"
                                                id="price" required="required">

                                            @error('price')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="discount">Diskon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" value="{{ old('discount') }}"
                                                class="form-control @error('discount') is-invalid @enderror" name="discount"
                                                id="discount">

                                            @error('discount')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="is-available">
                                    <input type="checkbox" name="is_available" id="is-available" value="1" @if (old('is_available') == 1) checked @endif>
                                    Produk ini tersedia untuk dijual?
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="widget-content widget-content-area br-6 mt-3">
                        <div class="form">
                            <h5 class="mb-3">Spesifikasi Produk</h5>
                            <span class="float-right" style="margin-top: -35px">
                                <a href="#" class="btn btn-sm btn-primary btn-add-specs"><i class="fa fa-plus"></i></a>
                            </span>
                            <div class="mt-2 mb-3">
                                Spesifikasi produk bisa berisi keterangan tentang detail produk, misalnya bahan, warna, dan
                                lain-lain.
                            </div>
                            @if (old('specs') != null && is_array(old('specs')) && count(old('specs')) > 0)
                                @foreach (old('specs') as $spec)
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="specs-key-{{ $loop->index }}">Spesifikasi</label>
                                                    <input type="text" class="form-control"
                                                        id="specs-key-{{ $loop->index }}"
                                                        name="specs[{{ $loop->index }}][key]"
                                                        value="{{ $spec['key'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="specs-value-{{ $loop->index }}">Isi spesifikasi</label>
                                                    <input type="text" class="form-control"
                                                        id="specs-value-{{ $loop->index }}"
                                                        name="specs[{{ $loop->index }}][value]"
                                                        value="{{ $spec['value'] }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="specs-key-0">Spesifikasi</label>
                                                <input type="text" class="form-control" id="specs-key-0"
                                                    name="specs[0][key]">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="specs-value-0">Isi spesifikasi</label>
                                                <input type="text" class="form-control" id="specs-value-0"
                                                    name="specs[0][value]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="specs-container"></div>
                        </div>
                    </div>

                    <div class="widget-content widget-content-area br-6 mt-3">
                        <div class="form">
                            <h5 class="mb-3">Pilihan Order (Variasi)</h5>
                            <span class="float-right" style="margin-top: -35px">
                                <a href="#" class="btn btn-sm btn-primary btn-add-option"><i class="fa fa-plus"></i></a>
                            </span>
                            <div class="mt-2 mb-3">
                                Variasi order adalah pilihan saat pembeli melakukan order, seperti pilihan warna, ukuran,
                                dan sebagainya.
                            </div>
                            @if (old('options') != null && is_array(old('options')) && count(old('options')) > 0)
                                @foreach (old('options') as $option)
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="option-key-{{ $loop->index }}">Variasi</label>
                                                    <input type="text" class="form-control"
                                                        id="option-key-{{ $loop->index }}" placeholder="Warna"
                                                        name="options[{{ $loop->index }}][key]"
                                                        value="{{ $option['key'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="option-value-{{ $loop->index }}">Pilihan variasi</label>
                                                    <input type="text" class="form-control"
                                                        id="option-value-{{ $loop->index }}"
                                                        placeholder="Merah|Putih|Hijau"
                                                        name="options[{{ $loop->index }}][value]"
                                                        value="{{ $option['value'] }}">

                                                    <small class="text-muted">Pisahkan dengan <strong>|</strong> untuk
                                                        memberi
                                                        banyak variasi</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="option-key-0">Variasi</label>
                                                <input type="text" class="form-control" id="option-key-0"
                                                    placeholder="Warna" name="options[0][key]">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="option-value-0">Pilihan variasi</label>
                                                <input type="text" class="form-control" id="option-value-0"
                                                    placeholder="Merah|Putih|Hijau" name="options[0][value]">

                                                <small class="text-muted">Pisahkan dengan <strong>|</strong> untuk memberi
                                                    banyak variasi</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="options-container"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <h5 class="mb-3">Foto Produk</h5>

                        <div class="custom-file-container" data-upload-id="images">
                            <label>Upload foto produk <a href="javascript:void(0)"
                                    class="custom-file-container__image-clear" title="Batalkan pilihan">&times;</a></label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="pictures[]"
                                    class="custom-file-container__custom-file__custom-file-input" accept="image/*" multiple>
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>

                        @if ($errors->has('pictures.*'))
                            @foreach ($errors->get('pictures.*') as $errors)
                                @foreach ($errors as $item)
                                    <div class="text-danger">
                                        {{ $item }}
                                    </div>
                                @endforeach
                            @endforeach
                        @endif
                    </div>

                    <div class="widget-content widget-content-area br-6 mt-3">
                        <h5 class="mb-3">Kategori dan Brand</h5>

                        <div class="form">
                            <h6><strong>Kategori</strong></h6>
                            @forelse ($categories as $item)
                                <div>
                                    <label for="category-{{ $item->id }}">
                                        <input type="checkbox" name="categories[]" id="category-{{ $item->id }}"
                                            value="{{ $item->id }}" @if (is_array(old('categories')) && in_array($item->id, old('categories'))) checked @endif>
                                        {{ $item->name }}
                                    </label>
                                </div>
                            @empty
                                <div class="alert alert-info">
                                    Tidak ada data kategori. Silahkan menambahkan baru
                                </div>
                            @endforelse
                        </div>

                        <div class="form mt-3">
                            <h6><strong>Brand</strong></h6>
                            @forelse ($brands as $item)
                                <div>
                                    <label for="brand-{{ $item->id }}">
                                        <input type="radio" name="brand_id" id="brand-{{ $item->id }}"
                                            value="{{ $item->id }}" @if (old('brand_id') == $item->id) checked @endif>
                                        {{ $item->name }}
                                    </label>
                                </div>
                            @empty
                                <div class="alert alert-info">
                                    Tidak ada data <i>brand</i>. Silahkan menambahkan baru
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="widget-content widget-content-area br-6 mt-3">
                        <div class="form-group text-right">
                            <input type="submit" value="Tambah Produk" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection

@push('custom_js')
    <script src="{{ asset('plugins/file-upload/file-upload-with-preview.min.js') }}"></script>

    <script>
        const images = new FileUploadWithPreview('images')

        let nSpecs = 1;
        const btnAddSpecs = document.querySelector('.btn-add-specs');
        const specsContainer = document.querySelector('.specs-container');

        btnAddSpecs.addEventListener('click', function(e) {
            e.preventDefault();

            const div = document.createElement('div');

            div.innerHTML = `<div class="row">
                                                                                            <div class="col-md-6 col-12">
                                                                                                <div class="form-group">
                                                                                                    <label for="specs-key-${nSpecs}">Spesifikasi</label>
                                                                                                    <input type="text" class="form-control" id="specs-key-${nSpecs}" name="specs[${nSpecs}][key]">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 col-12">
                                                                                                <div class="form-group">
                                                                                                    <label for="specs-value-${nSpecs}">Isi spesifikasi</label>
                                                                                                    <input type="text" class="form-control" id="specs-value-${nSpecs}" name="specs[${nSpecs}][value]">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>`;

            specsContainer.appendChild(div);
            nSpecs++;
        });

        let nOption = 1;
        const btnAddOption = document.querySelector('.btn-add-option');
        const optionContainer = document.querySelector('.options-container');

        btnAddOption.addEventListener('click', function(e) {
            e.preventDefault();

            const div = document.createElement('div');

            div.innerHTML = `<div class="row">
                                                                                            <div class="col-md-6 col-12">
                                                                                                <div class="form-group">
                                                                                                    <label for="option-key-${nOption}">Variasi</label>
                                                                                                    <input type="text" class="form-control" id="option-key-${nOption}" name="options[${nOption}][key]">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6 col-12">
                                                                                                <div class="form-group">
                                                                                                    <label for="option-value-${nOption}">Pilihan variasi</label>
                                                                                                    <input type="text" class="form-control" id="option-value-${nOption}" name="options[${nOption}][value]">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>`;

            optionContainer.appendChild(div);
            nOption++;
        })

    </script>
@endpush

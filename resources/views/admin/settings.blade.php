@extends('layouts.admin')
@section('title', 'Pengaturan Umum')

@section('custom_head')
    <link rel="stylesheet" href="{{ asset('plugins/dropify/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/users/account-setting.css') }}">
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="account-settings-container layout-top-spacing">
            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form action="{{ route('admin.settings.update') }}" method="POST"
                                enctype="multipart/form-data" id="general-info" class="section general-info">
                                @csrf
                                @method('PUT')

                                <div class="info">
                                    <h6 class="">Pengaturan Umum</h6>

                                    @if (session()->has('success'))
                                        <span class="float-right text-success" style="margin-top: -65px;">
                                            {{ session()->get('success') }}
                                        </span>
                                    @endif

                                    @if (session()->has('success'))
                                        <span class="float-right text-success" style="margin-top: -65px;">
                                            {{ session()->get('success') }}
                                        </span>
                                    @endif

                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-3 col-lg-12 col-md-4">
                                                    <div class="upload mt-4 pr-md-4">
                                                        <input type="file" id="input-file-max-fs" class="dropify"
                                                            name="logo" data-default-file="{{ getSiteLogo() }}"
                                                            data-max-file-size="4M" />
                                                        <p class="mt-2">
                                                            <i class="flaticon-cloud-upload mr-1"></i> Upload Logo
                                                        </p>
                                                    </div>

                                                    <div class="upload mt-4 pr-md-4">
                                                        <input type="file" id="input-file-max-fs2" class="dropify"
                                                            name="icon" data-default-file="{{ getSiteIcon() }}"
                                                            data-max-file-size="2M" />
                                                        <p class="mt-2">
                                                            <i class="flaticon-cloud-upload mr-1"></i> Upload Icon (90x90)
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-9 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label for="siteName">Nama Situs</label>
                                                            <input type="text"
                                                                class="form-control mb-4 @error('settings.siteName') is-invalid @enderror"
                                                                name="settings[siteName]" id="siteName"
                                                                placeholder="Nama Situs"
                                                                value="{{ old('settings.siteName', getSetting('siteName')) }}"
                                                                required>

                                                            @error('settings.siteName')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="description">Deskripsi</label>
                                                            <textarea name="settings[siteDescription]" id="description"
                                                                placeholder="Deskripsi situs"
                                                                class="form-control @error('settings.siteDescription') is-invalid @enderror">{{ getSetting('siteDescription') }}</textarea>

                                                            @error('settings.siteDescription')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <h5 class="mt-2 display-6">Informasi Kontak</h5>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <label for="email">Email</label>
                                                                <input type="email" name="settings[contactEmail]"
                                                                    placeholder="Email kontak"
                                                                    value="{{ getSetting('contactEmail') }}" id="email"
                                                                    class="form-control @error('settings.contactEmail') is-invalid @enderror">

                                                                @error('settings.contactEmail')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="phone">Telpon</label>
                                                                    <input type="text" name="settings[contactPhoneNumber]"
                                                                        id="phone"
                                                                        value="{{ getSetting('contactPhoneNumber') }}"
                                                                        class="form-control @error('settings.contactPhoneNumber') is-invalid @enderror">

                                                                    @error('settings.contactPhoneNumber')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="address">Alamat Toko</label>
                                                            <textarea name="settings[storeAddress]" id="address"
                                                                placeholder="Alamat toko"
                                                                class="form-control @error('settings.storeAddress') is-invalid @enderror">{{ getSetting('storeAddress') }}</textarea>

                                                            @error('settings.storeAddress')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group text-right">
                                                            <input type="submit" value="Simpan" class="btn btn-primary">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script src="{{ asset('plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('assets/js/users/account-settings.js') }}"></script>
@endpush

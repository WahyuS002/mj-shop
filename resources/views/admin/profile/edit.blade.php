@extends('layouts.admin')
@section('title', 'Edit Profile')

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
                            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data"
                                id="general-info" class="section general-info">
                                @csrf
                                @method('PUT')

                                <div class="info">
                                    <h6 class="">Edit Profil</h6>

                                    @if (session()->has('success'))
                                        <span class="float-right text-success" style="margin-top: -65px;">
                                            {{ session()->get('success') }}
                                        </span>
                                    @endif

                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <div class="upload mt-4 pr-md-4">
                                                        <input type="file" id="input-file-max-fs" class="dropify"
                                                            name="picture"
                                                            data-default-file="{{ getUserProfilePicture('assets/img/200x200.jpg') }}"
                                                            data-max-file-size="2M" />
                                                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload
                                                            Foto</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label for="fullName">Nama Lengkap</label>
                                                            <input type="text"
                                                                class="form-control mb-4 @error('name') is-invalid @enderror"
                                                                name="name" id="fullName" placeholder="Nama Lengkap"
                                                                value="{{ old('name', auth()->user()->name) }}" required>

                                                            @error('name')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" name="email" placeholder="Email"
                                                                        value="{{ old('email', auth()->user()->email) }}"
                                                                        id="email"
                                                                        class="form-control @error('email') is-invalid @enderror"
                                                                        required="required">

                                                                    @error('email')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="password">Password</label>
                                                                    <input type="password" name="password" id="password"
                                                                        class="form-control @error('password') is-invalid @enderror">

                                                                    <small class="text-muted">Kosongkan password jika tidak
                                                                        ingin mengganti yang lama.</small>

                                                                    @error('password')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
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

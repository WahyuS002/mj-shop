@extends('layouts.public')
@section('title', 'Edit Profil')

@section('custom_head')
    <style>
        .contact__form input:hover,
        .contact__form textarea:hover {
            border: 1px solid #6C63FF
        }

    </style>
@endsection

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ route('profile.index') }}">Profil Saya</a>
                        <span>Edit</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__content">
                        <div class="contact__form">
                            <h5>EDIT PROFIL</h5>
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <input type="text" name="name" id="name" placeholder="Nama Lengkap"
                                        value="{{ old('name', $user->name) }}" autofocus required>

                                    @error('name')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="text" name="email" value="{{ old('email', $user->email) }}"
                                                placeholder="Email" required>

                                            @error('email')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="password" name="password" value="{{ old('password') }}">

                                            @error('password')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            <small>Kosongkan jika tidak ingin mengganti</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="file" name="picture">

                                    @error('picture')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <button type="submit" class="site-btn">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map text-center">
                        <img src="{{ asset('assets/illustrations/edit-profile.svg') }}" style="width: 65%">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

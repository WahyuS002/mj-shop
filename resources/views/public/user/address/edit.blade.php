@extends('layouts.public')
@section('title', 'Edit Alamat')

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
                        <a href="">Profile</a>
                        <a href="{{ route('profile.address.index') }}">Alamat</a>
                        <a href="{{ route('profile.address.show', $address->id) }}">{{ $address->title }}</a>
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
                            <h5>EDIT ALAMAT</h5>
                            <form action="{{ route('profile.address.update', $address->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <input type="text" name="title" id="title" placeholder="Judul alamat"
                                        value="{{ old('title', $address->title) }}" autofocus required>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="text" name="full_name" value="{{ old('full_name', $address->full_name) }}"
                                                placeholder="Nama lengkap" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="text" name="phone_number" value="{{ old('phone_number', $address->phone_number) }}"
                                                placeholder="No. HP" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="address" placeholder="Alamat" required>{{ old('address', $address->address) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <textarea name="notes" placeholder="Keterangan">{{ old('notes', $address->notes) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="make-as-primary" style="width: 100%">
                                        <input type="checkbox" name="make_as_primary" style="width: 10%; height: 10%"
                                            id="make-as-primary" value="1" @if (old('make_as_primary', $address->is_primary) == 1) checked @endif>
                                        Jadikan sebagai alamat utama
                                    </label>
                                </div>

                                <button type="submit" class="site-btn">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map text-center">
                        <img src="{{ asset('assets/illustrations/add_address.svg') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

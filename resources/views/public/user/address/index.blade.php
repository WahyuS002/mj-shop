@extends('layouts.public')
@section('title', 'Kelola Alamat')

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="">Profile</a>
                        <span>Alamat</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="blog__details__content">
                        <div></div>
                        <img src="img/blog/details/blog-details.jpg" alt="">
                        <div class="blog__details__item">
                            <div class="blog__details__item__title">
                                <h4>Alamat Saya</h4>
                            </div>
                        </div>
                        <div class="blog__details__desc">
                            <p class="text-center mt-5">
                                <img src="{{ asset('assets/illustrations/address_index.svg') }}" alt="Alamat pengiriman"
                                    style="width: 70%">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <div class="section-title">
                                <h4>Alamat</h4>
                            </div>
                            @if (count($addresses) > 0)
                                <ul>
                                    @foreach ($addresses as $address)
                                        <li>
                                            <strong>
                                                <a
                                                    href="{{ route('profile.address.show', $address->id) }}">{{ $address->title }}</a>
                                            </strong>
                                            @if ($address->is_primary)
                                                (utama)
                                            @endif
                                            <br>
                                            <span>{{ $address->address }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p>Tidak ada data alamat yang ditambahkan.</p>
                            @endif
                            <div class="cart__btn" style="margin-top: 25px">
                                <a href="{{ route('profile.address.create') }}">Tambah Alamat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.public')
@section('title', 'Dashboard User')

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Dasbor User</span>
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
                        <div class="blog__details__item">
                            <img src="img/blog/details/blog-details.jpg" alt="">
                            <div class="blog__details__item__title">
                                <span class="tip">Selamat Datang</span>
                                <h4>Halo, {{ auth()->user()->name }}</h4>
                            </div>
                        </div>
                        <div class="blog__details__desc">
                            <p class="text-center mt-5">
                                <img src="{{ asset('assets/illustrations/welcome_dashboard.svg') }}" alt="Welcome"
                                style="width: 70%">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <div class="section-title">
                                <h4>Profile</h4>
                            </div>
                            <a href="#" class="blog__feature__item">
                                <div class="blog__feature__item__pic">
                                    <img src="{{ getUserProfilePicture() }}" alt="{{ auth()->user()->name }}">
                                </div>
                                <div class="blog__feature__item__text">
                                    <h6>{{ auth()->user()->name }}</h6>
                                    <span>{{ auth()->user()->email }}</span>
                                </div>
                            </a>

                            <ul>
                                <li><a href="">Edit Profil</a></li>
                                <li><a href="{{ route('profile.address.index') }}">Alamat Pengiriman</a></li>
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <div class="section-title">
                                <h4>Belanja</h4>
                            </div>
                            <ul>
                                <li><a href="{{ route('orders.index') }}">Semua Pesanan <span>({{ $countOrders['all'] }})</span></a></li>
                                <li><a href="{{ route('orders.status', 'unpaid') }}">Belum Dibayar <span>({{ $countOrders['unpaid'] }})</span></a></li>
                                <li><a href="{{ route('orders.status', 'on-process') }}">Sedang Diproses <span>({{ $countOrders['on_process'] }})</span></a></li>
                                <li><a href="{{ route('orders.status', 'on-delivery') }}">Dalam Pengiriman <span>({{ $countOrders['on_delivery'] }})</span></a></li>
                                <li><a href="{{ route('orders.status', 'finish') }}">Selesai <span>({{ $countOrders['finished'] }})</span></a></li>
                                <li><a href="{{ route('orders.status', 'cancelled') }}">Dibatalkan <span>({{ $countOrders['cancelled'] }})</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

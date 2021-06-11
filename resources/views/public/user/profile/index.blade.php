@extends('layouts.public')
@section('title', 'Profil Saya')

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Profil Saya</span>
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
                                <h4>{{ $user->name }}</h4>
                            </div>
                        </div>
                        <div class="blog__details__desc">
                            <p class="text-center mt-5">
                                <img src="{{ asset('assets/illustrations/profile.svg') }}" alt="Profil Saya"
                                    style="width: 60%">
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
                            <div class="blog__feature__item__pic">
                                <img src="{{ getUserProfilePicture() }}" alt="{{ $user->name }}" class="img-fluid" style="width: 90px; height: 90px;">
                            </div>
                            <div class="blog__feature__item__text">
                                <h6>{{ $user->name }}</h6>
                                <span>{{ $user->email }}</span>
                                <span>terdaftar sejak {{ date('d M Y', strtotime($user->created_at)) }}</span>
                            </div>

                            <ul class="mt-3">
                                <li><a href="{{ route('profile.edit') }}">Edit Profil</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.public')
@section('title', $address->title)

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="">Profile</a>
                        <a href="{{ route('profile.address.index') }}">Alamat</a>
                        <span>{{ $address->title }}</span>
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
                        <img src="" alt="">
                        <div class="blog__details__item">
                            <div class="blog__details__item__title">
                                <h4>
                                    {{ $address->title }}
                                    @if ($address->is_primary)
                                        (alamat utama)
                                    @endif
                                </h4>
                            </div>
                        </div>
                        <div class="blog__details__desc">
                            <div class="table-responsive">
                                <table class="table-striped table table-bordered">
                                    <tr>
                                        <td>Nama Penerima</td>
                                        <td><strong>{{ $address->full_name }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>No. HP</td>
                                        <td><strong>{{ $address->phone_number }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><strong>{{ $address->address }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Catatan</td>
                                        <td><strong>{{ $address->notes }}</strong></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="cart__btn" style="margin-top: 25px">
                                <a href="{{ route('profile.address.edit', $address->id) }}">Edit</a>
                                <a href="#" class="btn-edit-address">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <p class="text-center mt-5">
                                <img src="{{ asset('assets/illustrations/show_address.svg') }}" alt="Alamat pengiriman">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_html')
    <form action="#" method="post" id="delete-address-form">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('custom_js')
    <script>
        let btnEditAddress = document.querySelector('.btn-edit-address');
        btnEditAddress.addEventListener('click', function(e) {
            e.preventDefault();

            const id = {{ $address->id }};

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
                        `{{ route('profile.address.destroy', false) }}/${id}`;
                    const deleteForm = document.querySelector('#delete-address-form');
                    deleteForm.setAttribute('action', action);

                    deleteForm.submit();
                }
            })
        })

    </script>
@endpush

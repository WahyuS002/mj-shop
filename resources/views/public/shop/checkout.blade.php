@extends('layouts.public')
@section('title', 'Checkout')

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout spad">
        <div class="container">

            <form action="{{ route('checkout.store') }}" method="POST" class="checkout__form">
                @csrf

                <div class="row">
                    <div class="col-lg-8">
                        <h5>Alamat Pengiriman</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Nama Lengkap <span>*</span></p>
                                    <input type="text" name="address[full_name]"
                                        value="{{ optional($address)->full_name }}" placeholder="Nama lengkap penerima"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>No. HP <span>*</span></p>
                                    <input type="text" name="address[phone_number]"
                                        value="{{ optional($address)->phone_number }}" placeholder="No. HP Penerima"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Provinsi</p>
                                    <select name="province_id" id="provinces">
                                        <option selected="selected" disabled="disabled">Pilih Provinsi</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Kota / Kabupaten</p>
                                    <select name="address[city_id]" id="cities">
                                        <option selected="selected" disabled="disabled">Pilih Kota / Kabupaten</option>
                                    </select>

                                    <p class="select-province-animation"></p>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Alamat <span>*</span></p>
                                    <input type="text" name="address[address]" value="{{ optional($address)->address }}"
                                        placeholder="Alamat lengkap penerima" required>
                                    <input type="text" name="address[notes]" value="{{ optional($address)->notes }}"
                                        placeholder="Keterangan alamat">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Catatan Order</p>
                                    <input type="text" name="notes">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h5>Kurir Pengiriman</h5>
                        <div class="row mb-5">
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p class="default-courier-message">
                                        Pilih kota / kabupaten untuk memilih kurir pengiriman

                                        @error('courier')
                                        <p class="text-danger"><strong>{{ $message }}</strong></p>
                                    @enderror
                                    </p>

                                    <ul class="list-group couriers-list"></ul>
                                </div>
                            </div>
                        </div>

                        <div class="checkout__order">
                            <h5>Keranjang Belanja</h5>
                            <div class="checkout__order__product">
                                <ul>
                                    <li>
                                        <span class="top__text">Produk</span>
                                        <span class="top__text__right">Total</span>
                                    </li>
                                    @foreach ($carts as $cart)
                                        <li>
                                            {{ $cart->name }}

                                            <span>
                                                Rp {{ displayPrice($cart->total, true) }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    <li>Ongkos Kirim <span class="count-ongkir">Rp 0.00</span></li>
                                    <li>Subotal <span>Rp {{ displayPrice($subtotal, true) }}</span></li>
                                    <li>Total <span class="count-total">Rp
                                            {{ displayPrice($subtotal, true) }}</span></span></li>
                                </ul>
                            </div>

                            @if ($count > 0)
                                <button type="submit" class="site-btn submit-btn">Buat Order</button>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('custom_js')
    <script>
        function displayRupiah(rp) {
            return rp.toLocaleString('id', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            })
        }

        const provinces = document.querySelector('#provinces');
        const cities = document.querySelector('#cities');
        const animation = document.querySelector('.select-province-animation');
        const courierMessage = document.querySelector('.default-courier-message');

        provinces.addEventListener('change', function(e) {
            e.preventDefault();

            animation.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Mengambil data...';

            const provinceId = provinces.value;

            for (let i = cities.length - 1; i >= 0; i--) {
                cities.options[i] = null;
            }

            fetch(`{{ route('api.shipping.cities') }}?province=${provinceId}`)
                .then(res => res.json())
                .then(res => {
                    animation.innerHTML = null;

                    const defaultOption = document.createElement('option');
                    defaultOption.setAttribute('selected', 'selected');
                    defaultOption.setAttribute('disabled', 'disabled');
                    defaultOption.innerHTML = 'Pilih Kota / Kabupaten';

                    cities.appendChild(defaultOption);

                    res.data.forEach((city) => {
                        const option = document.createElement('option');
                        option.setAttribute('value', city.id);
                        option.innerHTML = city.name;

                        cities.appendChild(option);
                    })
                })
                .catch(errors => {
                    console.log(errors);
                });
        });

        cities.addEventListener('change', function(e) {
            e.preventDefault();

            animation.innerHTML = 'Sedang menghitung ongkos kirim....';

            const cityId = cities.value;
            const couriersList = document.querySelector('.couriers-list');

            fetch(`{{ route('api.shipping.prices') }}?cityId=${cityId}`)
                .then(res => res.json())
                .then(res => {
                    console.log(res);

                    animation.innerHTML = null;
                    courierMessage.innerHTML = null;

                    while (couriersList.firstChild) {
                        couriersList.removeChild(couriersList.firstChild);
                    }

                    const couriers = res.data;

                    for (const courier in couriers) {
                        const data = couriers[courier];
                        data.forEach((item) => {
                            const code = item.code;
                            const name = item.name;
                            const costs = item.costs;

                            costs.forEach((cost) => {
                                const service = cost.service;
                                const description = cost.description;
                                const data = cost.cost[0];
                                const price = data.value;
                                const etd = (data.etd).replace('HARI', '');

                                const courierData = {
                                    code: code,
                                    name: name,
                                    cost: cost
                                };

                                const li = document.createElement('li');
                                li.classList.add('list-group-item');

                                li.innerHTML =
                                    `<input style="width: 20%; height: 20%" type="radio" name="courier" value='${JSON.stringify(courierData)}' class="courier-item" data-price="${price}">
                                        <strong>${name}</strong> ${description}<br>Rp ${displayRupiah(price)} Estimasi: ${etd} hari`;

                                couriersList.appendChild(li);
                            });
                        })
                    }
                })
                .catch(errors => {
                    console.log(errors);
                })
        });

        const courierItems = document.querySelectorAll('.courier-item');

        $(document).on('change', '.courier-item', function(e) {
            const price = +$(this).attr('data-price');
            const subtotal = +{{ clearPrice($subtotal) }};

            const countOngkir = document.querySelector('.count-ongkir');
            const countTotal = document.querySelector('.count-total');

            const total = price + subtotal;
            countOngkir.innerHTML = `Rp ${displayRupiah(price)}`;
            countTotal.innerHTML = `Rp ${displayRupiah(total)}`;
        });

    </script>
@endpush

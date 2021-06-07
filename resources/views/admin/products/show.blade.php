@extends('layouts.admin')
@section('title', 'Data Produk')

@section('custom_head')
    <link href="{{ asset('plugins/animate/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dashboard/dash_2.css') }}" rel="stylesheet">

    <link href="{{ asset('plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/custom-sweetalert.css') }}" rel="stylesheet">

    <link href="{{ asset('plugins/lightbox/photoswipe.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lightbox/default-skin/default-skin.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lightbox/custom-photswipe.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">
            <div class="col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class="">Data Produk</h5>
                        <ul class="tabs tab-pills">
                            <li>
                                <a href="{{ route('admin.products.edit', $product->id) }}"><i class="fa fa-edit"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="cancel-row">

            <div class="col-xl-8 col-lg-8 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="width:100%">
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td><strong>{{ $product->id }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><strong>{{ $product->name }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Brand</td>
                                    <td><strong>{{ $product->brand->name }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td><strong>{{ $product->description }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td><strong>{{ $product->stock }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td><strong>Rp {{ displayPrice($product->price) }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Diskon</td>
                                    <td><strong>Rp {{ displayPrice($product->discount) }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Tersedia?</td>
                                    <td><strong>{{ $product->is_available ? 'Ya' : 'Tidak' }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>
                                        @forelse ($product->categories as $item)
                                            <span class="badge badge-info">
                                                <strong>{{ $item->name }}</strong>
                                            </span>
                                        @empty
                                            Tidak ada kategori
                                        @endforelse
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ditambahkan tanggal</td>
                                    <td><strong>{{ date('l, d M Y H:i', strtotime($product->created_at)) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6 pb-5">
                    <h5>Foto Produk</h5>

                    @if (count($product->media) > 0)
                        <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                            @foreach ($product->media as $media)

                                <a class="img-1" href="{{ $media->getFullUrl() }}" data-size="1600x1068"
                                    data-med="{{ $media->getFullUrl() }}" data-med-size="1024x683"
                                    data-author="{{ auth()->user()->name }}">
                                    <img src="{{ $media->getFullUrl() }}" alt="image-gallery">
                                    <figure>{{ $product->name }}</figure>
                                </a>

                            @endforeach
                        </div>

                        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                            <!-- Background of PhotoSwipe. It's a separate element, as animating opacity is faster than rgba(). -->
                            <div class="pswp__bg"></div>

                            <!-- Slides wrapper with overflow:hidden. -->
                            <div class="pswp__scroll-wrap">
                                <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
                                <!-- don't modify these 3 pswp__item elements, data is added later on. -->
                                <div class="pswp__container">
                                    <div class="pswp__item"></div>
                                    <div class="pswp__item"></div>
                                    <div class="pswp__item"></div>
                                </div>

                                <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                                <div class="pswp__ui pswp__ui--hidden">

                                    <div class="pswp__top-bar">

                                        <!--  Controls are self-explanatory. Order can be changed. -->
                                        <div class="pswp__counter"></div>
                                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                                        <button class="pswp__button pswp__button--share" title="Share"></button>
                                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                                        <!-- element will get class pswp__preloader--active when preloader is running -->
                                        <div class="pswp__preloader">
                                            <div class="pswp__preloader__icn">
                                                <div class="pswp__preloader__cut">
                                                    <div class="pswp__preloader__donut"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                        <div class="pswp__share-tooltip"></div>
                                    </div>
                                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                                    </button>
                                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                                    </button>
                                    <div class="pswp__caption">
                                        <div class="pswp__caption__center"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-info">
                            Produk ini tidak memiliki foto.
                        </div>
                    @endif
                </div>
            </div>

        </div>

    </div>
@endsection

@push('custom_js')
    <script src="{{ asset('plugins/sweetalerts/promise-polyfill.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <script src="{{ asset('plugins/lightbox/photoswipe.min.js') }}"></script>
    <script src="{{ asset('plugins/lightbox/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('plugins/lightbox/custom-photswipe.js') }}"></script>

    <script>
        @if (session()->has('success'))
            swal({
            title: 'Berhasil!',
            text: "{{ session()->get('success') }}",
            type: 'success',
            padding: '2em'
            })
        @endif

    </script>
@endpush

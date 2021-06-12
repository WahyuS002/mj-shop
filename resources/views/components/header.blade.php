<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="{{ route('home') }}"><img src="{{ getSiteLogo(true) }}" class="img-fluid"
                            style="width: 20%" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{ route('home') }}">Home</a></li>
                        @foreach (getCategories() as $category)
                            <li><a href="">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <div class="header__right__auth">
                        @if (auth()->check())
                            @if (auth()->user()->role == 'admin')
                                <a href="{{ route('admin.index') }}">Dasbor</a>
                            @else
                                <a href="{{ route('dashboard') }}">Akun Saya</a>
                            @endif
                            <a href="#" class="logout-link">Logout</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    </div>
                    <ul class="header__right__widget">
                        <li><span class="icon_search search-switch"></span></li>
                        <li><a href="{{ route('cart.index') }}"><span class="icon_bag_alt"></span>
                                <div class="tip">{{ \Cart::count() }}</div>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>

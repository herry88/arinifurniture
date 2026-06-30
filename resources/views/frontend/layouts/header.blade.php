        <header class="typeheader-3">
            <!-- HEADER TOP -->
            <div class="header-top">
                <div class="container">
                    <div class="header-top-left">
                        <div class="header-menu">
                            <div class="megamenu-style-dev megamenu-dev">
                                <div class="responsive">
                                    <nav class="navbar-default">
                                        <div class="container-megamenu-horizontal">
                                            <div class="nav-bar-header">
                                                <button type="button" id="show-megamenu" data-toggle="collapse"
                                                    class="navbar-toggle smooth">
                                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            <div class="megamenu-wrapper">
                                                <span id="remove-megamenu"><i class="fa fa-times"
                                                        aria-hidden="true"></i></span>
                                                <div class="megamenu-pattern">
                                                    <div class="container1">
                                                        <ul class="megamenu clearfix" data-transition="fade"
                                                            data-animationtime="500">
                                                            <li class="full-width menu-home">
                                                                <a href="{{ route('home') }}" class="smooth cleafix"
                                                                    title="">
                                                                    <i class="fa fa-home"></i>
                                                                </a>
                                                            </li>

                                                            @if (isset($megaMenuCategories))
                                                                @foreach ($megaMenuCategories as $parent)
                                                                    <li class="full-width with-sub-menu hover">
                                                                        <p class="close-menu"></p>
                                                                        <a href="#" class="smooth cleafix"
                                                                            title="">
                                                                            @if ($parent->icon)
                                                                                <i class="{{ $parent->icon }}"></i>
                                                                            @endif
                                                                            {{ $parent->name }}
                                                                            @if ($parent->children->count() > 0)
                                                                                <b class="caret"></b>
                                                                            @endif
                                                                        </a>
                                                                        @if ($parent->children->count() > 0)
                                                                            <div class="sub-menu" style="width: 100%;">
                                                                                <div class="content">
                                                                                    <div class="row">
                                                                                        <div class="col-md-9">
                                                                                            <div class="row">
                                                                                                @foreach ($parent->children as $sub)
                                                                                                    <div
                                                                                                        class="col-md-4">
                                                                                                        <div
                                                                                                            class="column">
                                                                                                            <a href="#"
                                                                                                                class="smooth title-submenu"
                                                                                                                title="">
                                                                                                                @if ($sub->icon)
                                                                                                                    <i
                                                                                                                        class="{{ $sub->icon }}"></i>
                                                                                                                @endif
                                                                                                                {{ $sub->name }}
                                                                                                            </a>
                                                                                                            @if ($sub->children->count() > 0)
                                                                                                                <div>
                                                                                                                    <ul
                                                                                                                        class="row-list">
                                                                                                                        @foreach ($sub->children as $child)
                                                                                                                            <li>
                                                                                                                                <a href="#"
                                                                                                                                    class="smooth"
                                                                                                                                    title="">
                                                                                                                                    @if ($child->icon)
                                                                                                                                        <i
                                                                                                                                            class="{{ $child->icon }}"></i>
                                                                                                                                    @endif
                                                                                                                                    {{ $child->name }}
                                                                                                                                </a>
                                                                                                                            </li>
                                                                                                                        @endforeach
                                                                                                                    </ul>
                                                                                                                </div>
                                                                                                            @endif
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endforeach
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            @if ($parent->banner && Storage::disk('public')->exists($parent->banner))
                                                                                                <div
                                                                                                    class="banner-mega-menu">
                                                                                                    <img src="{{ asset('storage/' . $parent->banner) }}"
                                                                                                        alt="{{ $parent->name }}"
                                                                                                        class="img-responsive">
                                                                                                </div>
                                                                                            @elseif($parent->image && Storage::disk('public')->exists($parent->image))
                                                                                                <div
                                                                                                    class="banner-mega-menu">
                                                                                                    <img src="{{ asset('storage/' . $parent->image) }}"
                                                                                                        alt="{{ $parent->name }}"
                                                                                                        class="img-responsive">
                                                                                                </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    </li>
                                                                @endforeach
                                                            @endif



                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-top-right">
                        <ul>
                            <li>
                                <a href="#" class="smooth" title>
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="smooth" title>
                                    <i class="fa fa-wifi" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="smooth" title>
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="smooth" title>
                                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="smooth" title>
                                    <i class="fa fa-podcast" aria-hidden="true"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- //HEADER TOP -->
            <!-- HEADER CENTER -->
            <div class="header-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-3">
                            <div class="header-hotline">
                                <div class="item">
                                    <p>
                                        <a href="{{ route('livechat') }}" target="_blank" class="smooth"
                                            title="Live Chat">
                                            Start
                                            <span>LIVE CHAT</span>
                                        </a>
                                    </p>
                                </div>
                                <div class="item">
                                    <p>
                                        <span class="hidden-md">Call our customer service at:</span> <a
                                            href="tel:096-999-8386" class="smooth"
                                            title=""><span>096-999-8386</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-9">
                            <div class="header-user">
                                <ul>
                                    <li>
                                        <a href="#" class="smooth dropdown-toggle" data-toggle="dropdown"
                                            title="">USD
                                            <i class="fa fa-caret-down dropdown-icon" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#" class="smooth" title="">USD</a>
                                            </li>
                                            <li>
                                                <a href="#" class="smooth" title="">EUR</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/image/catalog/england.png') }}" class="lang-img"
                                            alt="">
                                        <a href="#" class="smooth dropdown-toggle" data-toggle="dropdown"
                                            title=""><span class="hidden-md hidden-sm hidden-xs">English</span>
                                            <i class="fa fa-caret-down dropdown-icon" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#" class="smooth" title="">
                                                    <span><img src="{{ asset('frontend/image/catalog/england.png') }}"
                                                            class="lang-img" alt=""></span>
                                                    English</a>
                                            </li>
                                            <li>
                                                <a href="#" class="smooth" title="">
                                                    <span><img src="{{ asset('frontend/image/catalog/ar-ar.png') }}"
                                                            class="lang-img" alt=""></span>
                                                    Arabic</a>
                                            </li>
                                        </ul>
                                    </li>
                                    @auth
                                        <li>
                                            <a href="#" class="smooth dropdown-toggle" data-toggle="dropdown"
                                                title="">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                {{ Auth::user()->name }}
                                                <i class="fa fa-caret-down dropdown-icon" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="smooth">Profil Saya</a></li>
                                                <li>
                                                    <form action="{{ route('logout') }}" method="POST"
                                                        style="margin:0;">
                                                        @csrf
                                                        <button type="submit"
                                                            style="background:none; border:none; width:100%; text-align:left; padding:3px 20px; cursor:pointer; color:#333;">
                                                            <i class="fa fa-sign-out"></i> Logout
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('login') }}" class="smooth" title="">
                                                <i class="fa fa-sign-in" aria-hidden="true"></i> Masuk
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('register') }}" class="smooth" title="">
                                                <i class="fa fa-user-plus"></i> Daftar
                                            </a>
                                        </li>
                                    @endauth
                                    <li>
                                        <a href="{{ route('checkout.index') }}" class="smooth" title="">
                                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                            Checkout</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //HEADER CENTER -->
            <!-- HEADER BOTTOM -->
            <div class="header-bottom">
                <div class="container">
                    <div class="logo">
                        <a href="{{ route('home') }}" class="" title="">
                            <img src="{{ asset('frontend/image/catalog/demo/logo/logo3.png') }}" alt=""
                                class="img-responsive">
                        </a>
                    </div>
                    <div class="search-form">
                        <button type="button" class="smooth search-form-btn"><i class="fa fa-search"></i></button>
                        <form action="{{ route('home') }}" method="get">
                            <div class="icon">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                            <input type="text" name="keyword" placeholder="Cari produk furnitur..."
                                value="{{ request('keyword') }}">
                            <button type="submit">Cari</button>
                        </form>
                    </div>
                    <div class="cart">
                        @php
                            $cartQuery = Auth::check()
                                ? \App\Models\Cart::where('user_id', Auth::id())
                                : \App\Models\Cart::where('session_id', session()->getId());
                            $cartItems = $cartQuery->with('product')->get();
                            $cartCount = $cartItems->count();
                            $cartTotal = $cartItems->sum(function ($item) {
                                return ($item->product->discount_price ?? $item->product->price) * $item->quantity;
                            });
                        @endphp
                        <a href="{{ route('cart.index') }}" class="smooth cart-box dropdown-toggle" title=""
                            data-toggle="dropdown">
                            <img src="{{ asset('frontend/image/catalog/demo/header/cart.png') }}" class="cart-image"
                                alt="">
                            <p class="quantity">{{ $cartCount }} item(s) - Rp
                                {{ number_format($cartTotal, 0, ',', '.') }}</p>
                            <p class="cart-title">KERANJANG</p>
                        </a>
                        <ul class="dropdown-menu shopping-cart">
                            @if ($cartCount > 0)
                                <li class="shopping-cart-title clearfix">
                                    <label>Produk</label>
                                    <label>Harga</label>
                                </li>
                                <li class="product-item">
                                    <table class="table cart-table">
                                        <tbody>
                                            @foreach ($cartItems->take(3) as $item)
                                                <tr>
                                                    <td class="product-item-image">
                                                        <a href="{{ route('product.show', $item->product->slug) }}"
                                                            class="" title="">
                                                            @if ($item->product->galleries->count() > 0)
                                                                <img src="{{ asset('storage/' . $item->product->galleries->first()->image) }}"
                                                                    alt="{{ $item->product->name }}"
                                                                    class="img-responsive">
                                                            @else
                                                                <img src="{{ asset('frontend/image/catalog/demo/products/cart-product1.png') }}"
                                                                    alt="" class="img-responsive">
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td class="product-item-name">
                                                        <h4 class="product-name">
                                                            <a href="{{ route('product.show', $item->product->slug) }}"
                                                                class="smooth"
                                                                title="">{{ Str::limit($item->product->name, 25) }}</a>
                                                        </h4>
                                                        <span class="product-item-quantity">Qty:
                                                            {{ $item->quantity }}</span>
                                                    </td>
                                                    <td class="product-item-price">
                                                        <span class="shopping-price">Rp
                                                            {{ number_format(($item->product->discount_price ?? $item->product->price) * $item->quantity, 0, ',', '.') }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </li>
                                <li class="total-price clearfix">
                                    <label class="total-title">TOTAL:</label>
                                    <label class="float-right">Rp {{ number_format($cartTotal, 0, ',', '.') }}</label>
                                </li>
                                <li class="shopping-cart-checkout">
                                    <a href="{{ route('cart.index') }}" class="smooth" title="">KERANJANG</a>
                                    <a href="{{ route('checkout.index') }}" class="smooth"
                                        title="">CHECKOUT</a>
                                </li>
                            @else
                                <li style="padding:40px 20px; text-align:center; color:#9a8a7a; font-size:14px; background-color: #fff;">
                                    <i class="fa fa-shopping-basket" style="font-size:40px; display:block; margin-bottom:15px; color:#e8e0d5;"></i>
                                    <strong>Keranjang Anda masih kosong</strong>
                                    <p style="margin-top:5px; font-size:12px; color:#bbb;">Silakan jelajahi produk kami dan temukan furnitur idaman Anda.</p>
                                </li>
                                <li class="shopping-cart-checkout" style="background-color: #f9f9f9; text-align: center; padding: 15px;">
                                    <a href="{{ route('home') }}" class="smooth" title="" style="display: inline-block; padding: 10px 30px; background-color: #79a693; color: white; border-radius: 3px; font-weight: bold; text-transform: uppercase;">Mulai Belanja</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <!-- //HEADER BOTTOM -->
        </header>

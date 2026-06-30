@extends('frontend.master')
@section('content')
    <!-- HOME-SLIDER -->
    <div class="home-slider yt-content-slider" data-autoplay="no" data-delay="4" data-speed="0.6" data-items_column00="1"
        data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1"
        data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes"
        data-hoverpause="yes">
        @if (isset($sliders) && $sliders->count() > 0)
            @foreach ($sliders->chunk(2) as $sliderGroup)
                <div class="item-slider">
                    @foreach ($sliderGroup as $index => $slider)
                        <div class="item-slider-left {{ $index % 2 != 0 ? 'item-slider-right' : '' }}">
                            <a href="{{ $slider->link }}" class="">
                                <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}">
                            </a>
                            <div class="slider-info">
                                @if ($slider->subtitle)
                                    @if ($slider->type == 'slider_left')
                                        <h3 class="small-title">{{ $slider->subtitle }}</h3>
                                    @else
                                        <h2 class="big-title"><span class="small-title">{{ $slider->subtitle }}</span>
                                            {{ $slider->title }}</h2>
                                    @endif
                                @endif

                                @if ($slider->type == 'slider_left')
                                    <h4 class="small-desc">{{ $slider->description }}</h4>
                                    <h2 class="big-title">{{ $slider->title }}</h2>
                                @else
                                    @if (!$slider->subtitle)
                                        <h2 class="big-title">{{ $slider->title }}</h2>
                                    @endif
                                    <h4 class="small-desc">{{ $slider->description }}</h4>
                                @endif

                                <div class="text-center">
                                    <a href="{{ $slider->link }}" class="smooth see-more"
                                        title="">{{ $slider->button_text ?: 'SHOP NOW' }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @else
            <!-- Fallback if no sliders in DB -->
            <div class="item-slider">
                <div class="item-slider-left">
                    <a href="#" class="">
                        <img src="{{ asset('frontend/image/catalog/demo/slider/home3/slider1.jpg') }}" alt="">
                    </a>
                    <div class="slider-info">
                        <h3 class="small-title">FURNITURE</h3>
                        <h4 class="small-desc">Survive The Reality Of Everyday Life</h4>
                        <h2 class="big-title">COLLECTION</h2>
                        <div class="text-center">
                            <a href="#" class="smooth see-more" title="">SHOP NOW</a>
                        </div>
                    </div>
                </div>
                <div class="item-slider-left item-slider-right">
                    <a href="#" class="">
                        <img src="{{ asset('frontend/image/catalog/demo/slider/home3/slider3.jpg') }}" alt="">
                    </a>
                    <div class="slider-info">
                        <h2 class="big-title"><span class="small-title">Locally made</span> sofas + sectionals</h2>
                        <h4 class="small-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. </h4>
                        <div class="text-center">
                            <a href="#" class="smooth see-more" title="">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!-- //HOME-SLIDER -->



    <!-- INFOMATION SHIPPING -->
    <div class="infomation">
        <div class="infomation-container container">
            <div class="infomation-bg">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 box">
                        <div class="infomation-box">
                            <div class="infomation-image">
                                <img src="{{ asset('frontend/image/catalog/demo/slider/home1/infomation-image.png') }}"
                                    class="img-responsive" alt="">
                            </div>
                            <div class="infomation-desc">
                                <h6 class="infomation-title">FREE SHIPPING</h6>
                                <p class="infomation-detail">Vestibulum dolor purus porta</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box">
                        <div class="infomation-box">
                            <div class="infomation-image">
                                <img src="{{ asset('frontend/image/catalog/demo/slider/home1/infomation-image2.png') }}"
                                    class="img-responsive" alt="">
                            </div>
                            <div class="infomation-desc">
                                <h6 class="infomation-title">MONEY BACK GUARANTEE</h6>
                                <p class="infomation-detail">Vestibulum dolor purus porta</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 box">
                        <div class="infomation-box">
                            <div class="infomation-image">
                                <img src="{{ asset('frontend/image/catalog/demo/slider/home1/infomation-image3.png') }}"
                                    class="img-responsive" alt="">
                            </div>
                            <div class="infomation-desc">
                                <h6 class="infomation-title">24 HOURS SUPPORT</h6>
                                <p class="infomation-detail">Vestibulum dolor purus porta</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- //INFOMATION SHIPPING -->

    <!-- DEALS DAY -->
    <div class="deals-days">
        <div class="container clearfix">
            <div class="deals-left">
                <h4 class="deals-title">
                    Deals Of <span>The Days</span>
                </h4>
                <div class="deals-left-desc">
                    <p class="deals-desc">Mauris ut tincidunt nisi, id auctor libero. Etiam aliquet felis et
                        consectetur faucibus. Praesent aliquam, lec tempus consequat, felis quam venenatis ligula
                    </p>
                    <ul class="room nav nav-tabs">
                        @if(isset($dealCategories) && $dealCategories->count() > 0)
                            @foreach($dealCategories as $catIndex => $dealCat)
                                <li class="room-box {{ $catIndex === 0 ? 'active' : '' }}">
                                    <a data-toggle="tab" href="#deal-cat-{{ $dealCat->id }}" class="smooth" title="">
                                        @if($dealCat->image)
                                            <img src="{{ asset('storage/' . $dealCat->image) }}" alt="{{ $dealCat->name }}">
                                        @else
                                            <img src="{{ asset('frontend/image/catalog/demo/slider/home1/room.png') }}" alt="{{ $dealCat->name }}">
                                        @endif
                                        <h5 class="room-title">{{ strtoupper($dealCat->name) }}</h5>
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <li class="room-box active">
                                <a data-toggle="tab" href="#deal-cat-all" class="smooth" title="">
                                    <img src="{{ asset('frontend/image/catalog/demo/slider/home1/room.png') }}" alt="">
                                    <h5 class="room-title">ALL PRODUCTS</h5>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                @if(isset($dealCategories) && $dealCategories->count() > 0)
                    @foreach($dealCategories as $catIndex => $dealCat)
                        <div id="deal-cat-{{ $dealCat->id }}" class="tab-pane fade {{ $catIndex === 0 ? 'in active' : '' }}">
                            <div class="deals-center deals-center-slider">
                                @foreach($dealCat->dealProducts as $product)
                                    @php
                                        $image = $product->galleries->first()
                                            ? asset('storage/' . $product->galleries->first()->image)
                                            : asset('frontend/image/catalog/demo/slider/home1/product.png');
                                        $productUrl = route('product.show', $product->slug);
                                    @endphp
                                    <div class="deals-slider">
                                        <div class="left-group">
                                            <div class="table-countdown" data-countdown="{{ now()->addDays(7)->format('Y/m/d') }}">
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="product-image">
                                                <a href="{{ $productUrl }}" class="hv-light">
                                                    <img src="{{ $image }}" alt="{{ $product->name }}">
                                                </a>
                                            </div>
                                            <h5 class="product-name">
                                                <a href="{{ $productUrl }}" class="smooth" title="">{{ $product->name }}</a>
                                            </h5>
                                            <div class="price">
                                                Rp {{ number_format($product->discount_price, 0, ',', '.') }}
                                                <span class="price-old">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                            </div>
                                            <div class="rating">
                                                <div class="rating-box">
                                                    @for($s = 1; $s <= 5; $s++)
                                                        <span class="fa fa-stack">
                                                            @if($s <= 4)
                                                                <i class="fa fa-star fa-stack-1x"></i>
                                                                <i class="fa fa-star-o fa-stack-1x"></i>
                                                            @else
                                                                <i class="fa fa-star-o fa-stack-1x"></i>
                                                            @endif
                                                        </span>
                                                    @endfor
                                                </div>
                                            </div>
                                            <span class="label-sale">NEW!</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @else
                    <div id="deal-cat-all" class="tab-pane fade in active">
                        <div class="deals-center deals-center-slider">
                            @forelse($discountProducts->take(3) as $product)
                                @php
                                    $image = $product->galleries->first()
                                        ? asset('storage/' . $product->galleries->first()->image)
                                        : asset('frontend/image/catalog/demo/slider/home1/product.png');
                                    $productUrl = route('product.show', $product->slug);
                                @endphp
                                <div class="deals-slider">
                                    <div class="left-group">
                                        <div class="table-countdown" data-countdown="{{ now()->addDays(7)->format('Y/m/d') }}">
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-image">
                                            <a href="{{ $productUrl }}" class="hv-light">
                                                <img src="{{ $image }}" alt="{{ $product->name }}">
                                            </a>
                                        </div>
                                        <h5 class="product-name">
                                            <a href="{{ $productUrl }}" class="smooth" title="">{{ $product->name }}</a>
                                        </h5>
                                        <div class="price">
                                            Rp {{ number_format($product->discount_price, 0, ',', '.') }}
                                            <span class="price-old">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                        </div>
                                        <div class="rating">
                                            <div class="rating-box">
                                                @for($s = 1; $s <= 5; $s++)
                                                    <span class="fa fa-stack">
                                                        @if($s <= 4)
                                                            <i class="fa fa-star fa-stack-1x"></i>
                                                            <i class="fa fa-star-o fa-stack-1x"></i>
                                                        @else
                                                            <i class="fa fa-star-o fa-stack-1x"></i>
                                                        @endif
                                                    </span>
                                                @endfor
                                            </div>
                                        </div>
                                        <span class="label-sale">NEW!</span>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">Belum ada produk promo.</p>
                            @endforelse
                        </div>
                    </div>
                @endif
            </div>




            <div class="deals-left deals-right">
                <h4 class="deals-title">
                    popular <span>product</span>
                </h4>
                <div class="deals-right-desc">
                    @if(isset($popularProducts) && $popularProducts->count() > 0)
                        @foreach($popularProducts as $product)
                            @php
                                $image = $product->galleries->first()
                                    ? asset('storage/' . $product->galleries->first()->image)
                                    : asset('frontend/image/catalog/demo/products/product35.png');
                                $productUrl = route('product.show', $product->slug);
                            @endphp
                            <div class="deals-box product-info clearfix">
                                <div class="product-image-right">
                                    <a href="{{ $productUrl }}" class="hv-radial">
                                        <img src="{{ $image }}" alt="{{ $product->name }}">
                                    </a>
                                </div>
                                <div class="box">
                                    <h5 class="product-name">
                                        <a href="{{ $productUrl }}" class="smooth" title="">{{ $product->name }}</a>
                                    </h5>
                                    <div class="price">
                                        @if($product->discount_price)
                                            Rp {{ number_format($product->discount_price, 0, ',', '.') }}
                                            <span class="price-old">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                        @else
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        @endif
                                    </div>
                                    <div class="rating">
                                        <div class="rating-box">
                                            @for($s = 1; $s <= 5; $s++)
                                                <span class="fa fa-stack">
                                                    @if($s <= 4)
                                                        <i class="fa fa-star fa-stack-1x"></i>
                                                        <i class="fa fa-star-o fa-stack-1x"></i>
                                                    @else
                                                        <i class="fa fa-star-o fa-stack-1x"></i>
                                                    @endif
                                                </span>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @foreach($featuredProducts->take(3) as $product)
                            @php
                                $image = $product->galleries->first()
                                    ? asset('storage/' . $product->galleries->first()->image)
                                    : asset('frontend/image/catalog/demo/products/product35.png');
                                $productUrl = route('product.show', $product->slug);
                            @endphp
                            <div class="deals-box product-info clearfix">
                                <div class="product-image-right">
                                    <a href="{{ $productUrl }}" class="hv-radial">
                                        <img src="{{ $image }}" alt="{{ $product->name }}">
                                    </a>
                                </div>
                                <div class="box">
                                    <h5 class="product-name">
                                        <a href="{{ $productUrl }}" class="smooth" title="">{{ $product->name }}</a>
                                    </h5>
                                    <div class="price">
                                        @if($product->discount_price)
                                            Rp {{ number_format($product->discount_price, 0, ',', '.') }}
                                            <span class="price-old">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                        @else
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        @endif
                                    </div>
                                    <div class="rating">
                                        <div class="rating-box">
                                            @for($s = 1; $s <= 5; $s++)
                                                <span class="fa fa-stack">
                                                    @if($s <= 4)
                                                        <i class="fa fa-star fa-stack-1x"></i>
                                                        <i class="fa fa-star-o fa-stack-1x"></i>
                                                    @else
                                                        <i class="fa fa-star-o fa-stack-1x"></i>
                                                    @endif
                                                </span>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

        </div>
    </div>
    <!-- //DEALS DAYS -->

    <!-- CATEGORY-TAB-PRODUCT-SLIDER-->
    <div class="category-tab">
        <div class="container">
            <div id="so_listing_tabs_2" class="so-listing-tabs first-load">
                <div class="ltabs-wrap">
                    <div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="starwars"
                        data-ajaxurl="" data-type_source="0" data-lg="4" data-md="3" data-sm="2"
                        data-xs="2" data-margin="30">
                        <!--Begin Tabs-->
                        <div class="ltabs-tabs-wrap">
                            <span class="ltabs-tab-selected"></span>
                            <span class="ltabs-tab-arrow">▼</span>
                            <div class="item-sub-cat">
                                <ul class="ltabs-tabs cf">
                                    <li class="ltabs-tab tab-sel" data-category-id="1"
                                        data-active-content=".items-category-1"> <span class="ltabs-tab-label smooth">Best
                                            <span class="text-style">Seller</span></span> </li>
                                    <li class="ltabs-tab " data-category-id="2" data-active-content=".items-category-2">
                                        <span class="ltabs-tab-label smooth">New <span
                                                class="text-style">Arrivals</span></span>
                                    </li>
                                    <li class="ltabs-tab " data-category-id="3" data-active-content=".items-category-3">
                                        <span class="ltabs-tab-label smooth">Most <span
                                                class="text-style">Rating</span></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Tabs-->

                        <div class="wap-listing-tabs ltabs-items-container products-list grid">
                            <!--Begin Items-->
                            <div class="ltabs-items ltabs-items-selected items-category-1" data-total="16">
                                <div
                                    class="ltabs-items-inner ltabs-slider ltabs00-4 ltabs01-3 ltabs02-3 ltabs03-2 ltabs04-1 none">
                                    <div class="new-arrivals-tab" id="category1">
                                        @foreach ($latestProducts as $product)
                                            <div class="item wow fadeInUp">
                                                <div class="product-box">
                                                    <div class="product-image">
                                                        <a href="{{ route('product.show', $product->slug) }}"
                                                            class="c-img link-product">
                                                            @if ($product->galleries->count() > 0)
                                                                <img src="{{ asset('storage/' . $product->galleries->first()->image) }}"
                                                                    class="img-responsive" alt="{{ $product->name }}">
                                                            @else
                                                                <img src="{{ asset('frontend/image/catalog/demo/products/product1.jpg') }}"
                                                                    class="img-responsive" alt="Default">
                                                            @endif
                                                        </a>
                                                        <a class="smooth quickview iframe-link btn-button quickview quickview_handler visible-lg"
                                                            href="{{ route('product.show', $product->slug) }}"
                                                            title="Lihat Detail" target="_self"
                                                            data-fancybox-type="iframe">
                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <h4 class="product-name"><a
                                                                href="{{ route('product.show', $product->slug) }}"
                                                                class="smooth" title="">{{ $product->name }}</a>
                                                        </h4>
                                                        <div class="price">
                                                            @if ($product->discount_price)
                                                                Rp.
                                                                {{ number_format($product->discount_price, 0, ',', '.') }}
                                                                <span class="price-old">Rp.
                                                                    {{ number_format($product->price, 0, ',', '.') }}</span>
                                                            @else
                                                                Rp. {{ number_format($product->price, 0, ',', '.') }}
                                                            @endif
                                                        </div>
                                                        <div class="rating">
                                                            <div class="rating-box">
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="button-group">
                                                        <button class="wishlist-btn smooth"
                                                            onclick="window.location.href='#'"><i class="fa fa-retweet"
                                                                aria-hidden="true"></i></button>
                                                        <form action="{{ route('cart.add') }}" method="POST"
                                                            style="display:inline-block; margin:0;">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product->id }}">
                                                            <input type="hidden" name="quantity" value="1">
                                                            <button type="submit" class="add-to-cart smooth"
                                                                style="border:none;">ADD TO CART</button>
                                                        </form>
                                                        <button class="wishlist-btn smooth"
                                                            onclick="window.location.href='#'"><i class="fa fa-heart"
                                                                aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- //BANNER -->

                                <!-- //FEATURED-TAB-PRODUCT-SLIDER -->
                                <div class="featured-sale-tab">
                                    <div class="container">
                                        <div class="featured-sale-box">
                                            <h3 class="featured-sale-title">CATEGORIES <span>PRODUCTS</span></h3>
                                            <div id="so_listing_tabs_4" class="so-listing-tabs first-load">
                                                <div class="ltabs-wrap">
                                                    <div class="ltabs-tabs-container clearfix" data-delay="300"
                                                        data-duration="600" data-effect="starwars"
                                                        data-ajaxurl="{{ asset('frontend') }}/" data-type_source="0"
                                                        data-lg="4" data-md="3" data-sm="2" data-xs="2"
                                                        data-margin="30">
                                                        <!--Begin Tabs-->
                                                        <div class="ltabs-tabs-wrap">
                                                            <span class="ltabs-tab-selected"></span>
                                                            <span class="ltabs-tab-arrow">▼</span>
                                                            <div class="item-sub-cat">
                                                                <ul class="ltabs-tabs cf">
                                                                    @foreach ($categories as $index => $category)
                                                                        <li class="ltabs-tab {{ $index == 0 ? 'tab-sel' : '' }}"
                                                                            data-category-id="{{ $category->id }}"
                                                                            data-active-content=".category-{{ $category->id }}">
                                                                            <span
                                                                                class="ltabs-tab-label smooth">{{ $category->name }}</span>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- End Tabs-->

                                                        <div
                                                            class="wap-listing-tabs ltabs-items-container products-list grid">
                                                            <!--Begin Items-->
                                                            @foreach ($categories as $index => $category)
                                                                <div class="ltabs-items {{ $index == 0 ? 'ltabs-items-selected' : '' }} category-{{ $category->id }}"
                                                                    data-total="16">
                                                                    <div
                                                                        class="ltabs-items-inner ltabs-slider ltabs00-4 ltabs01-3 ltabs02-3 ltabs03-2 ltabs04-1 none">
                                                                        <div class="featured-tab-slider">
                                                                            @foreach ($latestProducts->where('category_id', $category->id) as $product)
                                                                                <div class="item-slider">
                                                                                    <div
                                                                                        class="featured-product-box product-box clearfix">
                                                                                        <div class="product-image">
                                                                                            <a href="#"
                                                                                                class="hv-radial">
                                                                                                <img src="{{ $product->galleries->first() ? asset('storage/' . $product->galleries->first()->image) : asset('frontend/image/catalog/demo/products/product22.jpg') }}"
                                                                                                    class="img-responsive"
                                                                                                    alt="">
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="product-info">
                                                                                            <h4 class="product-name">
                                                                                                <a href="#"
                                                                                                    class="smooth"
                                                                                                    title="">{{ $product->name }}</a>
                                                                                            </h4>
                                                                                            <div class="price">Rp
                                                                                                {{ number_format($product->price, 0, ',', '.') }}
                                                                                            </div>
                                                                                            <div class="button-group">
                                                                                                <form
                                                                                                    action="{{ route('cart.add') }}"
                                                                                                    method="POST"
                                                                                                    style="display:inline-block; margin:0;">
                                                                                                    @csrf
                                                                                                    <input type="hidden"
                                                                                                        name="product_id"
                                                                                                        value="{{ $product->id }}">
                                                                                                    <input type="hidden"
                                                                                                        name="quantity"
                                                                                                        value="1">
                                                                                                    <button type="submit"
                                                                                                        class="add-to-cart smooth"
                                                                                                        style="border:none;">ADD
                                                                                                        TO CART</button>
                                                                                                </form>
                                                                                                <button
                                                                                                    class="wishlist-btn smooth"
                                                                                                    onclick="window.location.href='cart.html'">
                                                                                                    <i class="fa fa-heart"
                                                                                                        aria-hidden="true"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            <!--End Items-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- //CATEGORY-TAB-PRODUCT-SLIDER -->
                                        </div>
                                        <!-- //FEATURED-TAB-PRODUCT-SLIDER -->

                                        <!-- CUSTOMER OPINION -->
                                        <div class="customer-opinion">
                                            <div class="container">
                                                <div class="customer-opinion-slider yt-content-slider" data-autoplay="yes"
                                                    data-delay="4" data-speed="0.6" data-margin="0"
                                                    data-items_column00="1" data-items_column0="1" data-items_column1="1"
                                                    data-items_column2="1" data-items_column3="1" data-items_column4="1"
                                                    data-arrows="yes" data-pagination="no" data-lazyload="yes"
                                                    data-loop="yes" data-hoverpause="yes">
                                                    <div class="item clearfix">
                                                        <div class="customer-avatar">
                                                            <img src="{{ asset('frontend/image/catalog/demo/slider/home1/avatar.png') }}"
                                                                class="img-responsive" alt="">
                                                        </div>
                                                        <div class="opinion">
                                                            <p class="opinion-detail">Fusce lorem ante, condimentum in
                                                                massa, posuere bibendum.
                                                                Maecenas euismod vulputate eu rhoncus. Pellentesque commodo
                                                                posuere maximus. Phasellus
                                                                pellentesque pellentesque facilisis.</p>
                                                            <p class="customer-name"><span>JOHN DOE - Designer</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="item clearfix">
                                                        <div class="customer-avatar">
                                                            <img src="{{ asset('frontend/image/catalog/demo/slider/home1/avatar.png') }}"
                                                                class="img-responsive" alt="">
                                                        </div>
                                                        <div class="opinion">
                                                            <p class="opinion-detail">Fusce lorem ante, condimentum in
                                                                massa, posuere bibendum.
                                                                Maecenas euismod vulputate eu rhoncus. Pellentesque commodo
                                                                posuere maximus. Phasellus
                                                                pellentesque pellentesque facilisis.</p>
                                                            <p class="customer-name"><span>JOHN DOE - Designer</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- //CUSTOMER OPINION -->

                                        <!-- CATEGORY-HOT -->
                                        <div class="category-hot">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <h3 class="category-hot-title">new <span>arrival</span></h3>
                                                        <div class="category-hot-slider category-nav-control yt-content-slider"
                                                            data-autoplay="yes" data-delay="4" data-speed="0.6"
                                                            data-margin="30" data-items_column00="1"
                                                            data-items_column0="1" data-items_column1="1"
                                                            data-items_column2="2" data-items_column3="1"
                                                            data-items_column4="1" data-arrows="yes" data-pagination="no"
                                                            data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
                                                            <div class="item-slider">
                                                                @foreach ($latestProducts->take(4) as $product)
                                                                    <div class="category-product-box product-box clearfix">
                                                                        <div class="product-image">
                                                                            <a href="#" class="hv-radial">
                                                                                <img src="{{ $product->galleries->first() ? asset('storage/' . $product->galleries->first()->image) : asset('frontend/image/catalog/demo/products/product22.jpg') }}"
                                                                                    class="img-responsive" alt="">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-info">
                                                                            <h4 class="product-name">
                                                                                <a href="#" class="smooth"
                                                                                    title="">{{ $product->name }}</a>
                                                                            </h4>
                                                                            <div class="price">Rp
                                                                                {{ number_format($product->price, 0, ',', '.') }}
                                                                            </div>
                                                                            <div class="button-group">
                                                                                <button class="add-to-cart smooth"
                                                                                    onclick="window.location.href='cart.html'">
                                                                                    ADD TO CART
                                                                                </button>
                                                                                <button class="wishlist-btn smooth">
                                                                                    <i class="fa fa-heart"
                                                                                        aria-hidden="true"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <h3 class="category-hot-title">best <span>selling</span></h3>
                                                        <div class="category-hot-slider category-nav-control yt-content-slider"
                                                            data-autoplay="yes" data-delay="4" data-speed="0.6"
                                                            data-margin="30" data-items_column00="1"
                                                            data-items_column0="1" data-items_column1="1"
                                                            data-items_column2="2" data-items_column3="1"
                                                            data-items_column4="1" data-arrows="yes" data-pagination="no"
                                                            data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
                                                            <div class="item-slider">
                                                                @foreach ($featuredProducts->take(4) as $product)
                                                                    <div class="category-product-box product-box clearfix">
                                                                        <div class="product-image">
                                                                            <a href="#" class="hv-radial">
                                                                                <img src="{{ $product->galleries->first() ? asset('storage/' . $product->galleries->first()->image) : asset('frontend/image/catalog/demo/products/product22.jpg') }}"
                                                                                    class="img-responsive" alt="">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-info">
                                                                            <h4 class="product-name">
                                                                                <a href="#" class="smooth"
                                                                                    title="">{{ $product->name }}</a>
                                                                            </h4>
                                                                            <div class="price">Rp
                                                                                {{ number_format($product->price, 0, ',', '.') }}
                                                                            </div>
                                                                            <div class="button-group">
                                                                                <button class="add-to-cart smooth"
                                                                                    onclick="window.location.href='cart.html'">
                                                                                    ADD TO CART
                                                                                </button>
                                                                                <button class="wishlist-btn smooth">
                                                                                    <i class="fa fa-heart"
                                                                                        aria-hidden="true"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <h3 class="category-hot-title">Hot<span> sale</span></h3>
                                                        <div class="category-nav-control yt-content-slider"
                                                            id="hot-sale-slider" data-autoplay="no" data-delay="4"
                                                            data-speed="0.6" data-margin="30" data-items_column00="1"
                                                            data-items_column0="1" data-items_column1="2"
                                                            data-items_column2="2" data-items_column3="1"
                                                            data-items_column4="1" data-arrows="yes" data-pagination="no"
                                                            data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
                                                            <div class="item-slider">
                                                                @foreach ($discountProducts->take(4) as $product)
                                                                    <div class="category-product-box product-box clearfix">
                                                                        <div class="product-image">
                                                                            <a href="#" class="hv-radial">
                                                                                <img src="{{ $product->galleries->first() ? asset('storage/' . $product->galleries->first()->image) : asset('frontend/image/catalog/demo/products/product22.jpg') }}"
                                                                                    class="img-responsive" alt="">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-info">
                                                                            <h4 class="product-name">
                                                                                <a href="#" class="smooth"
                                                                                    title="">{{ $product->name }}</a>
                                                                            </h4>
                                                                            <div class="price">Rp
                                                                                {{ number_format($product->price, 0, ',', '.') }}
                                                                            </div>
                                                                            <div class="button-group">
                                                                                <button class="add-to-cart smooth"
                                                                                    onclick="window.location.href='cart.html'">
                                                                                    ADD TO CART
                                                                                </button>
                                                                                <button class="wishlist-btn smooth">
                                                                                    <i class="fa fa-heart"
                                                                                        aria-hidden="true"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- //CATEGORY-HOT -->


                                        <!-- //CATEGORY-TAB-PRODUCT-SLIDER -->
                                        <div class="category-tab" style="display: none;">
                                            <div class="container">
                                                <div id="so_listing_tabs_3" class="so-listing-tabs first-load">
                                                    <div class="ltabs-wrap">
                                                        <div class="ltabs-tabs-container" data-delay="300"
                                                            data-duration="600" data-effect="starwars"
                                                            data-ajaxurl="{{ asset('frontend') }}/" data-type_source="0"
                                                            data-lg="4" data-md="3" data-sm="2" data-xs="2"
                                                            data-margin="30">
                                                            <!--Begin Tabs-->
                                                            <div class="ltabs-tabs-wrap">
                                                                <span class="ltabs-tab-selected"></span>
                                                                <span class="ltabs-tab-arrow">▼</span>
                                                                <div class="item-sub-cat">
                                                                    <ul class="ltabs-tabs cf">
                                                                        <li class="ltabs-tab tab-sel" data-category-id="1"
                                                                            data-active-content=".brand-1"> <span
                                                                                class="ltabs-tab-label smooth">Best <span
                                                                                    class="text-style">Seller</span></span>
                                                                        </li>
                                                                        <li class="ltabs-tab " data-category-id="2"
                                                                            data-active-content=".brand-2"> <span
                                                                                class="ltabs-tab-label smooth">New
                                                                                <span
                                                                                    class="text-style">Arrivals</span></span>
                                                                        </li>
                                                                        <li class="ltabs-tab " data-category-id="3"
                                                                            data-active-content=".brand-3"> <span
                                                                                class="ltabs-tab-label smooth">Most <span
                                                                                    class="text-style">Rating</span></span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <!-- End Tabs-->

                                                            <div
                                                                class="wap-listing-tabs ltabs-items-container products-list grid">
                                                                <!--Begin Items-->
                                                                <div class="ltabs-items ltabs-items-selected brand-1"
                                                                    data-total="16">
                                                                    <div
                                                                        class="ltabs-items-inner ltabs-slider ltabs00-4 ltabs01-3 ltabs02-3 ltabs03-2 ltabs04-1 none">
                                                                        tab1
                                                                    </div>
                                                                </div>
                                                                <div class="ltabs-items brand-2 grid" data-total="16">
                                                                    <div
                                                                        class="ltabs-items-inner ltabs-slider ltabs00-4 ltabs01-3 ltabs02-3 ltabs03-2 ltabs04-1 none">
                                                                        tab2
                                                                    </div>
                                                                </div>
                                                                <div class="ltabs-items brand-3 grid" data-total="16">
                                                                    <div
                                                                        class="ltabs-items-inner ltabs-slider ltabs00-4 ltabs01-3 ltabs02-3 ltabs03-2 ltabs04-1 none">
                                                                        tab3
                                                                    </div>
                                                                </div>
                                                                <!--End Items-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- //CATEGORY-TAB-PRODUCT-SLIDER -->
                                        </div>
                                        <!-- //CATEGORY-TAB-PRODUCT-SLIDER -->


                                        <!-- FOOTER -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

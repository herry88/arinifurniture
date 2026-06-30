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

    <!-- NEW ARRIVALS -->
    <section class="elegant-section mt-5 mb-5 pt-5 pb-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2 class="elegant-title">New Arrivals</h2>
                <p class="elegant-subtitle">Discover our latest premium furniture collections</p>
                <div class="elegant-divider"></div>
            </div>
            
            <div class="row">
                @foreach ($latestProducts->take(8) as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="elegant-product-card">
                            <div class="elegant-product-image">
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <img src="{{ $product->galleries->first() ? asset('storage/' . $product->galleries->first()->image) : asset('frontend/image/catalog/demo/products/product1.jpg') }}" alt="{{ $product->name }}">
                                </a>
                                <div class="elegant-product-actions">
                                    <form action="{{ route('cart.add') }}" method="POST" style="display:inline-block; margin:0; width:100%;">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="elegant-btn-add"><i class="fa fa-shopping-cart"></i> ADD TO CART</button>
                                    </form>
                                </div>
                            </div>
                            <div class="elegant-product-info text-center">
                                <h4 class="product-title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h4>
                                <div class="product-price">
                                    @if ($product->discount_price)
                                        <span class="price-new">Rp {{ number_format($product->discount_price, 0, ',', '.') }}</span>
                                        <span class="price-old">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    @else
                                        <span class="price-new">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- BEST SELLERS -->
    <section class="elegant-section mt-5 mb-5 pt-5 pb-5" style="background-color: #fcfbf9;">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2 class="elegant-title">Best Sellers</h2>
                <p class="elegant-subtitle">Our most loved and highly rated pieces</p>
                <div class="elegant-divider"></div>
            </div>
            
            <div class="row">
                @foreach ($featuredProducts->take(8) as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="elegant-product-card">
                            <div class="elegant-product-image">
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <img src="{{ $product->galleries->first() ? asset('storage/' . $product->galleries->first()->image) : asset('frontend/image/catalog/demo/products/product1.jpg') }}" alt="{{ $product->name }}">
                                </a>
                                <div class="elegant-product-actions">
                                    <form action="{{ route('cart.add') }}" method="POST" style="display:inline-block; margin:0; width:100%;">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="elegant-btn-add"><i class="fa fa-shopping-cart"></i> ADD TO CART</button>
                                    </form>
                                </div>
                            </div>
                            <div class="elegant-product-info text-center">
                                <h4 class="product-title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h4>
                                <div class="product-price">
                                    @if ($product->discount_price)
                                        <span class="price-new">Rp {{ number_format($product->discount_price, 0, ',', '.') }}</span>
                                        <span class="price-old">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    @else
                                        <span class="price-new">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- SHOP BY CATEGORY -->
    <section class="elegant-section mt-5 mb-5 pt-5 pb-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2 class="elegant-title">Shop by Category</h2>
                <p class="elegant-subtitle">Find exactly what you need for your home</p>
                <div class="elegant-divider"></div>
            </div>
            
            <div class="row">
                @foreach ($categories->take(4) as $category)
                    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                        <div class="elegant-category-card">
                            <a href="#">
                                <div class="category-image-wrap">
                                    <img src="{{ $category->image ? asset('storage/' . $category->image) : asset('frontend/image/catalog/demo/slider/home1/room.png') }}" alt="{{ $category->name }}" class="img-responsive">
                                    <div class="category-overlay">
                                        <h3 class="category-name">{{ $category->name }}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
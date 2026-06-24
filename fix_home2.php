<?php
$file = 'resources/views/frontend/home.blade.php';
$content = file_get_contents($file);

$startMarker = '<!-- CATEGORY-HOT -->';
$endMarker = '<!-- //CATEGORY-HOT -->';

$startPos = strpos($content, $startMarker);
$endPos = strpos($content, $endMarker, $startPos);

if ($startPos !== false && $endPos !== false) {
    $endPos += strlen($endMarker);

    $replacement = <<<'EOD'
<!-- CATEGORY-HOT -->
<div class="category-hot">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <h3 class="category-hot-title">new <span>arrival</span></h3>
                <div class="category-hot-slider category-nav-control yt-content-slider" data-autoplay="yes"
                    data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="1"
                    data-items_column0="1" data-items_column1="1" data-items_column2="2"
                    data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no"
                    data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
                    <div class="item-slider">
                        @foreach($products->take(4) as $product)
                        <div class="category-product-box product-box clearfix">
                            <div class="product-image">
                                <a href="#" class="hv-radial">
                                    <img src="{{ $product->galleries->first() ? asset('storage/' . $product->galleries->first()->image) : asset('frontend/image/catalog/demo/products/product22.jpg') }}"
                                        class="img-responsive" alt="">
                                </a>
                            </div>
                            <div class="product-info">
                                <h4 class="product-name">
                                    <a href="#" class="smooth" title="">{{ $product->name }}</a>
                                </h4>
                                <div class="price">Rp {{ number_format($product->price, 0, ',', '.') }} </div>
                                <div class="button-group">
                                    <button class="add-to-cart smooth"
                                        onclick="window.location.href='cart.html'">
                                        ADD TO CART
                                    </button>
                                    <button class="wishlist-btn smooth">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
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
                <div class="category-hot-slider category-nav-control yt-content-slider" data-autoplay="yes"
                    data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="1"
                    data-items_column0="1" data-items_column1="1" data-items_column2="2"
                    data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no"
                    data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
                    <div class="item-slider">
                        @foreach($products->skip(4)->take(4) as $product)
                        <div class="category-product-box product-box clearfix">
                            <div class="product-image">
                                <a href="#" class="hv-radial">
                                    <img src="{{ $product->galleries->first() ? asset('storage/' . $product->galleries->first()->image) : asset('frontend/image/catalog/demo/products/product22.jpg') }}"
                                        class="img-responsive" alt="">
                                </a>
                            </div>
                            <div class="product-info">
                                <h4 class="product-name">
                                    <a href="#" class="smooth" title="">{{ $product->name }}</a>
                                </h4>
                                <div class="price">Rp {{ number_format($product->price, 0, ',', '.') }} </div>
                                <div class="button-group">
                                    <button class="add-to-cart smooth"
                                        onclick="window.location.href='cart.html'">
                                        ADD TO CART
                                    </button>
                                    <button class="wishlist-btn smooth">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
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
                <div class="category-nav-control yt-content-slider" id="hot-sale-slider" data-autoplay="no"
                    data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="1"
                    data-items_column0="1" data-items_column1="2" data-items_column2="2"
                    data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no"
                    data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
                    <div class="item-slider">
                        @foreach($products->skip(8)->take(4) as $product)
                        <div class="category-product-box product-box clearfix">
                            <div class="product-image">
                                <a href="#" class="hv-radial">
                                    <img src="{{ $product->galleries->first() ? asset('storage/' . $product->galleries->first()->image) : asset('frontend/image/catalog/demo/products/product22.jpg') }}"
                                        class="img-responsive" alt="">
                                </a>
                            </div>
                            <div class="product-info">
                                <h4 class="product-name">
                                    <a href="#" class="smooth" title="">{{ $product->name }}</a>
                                </h4>
                                <div class="price">Rp {{ number_format($product->price, 0, ',', '.') }} </div>
                                <div class="button-group">
                                    <button class="add-to-cart smooth"
                                        onclick="window.location.href='cart.html'">
                                        ADD TO CART
                                    </button>
                                    <button class="wishlist-btn smooth">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
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
EOD;

    $newContent = substr($content, 0, $startPos) . $replacement . substr($content, $endPos);
    file_put_contents($file, $newContent);
    echo "Successfully replaced the CATEGORY-HOT block.\n";
} else {
    echo "Could not find start or end markers.\n";
}

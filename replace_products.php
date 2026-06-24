<?php
$file = 'resources/views/frontend/home.blade.php';
$lines = file($file);

$start_idx = -1;
$end_idx = -1;

for ($i = 0; $i < count($lines); $i++) {
    if (strpos($lines[$i], '<div class="new-arrivals-tab" id="category1">') !== false) {
        $start_idx = $i;
    }
    if ($start_idx !== -1 && $i > $start_idx && strpos($lines[$i], '<!--End Items-->') !== false) {
        $end_idx = $i;
        break;
    }
}

if ($start_idx !== -1 && $end_idx !== -1) {
    $dynamic_product = <<<'HTML'
                                        <div class="new-arrivals-tab" id="category1">
                                            @foreach($products as $product)
                                            <div class="item wow fadeInUp">
                                                <div class="product-box">
                                                    <div class="product-image">
                                                        <a href="#" class="c-img link-product">
                                                            @if($product->galleries->count() > 0)
                                                                <img src="{{ asset('storage/'.$product->galleries->first()->image) }}" class="img-responsive" alt="{{ $product->name }}">
                                                            @else
                                                                <img src="{{ asset('frontend/image/catalog/demo/products/product1.jpg') }}" class="img-responsive" alt="Default">
                                                            @endif
                                                        </a>
                                                        <a class="smooth quickview iframe-link btn-button quickview quickview_handler visible-lg" href="#" title="Quick view" target="_self" data-fancybox-type="iframe">
                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <h4 class="product-name"><a href="#" class="smooth" title="">{{ $product->name }}</a></h4>
                                                        <div class="price">
                                                            Rp. {{ number_format($product->price, 0, ',', '.') }}
                                                        </div>
                                                        <div class="rating">
                                                            <div class="rating-box">
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="button-group">
                                                        <button class="wishlist-btn smooth" onclick="window.location.href='#'"><i class="fa fa-retweet" aria-hidden="true"></i></button>
                                                        <button class="add-to-cart smooth" onclick="window.location.href='#'">ADD TO CART</button>
                                                        <button class="wishlist-btn smooth" onclick="window.location.href='#'"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
HTML;
    array_splice($lines, $start_idx, $end_idx - $start_idx, [$dynamic_product . "\n"]);
    file_put_contents($file, implode("", $lines));
    echo "Replaced static products with dynamic loop.\n";
} else {
    echo "Could not find start or end tags.\n";
}

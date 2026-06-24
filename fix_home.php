<?php
$file = 'resources/views/frontend/home.blade.php';
$content = file_get_contents($file);

$startMarker = '<div class="featured-sale-box">';
$endMarker = '<!-- //CATEGORY-TAB-PRODUCT-SLIDER -->';

$startPos = strpos($content, $startMarker);
$endPos = strpos($content, $endMarker, $startPos);

if ($startPos !== false && $endPos !== false) {
    $endPos += strlen($endMarker);

    $replacement = <<<'EOD'
<div class="featured-sale-box">
    <h3 class="featured-sale-title">CATEGORIES <span>PRODUCTS</span></h3>
    <div id="so_listing_tabs_4" class="so-listing-tabs first-load">
        <div class="ltabs-wrap">
            <div class="ltabs-tabs-container clearfix" data-delay="300" data-duration="600"
                data-effect="starwars" data-ajaxurl="" data-type_source="0" data-lg="4"
                data-md="3" data-sm="2" data-xs="2" data-margin="30">
                <!--Begin Tabs-->
                <div class="ltabs-tabs-wrap">
                    <span class="ltabs-tab-selected"></span>
                    <span class="ltabs-tab-arrow">▼</span>
                    <div class="item-sub-cat">
                        <ul class="ltabs-tabs cf">
                            @foreach($categories as $index => $category)
                            <li class="ltabs-tab {{ $index == 0 ? 'tab-sel' : '' }}" data-category-id="{{ $category->id }}"
                                data-active-content=".category-{{ $category->id }}"> <span
                                    class="ltabs-tab-label smooth">{{ $category->name }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- End Tabs-->

                <div class="wap-listing-tabs ltabs-items-container products-list grid">
                    <!--Begin Items-->
                    @foreach($categories as $index => $category)
                    <div class="ltabs-items {{ $index == 0 ? 'ltabs-items-selected' : '' }} category-{{ $category->id }}" data-total="16">
                        <div class="ltabs-items-inner ltabs-slider ltabs00-4 ltabs01-3 ltabs02-3 ltabs03-2 ltabs04-1 none">
                            <div class="featured-tab-slider">
                                @foreach($products->where('category_id', $category->id) as $product)
                                <div class="item-slider">
                                    <div class="featured-product-box product-box clearfix">
                                        <div class="product-image">
                                            <a href="#" class="hv-radial">
                                                <img src="{{ $product->galleries->first() ? asset('storage/' . $product->galleries->first()->image) : asset('frontend/image/catalog/demo/products/product22.jpg') }}" class="img-responsive" alt="">
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h4 class="product-name">
                                                <a href="#" class="smooth" title="">{{ $product->name }}</a>
                                            </h4>
                                            <div class="price">Rp {{ number_format($product->price, 0, ',', '.') }} </div>
                                            <div class="button-group">
                                                <button class="add-to-cart smooth" onclick="window.location.href='cart.html'">
                                                    ADD TO CART
                                                </button>
                                                <button class="wishlist-btn smooth" onclick="window.location.href='cart.html'">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
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
EOD;

    $newContent = substr($content, 0, $startPos) . $replacement . substr($content, $endPos);
    file_put_contents($file, $newContent);
    echo "Successfully replaced the categories products block.\n";
} else {
    echo "Could not find start or end markers.\n";
}

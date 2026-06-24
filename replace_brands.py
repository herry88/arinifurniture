import sys
import re

file_path = r"d:\laravel20262\arinifurniture\resources\views\frontend\home.blade.php"

with open(file_path, "r", encoding="utf-8") as f:
    content = f.read()

start_marker = '<div class="cleafix">'
end_marker = '<!-- //BRAND -->'

# Find the start and end of the brand section
# The first <div class="cleafix"> after <!-- BRAND --> or near line 1403
brand_comment = '<!-- BRAND -->'
if brand_comment in content:
    start_idx = content.find(brand_comment)
else:
    start_idx = content.find(start_marker, content.find('featured-title'))

end_idx = content.find(end_marker) + len(end_marker)

if start_idx == -1 or end_idx == -1 or end_idx <= start_idx:
    print("Could not find brand section bounds")
    sys.exit(1)

dynamic_brands = """<!-- BRAND -->
                                        <div class="brand">
                                            <div class="container">
                                                <div class="cleafix">
                                                    @if(isset($brands) && $brands->count() > 0)
                                                        @php
                                                            $half = ceil($brands->count() / 2);
                                                            $leftBrands = $brands->slice(0, $half);
                                                            $rightBrands = $brands->slice($half);
                                                        @endphp
                                                        <div class="brand-left">
                                                            <ul class="nav nav-tabs">
                                                                <li class="brand-title-box">
                                                                    <h3 class="brand-title featured-title">
                                                                        <span>
                                                                            FEATURED <span>BRANDS</span>
                                                                        </span>
                                                                    </h3>
                                                                </li>
                                                                @foreach($leftBrands as $index => $brand)
                                                                <li class="{{ $loop->first ? 'active' : '' }}">
                                                                    <a data-toggle="tab" href="#brand{{ $brand->id }}">
                                                                        @if($brand->logo)
                                                                            <img src="{{ asset('storage/' . $brand->logo) }}" class="img-responsive" alt="{{ $brand->name }}">
                                                                        @else
                                                                            <span class="text-center" style="display:block; padding:15px; font-weight:bold;">{{ $brand->name }}</span>
                                                                        @endif
                                                                    </a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="brand-center">
                                                            <div class="tab-content">
                                                                @foreach($brands as $index => $brand)
                                                                <div id="brand{{ $brand->id }}" class="tab-pane fade {{ $loop->first ? 'in active' : '' }}">
                                                                    @if($brand->background_image)
                                                                        <img src="{{ asset('storage/' . $brand->background_image) }}" class="img-responsive" alt="{{ $brand->name }}" style="width: 100%; height: auto;">
                                                                    @endif
                                                                    <div class="brand-info">
                                                                        @if($brand->description)
                                                                            <p class="brand-desc">{{ $brand->description }}</p>
                                                                        @endif
                                                                        @if($brand->link)
                                                                            <a href="{{ $brand->link }}" class="smooth shop-now">SHOP NOW</a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="brand-left brand-right">
                                                            <ul class="nav nav-tabs">
                                                                @foreach($rightBrands as $index => $brand)
                                                                <li>
                                                                    <a data-toggle="tab" href="#brand{{ $brand->id }}">
                                                                        @if($brand->logo)
                                                                            <img src="{{ asset('storage/' . $brand->logo) }}" class="img-responsive" alt="{{ $brand->name }}">
                                                                        @else
                                                                            <span class="text-center" style="display:block; padding:15px; font-weight:bold;">{{ $brand->name }}</span>
                                                                        @endif
                                                                    </a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @else
                                                        <!-- Fallback -->
                                                        <div class="brand-left">
                                                            <ul class="nav nav-tabs">
                                                                <li class="brand-title-box">
                                                                    <h3 class="brand-title featured-title">
                                                                        <span>
                                                                            FEATURED <span>BRANDS</span>
                                                                        </span>
                                                                    </h3>
                                                                </li>
                                                                <li class="active">
                                                                    <a data-toggle="tab" href="#brand1">
                                                                        <img src="{{ asset('frontend/image/catalog/demo/brand/brand-5.jpg') }}" class="img-responsive" alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a data-toggle="tab" href="#brand2">
                                                                        <img src="{{ asset('frontend/image/catalog/demo/brand/brand-6.jpg') }}" class="img-responsive" alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a data-toggle="tab" href="#brand3">
                                                                        <img src="{{ asset('frontend/image/catalog/demo/slider/home1/brand1.png') }}" class="img-responsive" alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="brand-center">
                                                            <div class="tab-content">
                                                                <div id="brand1" class="tab-pane fade in active">
                                                                    <img src="{{ asset('frontend/image/catalog/demo/slider/home1/brand-bg.png') }}" class="img-responsive" alt="">
                                                                    <div class="brand-info">
                                                                        <p class="brand-desc">Nokia Corporation is a Finnish multinational communications and information technology company.</p>
                                                                        <a href="#" class="smooth shop-now">SHOP NOW</a>
                                                                    </div>
                                                                </div>
                                                                <div id="brand2" class="tab-pane fade">
                                                                    <img src="{{ asset('frontend/image/catalog/demo/slider/home1/brand-bg.png') }}" class="img-responsive" alt="">
                                                                    <div class="brand-info">
                                                                        <p class="brand-desc">Nokia Corporation is a Finnish multinational communications and information technology company.</p>
                                                                        <a href="#" class="smooth shop-now">SHOP NOW</a>
                                                                    </div>
                                                                </div>
                                                                <div id="brand3" class="tab-pane fade">
                                                                    <img src="{{ asset('frontend/image/catalog/demo/slider/home1/brand-bg.png') }}" class="img-responsive" alt="">
                                                                    <div class="brand-info">
                                                                        <p class="brand-desc">Nokia Corporation is a Finnish multinational communications and information technology company.</p>
                                                                        <a href="#" class="smooth shop-now">SHOP NOW</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="brand-left brand-right">
                                                            <ul class="nav nav-tabs">
                                                                <li>
                                                                    <a data-toggle="tab" href="#brand4">
                                                                        <img src="{{ asset('frontend/image/catalog/demo/slider/home1/brand3.png') }}" class="img-responsive" alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a data-toggle="tab" href="#brand5">
                                                                        <img src="{{ asset('frontend/image/catalog/demo/slider/home1/brand4.png') }}" class="img-responsive" alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a data-toggle="tab" href="#brand6">
                                                                        <img src="{{ asset('frontend/image/catalog/demo/slider/home1/brand5.png') }}" class="img-responsive" alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- //BRAND -->"""

new_content = content[:start_idx] + dynamic_brands + content[end_idx:]

with open(file_path, "w", encoding="utf-8") as f:
    f.write(new_content)

print("Successfully replaced brands section in home.blade.php")

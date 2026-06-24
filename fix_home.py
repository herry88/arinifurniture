import sys

file_path = "d:\\laravel20262\\arinifurniture\\resources\\views\\frontend\\home.blade.php"

with open(file_path, "r", encoding="utf-8") as f:
    content = f.read()

start_marker = "    <!-- HOME-SLIDER -->"
end_marker = "    <!-- //HOME-SLIDER -->"

if start_marker not in content or end_marker not in content:
    print("Markers not found!")
    sys.exit(1)

start_idx = content.find(start_marker)
end_idx = content.find(end_marker) + len(end_marker)

correct_slider = """    <!-- HOME-SLIDER -->
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
                                        <h2 class="big-title"><span class="small-title">{{ $slider->subtitle }}</span> {{ $slider->title }}</h2>
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
                                    <a href="{{ $slider->link }}" class="smooth see-more" title="">{{ $slider->button_text ?: 'SHOP NOW' }}</a>
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

    <!-- BANNER -->
    <div class="banner" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="container">
            <div class="row row0">
                @php
                    $fallbackImages = [
                        'frontend/image/catalog/demo/slider/home1/collection.png',
                        'frontend/image/catalog/demo/banners/home3/banner2.png',
                        'frontend/image/catalog/demo/banners/home3/banner3.png'
                    ];
                @endphp
                
                @for($i = 0; $i < 3; $i++)
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 col0">
                        <div class="collection">
                            @if(isset($promoBanners) && isset($promoBanners[$i]))
                                <a href="{{ $promoBanners[$i]->link }}" class="hv-full-light">
                                    <img src="{{ asset('storage/' . $promoBanners[$i]->image) }}" class="img-responsive"
                                        alt="{{ $promoBanners[$i]->title }}">
                                </a>
                            @else
                                <a href="#" class="hv-full-light">
                                    <img src="{{ asset($fallbackImages[$i]) }}" class="img-responsive" alt="Fallback">
                                </a>
                            @endif
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <!-- //BANNER -->"""

new_content = content[:start_idx] + correct_slider + content[end_idx:]

with open(file_path, "w", encoding="utf-8") as f:
    f.write(new_content)

print("Successfully fixed home.blade.php")

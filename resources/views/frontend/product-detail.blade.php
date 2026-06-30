@extends('frontend.master')

@section('content')
    <div class="main-container container" style="padding: 30px 15px 60px;">
        <!-- Breadcrumb -->
        <ul class="breadcrumb" style="background:transparent; padding:10px 0; margin-bottom:25px; font-size:13px;">
            <li><a href="{{ route('home') }}" style="color:#c8a96e;"><i class="fa fa-home"></i> Beranda</a></li>
            <li><span style="color:#9a8a7a;">{{ $product->category->name ?? 'Produk' }}</span></li>
            <li><span style="color:#3a2a1a; font-weight:600;">{{ $product->name }}</span></li>
        </ul>

        <!-- Alert -->
        @if (session('success'))
            <div
                style="background:#d4edda; color:#155724; padding:12px 16px; border-radius:8px; margin-bottom:20px; font-size:14px;">
                <i class="fa fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Product Detail Section -->
        <div class="row">
            <!-- Product Images -->
            <div class="col-md-6">
                <div style="background:#f8f4f0; border-radius:12px; overflow:hidden; margin-bottom:15px;">
                    @if ($product->galleries->count() > 0)
                        <img id="mainImage" src="{{ asset('storage/' . $product->galleries->first()->image) }}"
                            alt="{{ $product->name }}" style="width:100%; height:420px; object-fit:cover;">
                    @else
                        <img src="{{ asset('frontend/image/catalog/demo/products/product1.jpg') }}"
                            alt="{{ $product->name }}" style="width:100%; height:420px; object-fit:cover;">
                    @endif
                </div>
                <!-- Thumbnail Gallery -->
                @if ($product->galleries->count() > 1)
                    <div style="display:flex; gap:10px; flex-wrap:wrap;">
                        @foreach ($product->galleries as $gallery)
                            <div onclick="document.getElementById('mainImage').src='{{ asset('storage/' . $gallery->image) }}'"
                                style="width:80px; height:80px; border-radius:8px; overflow:hidden; cursor:pointer; border:2px solid #e8e0d5; transition:border-color 0.2s;"
                                onmouseover="this.style.borderColor='#c8a96e'"
                                onmouseout="this.style.borderColor='#e8e0d5'">
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt=""
                                    style="width:100%; height:100%; object-fit:cover;">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Product Info -->
            <div class="col-md-6">
                <div style="padding: 0 10px;">
                    <!-- Category Badge -->
                    @if ($product->category)
                        <span
                            style="background:#f0e8df; color:#c8a96e; font-size:12px; font-weight:600; padding:4px 12px; border-radius:20px; display:inline-block; margin-bottom:12px;">
                            {{ $product->category->name }}
                        </span>
                    @endif

                    <h1 style="font-size:28px; font-weight:700; color:#3a2a1a; margin:0 0 15px; line-height:1.3;">
                        {{ $product->name }}
                    </h1>

                    <!-- Price -->
                    <div style="margin-bottom:20px;">
                        @if ($product->discount_price)
                            <div style="font-size:30px; font-weight:700; color:#c8a96e; line-height:1;">
                                Rp {{ number_format($product->discount_price, 0, ',', '.') }}
                            </div>
                            <div style="font-size:16px; color:#9a8a7a; text-decoration:line-through; margin-top:4px;">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                            <span
                                style="background:#e74c3c; color:#fff; font-size:12px; font-weight:700; padding:3px 10px; border-radius:20px; margin-top:6px; display:inline-block;">
                                DISKON {{ round((($product->price - $product->discount_price) / $product->price) * 100) }}%
                            </span>
                        @else
                            <div style="font-size:30px; font-weight:700; color:#c8a96e;">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        @endif
                    </div>

                    <!-- Stock Info -->
                    <div style="display:flex; align-items:center; gap:8px; margin-bottom:20px; font-size:14px;">
                        @if ($product->stock > 10)
                            <span
                                style="background:#d4edda; color:#155724; padding:4px 12px; border-radius:20px; font-weight:600;">
                                <i class="fa fa-check-circle"></i> Tersedia ({{ $product->stock }})
                            </span>
                        @elseif($product->stock > 0)
                            <span
                                style="background:#fff3cd; color:#856404; padding:4px 12px; border-radius:20px; font-weight:600;">
                                <i class="fa fa-exclamation-circle"></i> Stok Terbatas ({{ $product->stock }})
                            </span>
                        @else
                            <span
                                style="background:#f8d7da; color:#721c24; padding:4px 12px; border-radius:20px; font-weight:600;">
                                <i class="fa fa-times-circle"></i> Stok Habis
                            </span>
                        @endif
                        @if ($product->sku)
                            <span style="color:#9a8a7a; font-size:12px;">SKU: {{ $product->sku }}</span>
                        @endif
                    </div>

                    <!-- Divider -->
                    <hr style="border:none; border-top:1px solid #f0e8df; margin:20px 0;">

                    <!-- Add to Cart Form -->
                    @if ($product->stock > 0)
                        @auth
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div style="display:flex; align-items:center; gap:15px; margin-bottom:20px; flex-wrap:wrap;">
                                    <div>
                                        <label
                                            style="display:block; font-weight:600; color:#3a2a1a; margin-bottom:8px; font-size:13px;">Jumlah:</label>
                                        <div
                                            style="display:flex; align-items:center; border:2px solid #e8e0d5; border-radius:8px; overflow:hidden;">
                                            <button type="button" onclick="if(qty.value>1)qty.value--"
                                                style="background:#f8f4f0; border:none; padding:10px 16px; cursor:pointer; font-size:16px; font-weight:bold; color:#5a3e2b;">−</button>
                                            <input type="number" name="quantity" id="qty" value="1" min="1"
                                                max="{{ $product->stock }}"
                                                style="border:none; text-align:center; width:50px; font-size:15px; font-weight:600; color:#3a2a1a; outline:none;">
                                            <button type="button" onclick="if(qty.value<{{ $product->stock }})qty.value++"
                                                style="background:#f8f4f0; border:none; padding:10px 16px; cursor:pointer; font-size:16px; font-weight:bold; color:#5a3e2b;">+</button>
                                        </div>
                                    </div>
                                    <div style="margin-top:22px; flex:1;">
                                        <button type="submit"
                                            style="width:100%; padding:12px 20px; background:linear-gradient(135deg,#c8a96e,#a07848); color:#fff; border:none; border-radius:10px; font-size:14px; font-weight:700; cursor:pointer; letter-spacing:0.5px; transition:all 0.3s;"
                                            onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                                            <i class="fa fa-shopping-cart"></i> TAMBAH KE KERANJANG
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <a href="{{ route('checkout.index') }}"
                                style="display:block; text-align:center; padding:12px; border:2px solid #c8a96e; color:#c8a96e; border-radius:10px; font-size:14px; font-weight:700; text-decoration:none; transition:all 0.3s; margin-top:5px;"
                                onmouseover="this.style.background='#c8a96e'; this.style.color='#fff'"
                                onmouseout="this.style.background='transparent'; this.style.color='#c8a96e'">
                                <i class="fa fa-bolt"></i> BELI SEKARANG
                            </a>
                        @else
                            <div
                                style="background:#fff3cd; color:#856404; padding:16px; border-radius:10px; margin-bottom:20px; font-size:14px; text-align:center;">
                                <i class="fa fa-lock"></i> Silakan <a href="{{ route('login') }}"
                                    style="color:#c8a96e; font-weight:700;">Login</a> atau <a href="{{ route('register') }}"
                                    style="color:#c8a96e; font-weight:700;">Daftar</a> untuk menambahkan ke keranjang.
                            </div>
                        @endauth
                    @endif

                    <!-- Product Specs -->
                    <div style="background:#f8f4f0; border-radius:10px; padding:18px; margin-top:20px;">
                        <h5 style="font-weight:700; color:#3a2a1a; margin:0 0 12px; font-size:14px;"><i
                                class="fa fa-info-circle" style="color:#c8a96e;"></i> Informasi Produk</h5>
                        <table style="width:100%; font-size:13px; color:#7a6555;">
                            <tr>
                                <td style="padding:4px 0; width:40%;">Berat</td>
                                <td style="color:#3a2a1a;">:
                                    {{ $product->weight ? number_format($product->weight) . ' gram' : '-' }}</td>
                            </tr>
                            @if ($product->category)
                                <tr>
                                    <td style="padding:4px 0;">Kategori</td>
                                    <td style="color:#3a2a1a;">: {{ $product->category->name }}</td>
                                </tr>
                            @endif
                            @if ($product->sku)
                                <tr>
                                    <td style="padding:4px 0;">SKU</td>
                                    <td style="color:#3a2a1a;">: {{ $product->sku }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Description -->
        @if ($product->description)
            <div style="margin-top:50px;">
                <div
                    style="border-bottom:3px solid #c8a96e; padding-bottom:12px; margin-bottom:25px; display:flex; align-items:center; gap:12px;">
                    <h3 style="font-size:20px; font-weight:700; color:#3a2a1a; margin:0;">Deskripsi Produk</h3>
                </div>
                <div
                    style="color:#7a6555; font-size:14px; line-height:1.9; background:#f8f4f0; border-radius:10px; padding:25px;">
                    {!! nl2br(e($product->description)) !!}
                </div>
            </div>
        @endif

        <!-- Related Products -->
        @if ($relatedProducts->count() > 0)
            <div style="margin-top:60px;">
                <div style="border-bottom:3px solid #c8a96e; padding-bottom:12px; margin-bottom:25px;">
                    <h3 style="font-size:20px; font-weight:700; color:#3a2a1a; margin:0;">Produk Terkait</h3>
                </div>
                <div class="row">
                    @foreach ($relatedProducts as $related)
                        <div class="col-md-3 col-sm-4 col-xs-6">
                            <div style="background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 4px 20px rgba(90,62,43,0.08); margin-bottom:25px; transition:transform 0.3s, box-shadow 0.3s;"
                                onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 30px rgba(90,62,43,0.15)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(90,62,43,0.08)'">
                                <a href="{{ route('product.show', $related->slug) }}">
                                    @if ($related->galleries->count() > 0)
                                        <img src="{{ asset('storage/' . $related->galleries->first()->image) }}"
                                            alt="{{ $related->name }}"
                                            style="width:100%; height:180px; object-fit:cover;">
                                    @else
                                        <img src="{{ asset('frontend/image/catalog/demo/products/product1.jpg') }}"
                                            alt="{{ $related->name }}"
                                            style="width:100%; height:180px; object-fit:cover;">
                                    @endif
                                </a>
                                <div style="padding:15px;">
                                    <h5
                                        style="font-size:14px; font-weight:600; color:#3a2a1a; margin:0 0 8px; line-height:1.4; min-height:38px;">
                                        <a href="{{ route('product.show', $related->slug) }}"
                                            style="color:#3a2a1a; text-decoration:none;">{{ Str::limit($related->name, 40) }}</a>
                                    </h5>
                                    <div style="font-weight:700; color:#c8a96e; font-size:15px;">Rp
                                        {{ number_format($related->discount_price ?? $related->price, 0, ',', '.') }}</div>
                                    <form action="{{ route('cart.add') }}" method="POST" style="margin-top:10px;">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $related->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit"
                                            style="width:100%; padding:8px; background:linear-gradient(135deg,#c8a96e,#a07848); color:#fff; border:none; border-radius:8px; font-size:12px; font-weight:700; cursor:pointer;">
                                            <i class="fa fa-shopping-cart"></i> Tambah ke Keranjang
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection

@extends('frontend.master')

@section('content')

<style>
/* ===== SEARCH PAGE STYLES ===== */
.search-page-hero {
    background: linear-gradient(135deg, #2c1810 0%, #5a3825 50%, #2c1810 100%);
    padding: 40px 0 30px;
    margin-bottom: 0;
}

.search-page-hero h1 {
    color: #fff;
    font-size: 26px;
    font-weight: 700;
    margin-bottom: 8px;
    letter-spacing: 1px;
}

.search-page-hero p {
    color: rgba(255,255,255,0.75);
    font-size: 14px;
    margin: 0;
}

.search-hero-form {
    display: flex;
    max-width: 560px;
    margin: 20px auto 0;
    border-radius: 4px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.25);
}

.search-hero-form input[type="text"] {
    flex: 1;
    padding: 13px 18px;
    border: none;
    font-size: 15px;
    outline: none;
    color: #333;
    background: #fff;
}

.search-hero-form button {
    padding: 13px 28px;
    background: #79a693;
    border: none;
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
    letter-spacing: 0.5px;
}

.search-hero-form button:hover {
    background: #5a8e7a;
}

/* LAYOUT */
.search-content {
    padding: 35px 0 60px;
    background: #f8f6f3;
}

/* SIDEBAR */
.search-sidebar {
    background: #fff;
    border-radius: 6px;
    padding: 24px 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.06);
}

.sidebar-section-title {
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    color: #2c1810;
    margin-bottom: 14px;
    padding-bottom: 10px;
    border-bottom: 2px solid #f0e8df;
}

.filter-category-list {
    list-style: none;
    padding: 0;
    margin: 0 0 24px;
}

.filter-category-list li {
    margin-bottom: 6px;
}

.filter-category-list li a {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 7px 10px;
    border-radius: 4px;
    color: #555;
    font-size: 13px;
    text-decoration: none;
    transition: all 0.15s;
}

.filter-category-list li a:hover,
.filter-category-list li a.active {
    background: #f0e8df;
    color: #2c1810;
    font-weight: 600;
    text-decoration: none;
}

.filter-sort select {
    width: 100%;
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 13px;
    color: #555;
    cursor: pointer;
    background: #fafafa;
    outline: none;
}

.filter-sort select:focus {
    border-color: #79a693;
}

/* RESULTS AREA */
.search-results-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 22px;
    padding-bottom: 14px;
    border-bottom: 1px solid #e8e0d8;
}

.search-results-count {
    font-size: 13px;
    color: #888;
}

.search-results-count strong {
    color: #2c1810;
    font-weight: 700;
}

/* PRODUCT CARD */
.search-product-card {
    background: #fff;
    border-radius: 6px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    margin-bottom: 24px;
    transition: box-shadow 0.2s, transform 0.2s;
}

.search-product-card:hover {
    box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    transform: translateY(-2px);
}

.search-product-image {
    position: relative;
    overflow: hidden;
    background: #f5f0eb;
    aspect-ratio: 1 / 1;
}

.search-product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.35s;
}

.search-product-card:hover .search-product-image img {
    transform: scale(1.05);
}

.search-product-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background: #d9534f;
    color: #fff;
    font-size: 11px;
    font-weight: 700;
    padding: 3px 8px;
    border-radius: 3px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.search-product-actions {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(44,24,16,0.85);
    padding: 10px;
    transform: translateY(100%);
    transition: transform 0.25s;
}

.search-product-card:hover .search-product-actions {
    transform: translateY(0);
}

.btn-add-to-cart {
    display: block;
    width: 100%;
    padding: 9px;
    background: #79a693;
    border: none;
    color: #fff;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    border-radius: 3px;
    cursor: pointer;
    transition: background 0.2s;
}

.btn-add-to-cart:hover {
    background: #5a8e7a;
}

.search-product-info {
    padding: 14px 16px 16px;
}

.search-product-category {
    font-size: 11px;
    color: #aaa;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 5px;
}

.search-product-name {
    font-size: 14px;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
    line-height: 1.3;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.search-product-name a {
    color: inherit;
    text-decoration: none;
}

.search-product-name a:hover {
    color: #79a693;
}

.search-product-price {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}

.price-current {
    font-size: 16px;
    font-weight: 700;
    color: #2c1810;
}

.price-original {
    font-size: 12px;
    color: #aaa;
    text-decoration: line-through;
}

/* EMPTY STATE */
.search-empty {
    text-align: center;
    padding: 60px 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.06);
}

.search-empty i {
    font-size: 52px;
    color: #ddd;
    margin-bottom: 16px;
    display: block;
}

.search-empty h3 {
    font-size: 18px;
    color: #555;
    margin-bottom: 8px;
    font-weight: 600;
}

.search-empty p {
    color: #999;
    font-size: 14px;
    margin-bottom: 20px;
}

.search-empty .btn-browse {
    display: inline-block;
    padding: 10px 28px;
    background: #79a693;
    color: #fff;
    border-radius: 4px;
    font-weight: 600;
    font-size: 13px;
    text-decoration: none;
    transition: background 0.2s;
}

.search-empty .btn-browse:hover {
    background: #5a8e7a;
    color: #fff;
    text-decoration: none;
}

/* PAGINATION */
.search-pagination {
    margin-top: 30px;
    display: flex;
    justify-content: center;
}

.search-pagination .pagination {
    gap: 4px;
}

.search-pagination .page-link {
    border-radius: 4px !important;
    border-color: #e0d8d0;
    color: #555;
    font-size: 13px;
    padding: 7px 13px;
}

.search-pagination .page-item.active .page-link {
    background: #79a693;
    border-color: #79a693;
    color: #fff;
}

.search-pagination .page-link:hover {
    background: #f0e8df;
    border-color: #c8b09a;
    color: #2c1810;
}
</style>

<!-- SEARCH HERO -->
<div class="search-page-hero">
    <div class="container text-center">
        <h1><i class="fa fa-search" style="margin-right:10px; opacity:0.8;"></i>Cari Produk</h1>
        @if($keyword)
            <p>Hasil pencarian untuk: <strong style="color:#f0c080;">"{{ $keyword }}"</strong></p>
        @else
            <p>Temukan furnitur impian Anda di sini</p>
        @endif

        <form action="{{ route('product.search') }}" method="GET" class="search-hero-form">
            <input type="text" name="keyword" value="{{ $keyword }}" placeholder="Cari produk furnitur...">
            @if($categoryId)
                <input type="hidden" name="category_id" value="{{ $categoryId }}">
            @endif
            @if($sortBy && $sortBy !== 'latest')
                <input type="hidden" name="sort_by" value="{{ $sortBy }}">
            @endif
            <button type="submit"><i class="fa fa-search"></i> Cari</button>
        </form>
    </div>
</div>

<!-- SEARCH CONTENT -->
<div class="search-content">
    <div class="container">
        <div class="row">

            <!-- SIDEBAR FILTER -->
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="search-sidebar">

                    <!-- CATEGORY FILTER -->
                    <div class="sidebar-section-title">Kategori</div>
                    <ul class="filter-category-list">
                        <li>
                            <a href="{{ route('product.search', ['keyword' => $keyword, 'sort_by' => $sortBy]) }}"
                               class="{{ !$categoryId ? 'active' : '' }}">
                                Semua Kategori
                            </a>
                        </li>
                        @foreach($categories as $cat)
                        <li>
                            <a href="{{ route('product.search', ['keyword' => $keyword, 'category_id' => $cat->id, 'sort_by' => $sortBy]) }}"
                               class="{{ $categoryId == $cat->id ? 'active' : '' }}">
                                {{ $cat->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>

                    <!-- SORT -->
                    <div class="sidebar-section-title">Urutkan</div>
                    <div class="filter-sort">
                        <form id="sort-form" action="{{ route('product.search') }}" method="GET">
                            <input type="hidden" name="keyword" value="{{ $keyword }}">
                            @if($categoryId)
                                <input type="hidden" name="category_id" value="{{ $categoryId }}">
                            @endif
                            <select name="sort_by" onchange="document.getElementById('sort-form').submit()">
                                <option value="latest"    {{ $sortBy == 'latest'     ? 'selected' : '' }}>Terbaru</option>
                                <option value="price_asc" {{ $sortBy == 'price_asc'  ? 'selected' : '' }}>Harga: Rendah ke Tinggi</option>
                                <option value="price_desc"{{ $sortBy == 'price_desc' ? 'selected' : '' }}>Harga: Tinggi ke Rendah</option>
                                <option value="name_asc"  {{ $sortBy == 'name_asc'   ? 'selected' : '' }}>Nama A–Z</option>
                            </select>
                        </form>
                    </div>

                </div>
            </div>

            <!-- RESULTS -->
            <div class="col-lg-9 col-md-8">

                <!-- HEADER ROW -->
                <div class="search-results-header">
                    <div class="search-results-count">
                        @if($keyword)
                            Ditemukan <strong>{{ $products->total() }}</strong> produk
                            untuk "<strong>{{ $keyword }}</strong>"
                        @else
                            Menampilkan <strong>{{ $products->total() }}</strong> produk
                        @endif
                    </div>
                    <span style="font-size:12px; color:#aaa;">
                        Halaman {{ $products->currentPage() }} dari {{ $products->lastPage() }}
                    </span>
                </div>

                @if($products->count() > 0)
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="search-product-card">
                                <div class="search-product-image">
                                    <a href="{{ route('product.show', $product->slug) }}">
                                        <img
                                            src="{{ $product->galleries->first()
                                                ? asset('storage/' . $product->galleries->first()->image)
                                                : asset('frontend/image/catalog/demo/products/product1.jpg') }}"
                                            alt="{{ $product->name }}"
                                            loading="lazy">
                                    </a>

                                    @if($product->discount_price)
                                        @php
                                            $disc = round((($product->price - $product->discount_price) / $product->price) * 100);
                                        @endphp
                                        <span class="search-product-badge">-{{ $disc }}%</span>
                                    @endif

                                    <div class="search-product-actions">
                                        <form action="{{ route('cart.add') }}" method="POST" style="margin:0;">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn-add-to-cart">
                                                <i class="fa fa-shopping-cart"></i> Tambah ke Keranjang
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <div class="search-product-info">
                                    @if($product->category)
                                        <div class="search-product-category">{{ $product->category->name }}</div>
                                    @endif
                                    <div class="search-product-name">
                                        <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                    </div>
                                    <div class="search-product-price">
                                        @if($product->discount_price)
                                            <span class="price-current">Rp {{ number_format($product->discount_price, 0, ',', '.') }}</span>
                                            <span class="price-original">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                        @else
                                            <span class="price-current">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- PAGINATION -->
                    <div class="search-pagination">
                        {{ $products->links() }}
                    </div>

                @else
                    <!-- EMPTY STATE -->
                    <div class="search-empty">
                        <i class="fa fa-search-minus"></i>
                        <h3>Produk tidak ditemukan</h3>
                        @if($keyword)
                            <p>Tidak ada produk yang cocok dengan "<strong>{{ $keyword }}</strong>".<br>Coba kata kunci lain atau jelajahi semua produk.</p>
                        @else
                            <p>Tidak ada produk yang tersedia saat ini.</p>
                        @endif
                        <a href="{{ route('home') }}" class="btn-browse">
                            <i class="fa fa-home"></i> Kembali ke Beranda
                        </a>
                    </div>
                @endif

            </div><!-- /results -->
        </div><!-- /row -->
    </div><!-- /container -->
</div>

@endsection

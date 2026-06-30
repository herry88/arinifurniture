@extends('frontend.master')

@section('content')
<div class="main-container" style="background:#f8f4f0; min-height:60vh; padding-bottom:60px;">
    <div class="container" style="padding-top:30px;">

        <!-- Breadcrumb -->
        <nav style="margin-bottom:25px; font-size:13px;">
            <a href="{{ route('home') }}" style="color:#c8a96e;"><i class="fa fa-home"></i> Beranda</a>
            <span style="color:#c8a96e; margin:0 8px;">/</span>
            <span style="color:#3a2a1a; font-weight:600;">Keranjang Belanja</span>
        </nav>

        <h2 style="font-size:26px; font-weight:700; color:#3a2a1a; margin-bottom:25px;">
            <i class="fa fa-shopping-cart" style="color:#c8a96e;"></i> Keranjang Belanja
        </h2>

        @if(session('success'))
            <div style="background:#d4edda; color:#155724; padding:14px 18px; border-radius:10px; margin-bottom:20px; font-size:14px; display:flex; align-items:center; gap:10px;">
                <i class="fa fa-check-circle" style="font-size:18px;"></i> {{ session('success') }}
            </div>
        @endif

        @if($carts->count() > 0)
            <div class="row">
                <!-- Cart Items -->
                <div class="col-md-8">
                    <div style="background:#fff; border-radius:14px; box-shadow:0 4px 20px rgba(90,62,43,0.08); overflow:hidden; margin-bottom:20px;">
                        <!-- Table Header -->
                        <div style="padding:18px 24px; border-bottom:1px solid #f0e8df; display:flex; justify-content:space-between; align-items:center; background:#faf7f4;">
                            <h5 style="margin:0; font-weight:700; color:#3a2a1a; font-size:15px;">
                                <i class="fa fa-list" style="color:#c8a96e; margin-right:6px;"></i>
                                Daftar Produk ({{ $carts->count() }} item)
                            </h5>
                            <a href="{{ route('home') }}" style="color:#c8a96e; font-size:13px; text-decoration:none;">
                                <i class="fa fa-plus"></i> Tambah Produk
                            </a>
                        </div>

                        @php $totalSemua = 0; @endphp
                        @foreach($carts as $cart)
                            @php
                                $harga = $cart->product->discount_price ?? $cart->product->price;
                                $total = $harga * $cart->quantity;
                                $totalSemua += $total;
                            @endphp
                            <div style="padding:20px 24px; border-bottom:1px solid #f8f4f0; display:flex; align-items:center; gap:16px;">
                                <!-- Image -->
                                <div style="flex-shrink:0; width:90px; height:90px; border-radius:10px; overflow:hidden; background:#f8f4f0;">
                                    @if($cart->product->galleries->count() > 0)
                                        <img src="{{ asset('storage/' . $cart->product->galleries->first()->image) }}"
                                            alt="{{ $cart->product->name }}" style="width:100%; height:100%; object-fit:cover;">
                                    @else
                                        <img src="{{ asset('frontend/image/catalog/demo/products/product1.jpg') }}"
                                            alt="" style="width:100%; height:100%; object-fit:cover;">
                                    @endif
                                </div>
                                <!-- Info -->
                                <div style="flex:1; min-width:0;">
                                    <h5 style="font-size:15px; font-weight:700; color:#3a2a1a; margin:0 0 5px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                        <a href="{{ route('product.show', $cart->product->slug) }}" style="color:#3a2a1a; text-decoration:none;">{{ $cart->product->name }}</a>
                                    </h5>
                                    <p style="font-size:12px; color:#9a8a7a; margin:0 0 8px;">
                                        {{ $cart->product->category->name ?? '' }}
                                    </p>
                                    <div style="display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
                                        @if($cart->product->discount_price)
                                            <span style="font-weight:700; color:#c8a96e; font-size:15px;">Rp {{ number_format($harga, 0, ',', '.') }}</span>
                                            <span style="font-size:12px; color:#9a8a7a; text-decoration:line-through;">Rp {{ number_format($cart->product->price, 0, ',', '.') }}</span>
                                        @else
                                            <span style="font-weight:700; color:#c8a96e; font-size:15px;">Rp {{ number_format($harga, 0, ',', '.') }}</span>
                                        @endif
                                        <span style="color:#9a8a7a; font-size:13px;">× {{ $cart->quantity }}</span>
                                    </div>
                                </div>
                                <!-- Subtotal & Remove -->
                                <div style="text-align:right; flex-shrink:0;">
                                    <div style="font-weight:700; color:#3a2a1a; font-size:16px; margin-bottom:12px;">
                                        Rp {{ number_format($total, 0, ',', '.') }}
                                    </div>
                                    <form action="{{ route('cart.remove', $cart->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            style="background:#fff0f0; border:1px solid #f5c6cb; color:#e74c3c; padding:6px 12px; border-radius:8px; font-size:12px; cursor:pointer; transition:all 0.2s;"
                                            onmouseover="this.style.background='#e74c3c'; this.style.color='#fff'"
                                            onmouseout="this.style.background='#fff0f0'; this.style.color='#e74c3c'"
                                            onclick="return confirm('Hapus produk ini dari keranjang?')">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <a href="{{ route('home') }}"
                        style="display:inline-flex; align-items:center; gap:8px; color:#7a6555; font-size:13px; text-decoration:none; padding:10px 0;">
                        <i class="fa fa-arrow-left"></i> Lanjut Belanja
                    </a>
                </div>

                <!-- Order Summary -->
                <div class="col-md-4">
                    <div style="background:#fff; border-radius:14px; box-shadow:0 4px 20px rgba(90,62,43,0.08); padding:24px; position:sticky; top:20px;">
                        <h5 style="font-weight:700; color:#3a2a1a; margin:0 0 20px; font-size:16px;">Ringkasan Pesanan</h5>

                        <div style="border-top:1px solid #f0e8df; padding-top:15px;">
                            @foreach($carts as $cart)
                                @php $h = $cart->product->discount_price ?? $cart->product->price; @endphp
                                <div style="display:flex; justify-content:space-between; margin-bottom:10px; font-size:13px; color:#7a6555;">
                                    <span style="max-width:160px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">{{ $cart->product->name }} ×{{ $cart->quantity }}</span>
                                    <span style="font-weight:600; color:#3a2a1a; white-space:nowrap; margin-left:10px;">Rp {{ number_format($h * $cart->quantity, 0, ',', '.') }}</span>
                                </div>
                            @endforeach
                        </div>

                        <div style="border-top:1px solid #f0e8df; margin:15px 0; padding-top:15px;">
                            <div style="display:flex; justify-content:space-between; font-size:14px; color:#7a6555; margin-bottom:8px;">
                                <span>Subtotal</span>
                                <span>Rp {{ number_format($totalSemua, 0, ',', '.') }}</span>
                            </div>
                            <div style="display:flex; justify-content:space-between; font-size:14px; color:#7a6555; margin-bottom:8px;">
                                <span>Ongkos Kirim</span>
                                <span style="color:#27ae60; font-weight:600;">GRATIS</span>
                            </div>
                        </div>

                        <div style="background:#f8f4f0; border-radius:10px; padding:16px; margin-bottom:20px;">
                            <div style="display:flex; justify-content:space-between; font-size:18px; font-weight:700; color:#3a2a1a;">
                                <span>Total</span>
                                <span style="color:#c8a96e;">Rp {{ number_format($totalSemua, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <a href="{{ route('checkout.index') }}"
                            style="display:block; text-align:center; padding:14px; background:linear-gradient(135deg,#c8a96e,#a07848); color:#fff; border-radius:10px; font-size:15px; font-weight:700; text-decoration:none; transition:all 0.3s; letter-spacing:0.5px;"
                            onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                            <i class="fa fa-lock"></i> LANJUT KE CHECKOUT
                        </a>

                        <div style="margin-top:15px; text-align:center;">
                            <p style="font-size:12px; color:#9a8a7a; margin:0;"><i class="fa fa-shield"></i> Transaksi aman & terpercaya</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty Cart -->
            <div style="background:#fff; border-radius:14px; box-shadow:0 4px 20px rgba(90,62,43,0.08); padding:60px; text-align:center;">
                <div style="font-size:80px; color:#e8e0d5; margin-bottom:20px;"><i class="fa fa-shopping-cart"></i></div>
                <h4 style="font-weight:700; color:#3a2a1a; margin-bottom:10px;">Keranjang Anda Masih Kosong</h4>
                <p style="color:#9a8a7a; font-size:14px; margin-bottom:30px;">Mulai belanja dan temukan produk furnitur impian Anda.</p>
                <a href="{{ route('home') }}"
                    style="display:inline-block; padding:13px 35px; background:linear-gradient(135deg,#c8a96e,#a07848); color:#fff; border-radius:10px; font-size:15px; font-weight:700; text-decoration:none;">
                    <i class="fa fa-store"></i> Mulai Belanja
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

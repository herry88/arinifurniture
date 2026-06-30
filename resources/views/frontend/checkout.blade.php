@extends('frontend.master')

@section('content')
<div class="main-container" style="background:#f8f4f0; min-height:60vh; padding-bottom:60px;">
    <div class="container" style="padding-top:30px;">

        <!-- Breadcrumb -->
        <nav style="margin-bottom:25px; font-size:13px;">
            <a href="{{ route('home') }}" style="color:#c8a96e;"><i class="fa fa-home"></i> Beranda</a>
            <span style="color:#c8a96e; margin:0 8px;">/</span>
            <a href="{{ route('cart.index') }}" style="color:#c8a96e;">Keranjang</a>
            <span style="color:#c8a96e; margin:0 8px;">/</span>
            <span style="color:#3a2a1a; font-weight:600;">Checkout</span>
        </nav>

        <!-- Progress Steps -->
        <div style="display:flex; align-items:center; justify-content:center; gap:0; margin-bottom:40px; flex-wrap:wrap;">
            <div style="display:flex; align-items:center;">
                <div style="width:36px; height:36px; background:#c8a96e; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#fff; font-weight:700; font-size:14px;">
                    <i class="fa fa-check" style="font-size:13px;"></i>
                </div>
                <span style="font-size:13px; font-weight:600; color:#c8a96e; margin-left:8px;">Keranjang</span>
            </div>
            <div style="height:2px; width:60px; background:#c8a96e; margin:0 12px;"></div>
            <div style="display:flex; align-items:center;">
                <div style="width:36px; height:36px; background:#c8a96e; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#fff; font-weight:700; font-size:14px;">2</div>
                <span style="font-size:13px; font-weight:600; color:#c8a96e; margin-left:8px;">Checkout</span>
            </div>
            <div style="height:2px; width:60px; background:#e8e0d5; margin:0 12px;"></div>
            <div style="display:flex; align-items:center;">
                <div style="width:36px; height:36px; background:#e8e0d5; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#9a8a7a; font-weight:700; font-size:14px;">3</div>
                <span style="font-size:13px; font-weight:400; color:#9a8a7a; margin-left:8px;">Selesai</span>
            </div>
        </div>

        @if(session('error'))
            <div style="background:#f8d7da; color:#721c24; padding:14px 18px; border-radius:10px; margin-bottom:20px; font-size:14px;">
                <i class="fa fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Left: Shipping Form -->
                <div class="col-md-7">
                    <div style="background:#fff; border-radius:14px; box-shadow:0 4px 20px rgba(90,62,43,0.08); overflow:hidden; margin-bottom:20px;">
                        <div style="padding:20px 25px; background:linear-gradient(135deg,#c8a96e,#a07848);">
                            <h4 style="color:#fff; margin:0; font-size:17px; font-weight:700;">
                                <i class="fa fa-map-marker"></i> Detail Alamat Pengiriman
                            </h4>
                        </div>
                        <div style="padding:25px;">
                            @if($errors->any())
                                <div style="background:#f8d7da; color:#721c24; padding:12px 16px; border-radius:8px; margin-bottom:20px; font-size:13px;">
                                    <i class="fa fa-exclamation-circle"></i> Periksa kembali isian di bawah:
                                    <ul style="margin:6px 0 0 15px; padding:0;">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-sm-6">
                                    <div style="margin-bottom:18px;">
                                        <label style="display:block; font-weight:600; color:#3a2a1a; margin-bottom:7px; font-size:13px;">Nama Penerima <span style="color:#e74c3c;">*</span></label>
                                        <input type="text" name="recipient_name" value="{{ old('recipient_name', Auth::user()->name) }}" placeholder="Nama lengkap penerima" required
                                            style="width:100%; padding:11px 14px; border:2px solid #e8e0d5; border-radius:9px; font-size:13px; color:#3a2a1a; box-sizing:border-box; outline:none; transition:border-color 0.3s;"
                                            onfocus="this.style.borderColor='#c8a96e'" onblur="this.style.borderColor='#e8e0d5'">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div style="margin-bottom:18px;">
                                        <label style="display:block; font-weight:600; color:#3a2a1a; margin-bottom:7px; font-size:13px;">No. Telepon <span style="color:#e74c3c;">*</span></label>
                                        <input type="text" name="phone_number" value="{{ old('phone_number', Auth::user()->phone) }}" placeholder="08xx-xxxx-xxxx" required
                                            style="width:100%; padding:11px 14px; border:2px solid #e8e0d5; border-radius:9px; font-size:13px; color:#3a2a1a; box-sizing:border-box; outline:none; transition:border-color 0.3s;"
                                            onfocus="this.style.borderColor='#c8a96e'" onblur="this.style.borderColor='#e8e0d5'">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div style="margin-bottom:18px;">
                                        <label style="display:block; font-weight:600; color:#3a2a1a; margin-bottom:7px; font-size:13px;">Provinsi <span style="color:#e74c3c;">*</span></label>
                                        <input type="text" name="province_name" value="{{ old('province_name') }}" placeholder="Contoh: Jawa Timur" required
                                            style="width:100%; padding:11px 14px; border:2px solid #e8e0d5; border-radius:9px; font-size:13px; color:#3a2a1a; box-sizing:border-box; outline:none; transition:border-color 0.3s;"
                                            onfocus="this.style.borderColor='#c8a96e'" onblur="this.style.borderColor='#e8e0d5'">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div style="margin-bottom:18px;">
                                        <label style="display:block; font-weight:600; color:#3a2a1a; margin-bottom:7px; font-size:13px;">Kota/Kabupaten <span style="color:#e74c3c;">*</span></label>
                                        <input type="text" name="city_name" value="{{ old('city_name') }}" placeholder="Contoh: Surabaya" required
                                            style="width:100%; padding:11px 14px; border:2px solid #e8e0d5; border-radius:9px; font-size:13px; color:#3a2a1a; box-sizing:border-box; outline:none; transition:border-color 0.3s;"
                                            onfocus="this.style.borderColor='#c8a96e'" onblur="this.style.borderColor='#e8e0d5'">
                                    </div>
                                </div>
                            </div>

                            <div style="margin-bottom:18px;">
                                <label style="display:block; font-weight:600; color:#3a2a1a; margin-bottom:7px; font-size:13px;">Alamat Lengkap <span style="color:#e74c3c;">*</span></label>
                                <textarea name="address_detail" rows="3" placeholder="Nama jalan, nomor rumah, RT/RW, kecamatan..." required
                                    style="width:100%; padding:11px 14px; border:2px solid #e8e0d5; border-radius:9px; font-size:13px; color:#3a2a1a; box-sizing:border-box; outline:none; resize:vertical; transition:border-color 0.3s;"
                                    onfocus="this.style.borderColor='#c8a96e'" onblur="this.style.borderColor='#e8e0d5'">{{ old('address_detail') }}</textarea>
                            </div>

                            <div style="margin-bottom:18px;">
                                <label style="display:block; font-weight:600; color:#3a2a1a; margin-bottom:7px; font-size:13px;">Kode Pos <span style="color:#e74c3c;">*</span></label>
                                <input type="text" name="postal_code" value="{{ old('postal_code') }}" placeholder="Contoh: 60111" required maxlength="10"
                                    style="width:100%; padding:11px 14px; border:2px solid #e8e0d5; border-radius:9px; font-size:13px; color:#3a2a1a; box-sizing:border-box; outline:none; transition:border-color 0.3s;"
                                    onfocus="this.style.borderColor='#c8a96e'" onblur="this.style.borderColor='#e8e0d5'">
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div style="background:#fff; border-radius:14px; box-shadow:0 4px 20px rgba(90,62,43,0.08); overflow:hidden; margin-bottom:20px;">
                        <div style="padding:20px 25px; background:linear-gradient(135deg,#5a3e2b,#3a2a1a);">
                            <h4 style="color:#fff; margin:0; font-size:17px; font-weight:700;">
                                <i class="fa fa-credit-card"></i> Metode Pembayaran
                            </h4>
                        </div>
                        <div style="padding:25px;">
                            <label style="display:flex; align-items:flex-start; gap:14px; padding:16px; border:2px solid #c8a96e; border-radius:10px; cursor:pointer; margin-bottom:12px; background:#fdf9f5;">
                                <input type="radio" name="payment_type" value="transfer" checked style="margin-top:2px; accent-color:#c8a96e;">
                                <div>
                                    <div style="font-weight:700; color:#3a2a1a; font-size:14px; margin-bottom:3px;"><i class="fa fa-university" style="color:#c8a96e;"></i> Transfer Bank Manual</div>
                                    <div style="font-size:12px; color:#9a8a7a;">Transfer ke rekening yang tersedia setelah checkout. Pesanan diproses setelah pembayaran dikonfirmasi.</div>
                                </div>
                            </label>
                            <label style="display:flex; align-items:flex-start; gap:14px; padding:16px; border:2px solid #e8e0d5; border-radius:10px; cursor:pointer; background:#fafaf9;"
                                onclick="this.style.borderColor='#c8a96e'" onmouseout="this.style.borderColor=document.querySelector('[name=payment_type]:checked').value=='cod'?'#c8a96e':'#e8e0d5'">
                                <input type="radio" name="payment_type" value="cod" style="margin-top:2px; accent-color:#c8a96e;">
                                <div>
                                    <div style="font-weight:700; color:#3a2a1a; font-size:14px; margin-bottom:3px;"><i class="fa fa-money" style="color:#27ae60;"></i> Cash on Delivery (COD)</div>
                                    <div style="font-size:12px; color:#9a8a7a;">Bayar tunai saat barang tiba di tangan Anda.</div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Right: Order Summary -->
                <div class="col-md-5">
                    <div style="background:#fff; border-radius:14px; box-shadow:0 4px 20px rgba(90,62,43,0.08); overflow:hidden; position:sticky; top:20px;">
                        <div style="padding:20px 25px; background:#faf7f4; border-bottom:1px solid #f0e8df;">
                            <h4 style="margin:0; font-size:17px; font-weight:700; color:#3a2a1a;">
                                <i class="fa fa-shopping-cart" style="color:#c8a96e;"></i> Ringkasan Pesanan
                            </h4>
                        </div>
                        <div style="padding:20px 25px;">
                            @foreach($carts as $cart)
                                @php $h = $cart->product->discount_price ?? $cart->product->price; @endphp
                                <div style="display:flex; gap:12px; align-items:center; margin-bottom:14px; padding-bottom:14px; border-bottom:1px solid #f8f4f0;">
                                    <div style="width:55px; height:55px; border-radius:8px; overflow:hidden; flex-shrink:0; background:#f8f4f0;">
                                        @if($cart->product->galleries->count() > 0)
                                            <img src="{{ asset('storage/' . $cart->product->galleries->first()->image) }}"
                                                alt="" style="width:100%; height:100%; object-fit:cover;">
                                        @else
                                            <img src="{{ asset('frontend/image/catalog/demo/products/product1.jpg') }}"
                                                alt="" style="width:100%; height:100%; object-fit:cover;">
                                        @endif
                                    </div>
                                    <div style="flex:1; min-width:0;">
                                        <div style="font-size:13px; font-weight:600; color:#3a2a1a; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $cart->product->name }}</div>
                                        <div style="font-size:12px; color:#9a8a7a;">× {{ $cart->quantity }}</div>
                                    </div>
                                    <div style="font-weight:700; color:#c8a96e; font-size:13px; white-space:nowrap; margin-left:8px;">
                                        Rp {{ number_format($h * $cart->quantity, 0, ',', '.') }}
                                    </div>
                                </div>
                            @endforeach

                            <div style="margin-top:10px;">
                                <div style="display:flex; justify-content:space-between; font-size:13px; color:#7a6555; margin-bottom:8px;">
                                    <span>Subtotal Produk</span>
                                    <span>Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                                </div>
                                <div style="display:flex; justify-content:space-between; font-size:13px; color:#7a6555; margin-bottom:8px;">
                                    <span>Ongkos Kirim</span>
                                    <span style="color:#27ae60; font-weight:600;">Gratis</span>
                                </div>
                            </div>

                            <div style="background:linear-gradient(135deg,#fdf9f5,#f8f0e8); border-radius:10px; padding:16px; margin:16px 0; border:1px solid #f0e8df;">
                                <div style="display:flex; justify-content:space-between; align-items:center;">
                                    <span style="font-size:16px; font-weight:700; color:#3a2a1a;">Total Pembayaran</span>
                                    <span style="font-size:20px; font-weight:700; color:#c8a96e;">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <button type="submit"
                                style="width:100%; padding:15px; background:linear-gradient(135deg,#c8a96e,#a07848); color:#fff; border:none; border-radius:10px; font-size:15px; font-weight:700; cursor:pointer; letter-spacing:0.5px; transition:all 0.3s;"
                                onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                                <i class="fa fa-check-circle"></i> BUAT PESANAN SEKARANG
                            </button>
                            <div style="text-align:center; margin-top:12px;">
                                <span style="font-size:12px; color:#9a8a7a;"><i class="fa fa-shield"></i> Transaksi aman & terlindungi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('frontend.master')

@section('content')
<div class="main-container" style="background:#f8f4f0; min-height:60vh; padding-bottom:60px;">
    <div class="container" style="padding-top:30px;">

        <!-- Progress Steps -->
        <div style="display:flex; align-items:center; justify-content:center; gap:0; margin-bottom:40px; flex-wrap:wrap;">
            <div style="display:flex; align-items:center;">
                <div style="width:36px; height:36px; background:#c8a96e; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#fff; font-weight:700;">
                    <i class="fa fa-check" style="font-size:13px;"></i>
                </div>
                <span style="font-size:13px; font-weight:600; color:#c8a96e; margin-left:8px;">Keranjang</span>
            </div>
            <div style="height:2px; width:60px; background:#c8a96e; margin:0 12px;"></div>
            <div style="display:flex; align-items:center;">
                <div style="width:36px; height:36px; background:#c8a96e; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#fff; font-weight:700;">
                    <i class="fa fa-check" style="font-size:13px;"></i>
                </div>
                <span style="font-size:13px; font-weight:600; color:#c8a96e; margin-left:8px;">Checkout</span>
            </div>
            <div style="height:2px; width:60px; background:#c8a96e; margin:0 12px;"></div>
            <div style="display:flex; align-items:center;">
                <div style="width:36px; height:36px; background:#c8a96e; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#fff; font-weight:700;">
                    <i class="fa fa-check" style="font-size:13px;"></i>
                </div>
                <span style="font-size:13px; font-weight:600; color:#c8a96e; margin-left:8px;">Selesai</span>
            </div>
        </div>

        <!-- Success Card -->
        <div style="max-width:680px; margin:0 auto;">
            <div style="background:#fff; border-radius:16px; box-shadow:0 8px 40px rgba(90,62,43,0.12); overflow:hidden; text-align:center;">
                <!-- Top Banner -->
                <div style="background:linear-gradient(135deg,#c8a96e,#a07848); padding:40px 30px;">
                    <div style="width:80px; height:80px; background:rgba(255,255,255,0.2); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 15px;">
                        <i class="fa fa-check-circle" style="font-size:45px; color:#fff;"></i>
                    </div>
                    <h2 style="color:#fff; font-size:26px; font-weight:700; margin:0 0 8px;">Pesanan Berhasil Dibuat!</h2>
                    <p style="color:rgba(255,255,255,0.85); font-size:14px; margin:0;">Terima kasih! Pesanan Anda telah kami terima.</p>
                </div>

                <!-- Order Info -->
                <div style="padding:30px 35px;">
                    <div style="background:#f8f4f0; border-radius:12px; padding:20px; margin-bottom:25px;">
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; text-align:left; font-size:14px;">
                            <div>
                                <div style="color:#9a8a7a; font-size:12px; margin-bottom:4px;">No. Invoice</div>
                                <div style="font-weight:700; color:#3a2a1a; font-size:15px;">{{ $order->invoice_number }}</div>
                            </div>
                            <div>
                                <div style="color:#9a8a7a; font-size:12px; margin-bottom:4px;">Tanggal Pesan</div>
                                <div style="font-weight:600; color:#3a2a1a;">{{ $order->created_at->format('d M Y, H:i') }}</div>
                            </div>
                            <div>
                                <div style="color:#9a8a7a; font-size:12px; margin-bottom:4px;">Total Pembayaran</div>
                                <div style="font-weight:700; color:#c8a96e; font-size:17px;">Rp {{ number_format($order->grand_total, 0, ',', '.') }}</div>
                            </div>
                            <div>
                                <div style="color:#9a8a7a; font-size:12px; margin-bottom:4px;">Metode Bayar</div>
                                <div style="font-weight:600; color:#3a2a1a;">
                                    @if($order->payment_type == 'cod')
                                        <span style="background:#d4edda; color:#155724; padding:3px 10px; border-radius:20px; font-size:12px;"><i class="fa fa-money"></i> COD</span>
                                    @else
                                        <span style="background:#d1ecf1; color:#0c5460; padding:3px 10px; border-radius:20px; font-size:12px;"><i class="fa fa-university"></i> Transfer Bank</span>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <div style="color:#9a8a7a; font-size:12px; margin-bottom:4px;">Status Pesanan</div>
                                <div><span style="background:#fff3cd; color:#856404; padding:3px 10px; border-radius:20px; font-size:12px; font-weight:600;"><i class="fa fa-clock-o"></i> {{ ucfirst($order->order_status) }}</span></div>
                            </div>
                            <div>
                                <div style="color:#9a8a7a; font-size:12px; margin-bottom:4px;">Status Pembayaran</div>
                                <div><span style="background:#f8d7da; color:#721c24; padding:3px 10px; border-radius:20px; font-size:12px; font-weight:600;"><i class="fa fa-hourglass-half"></i> Belum Dibayar</span></div>
                            </div>
                        </div>
                    </div>

                    @if($order->payment_type == 'transfer')
                        <!-- Payment Instructions -->
                        <div style="background:linear-gradient(135deg,#fdf9f5,#f8f0e8); border:1px solid #f0e0cc; border-radius:12px; padding:20px 25px; margin-bottom:25px; text-align:left;">
                            <h5 style="font-weight:700; color:#3a2a1a; margin:0 0 14px; font-size:15px;">
                                <i class="fa fa-info-circle" style="color:#c8a96e;"></i> Instruksi Pembayaran Transfer
                            </h5>
                            <p style="font-size:13px; color:#7a6555; margin-bottom:12px;">
                                Silakan transfer sebesar <strong style="color:#c8a96e; font-size:16px;">Rp {{ number_format($order->grand_total, 0, ',', '.') }}</strong> ke salah satu rekening berikut:
                            </p>
                            <div style="display:flex; flex-direction:column; gap:10px;">
                                <div style="display:flex; align-items:center; gap:12px; background:#fff; padding:12px 15px; border-radius:8px; border:1px solid #f0e8df;">
                                    <span style="font-weight:700; color:#3a2a1a; font-size:13px; min-width:70px;">BCA</span>
                                    <span style="color:#c8a96e; font-weight:700; font-size:16px; letter-spacing:1px;">1234567890</span>
                                    <span style="color:#7a6555; font-size:12px;">a.n. Arini Furniture</span>
                                </div>
                                <div style="display:flex; align-items:center; gap:12px; background:#fff; padding:12px 15px; border-radius:8px; border:1px solid #f0e8df;">
                                    <span style="font-weight:700; color:#3a2a1a; font-size:13px; min-width:70px;">Mandiri</span>
                                    <span style="color:#c8a96e; font-weight:700; font-size:16px; letter-spacing:1px;">0987654321</span>
                                    <span style="color:#7a6555; font-size:12px;">a.n. Arini Furniture</span>
                                </div>
                            </div>
                            <p style="font-size:12px; color:#9a8a7a; margin:12px 0 0; border-top:1px dashed #f0e8df; padding-top:10px;">
                                <i class="fa fa-warning"></i> Cantumkan nomor invoice <strong>{{ $order->invoice_number }}</strong> pada keterangan transfer. Pesanan akan diproses setelah pembayaran dikonfirmasi.
                            </p>
                        </div>
                    @endif

                    @if($order->payment_type == 'cod')
                        <div style="background:#d4edda; border-radius:12px; padding:16px 20px; margin-bottom:25px; text-align:left;">
                            <p style="margin:0; font-size:14px; color:#155724;">
                                <i class="fa fa-check-circle"></i> <strong>COD Terpilih!</strong> Siapkan uang tunai saat kurir tiba. Kurir akan menghubungi Anda sebelum pengiriman.
                            </p>
                        </div>
                    @endif

                    <div style="display:flex; gap:12px; justify-content:center; flex-wrap:wrap;">
                        <a href="{{ route('home') }}"
                            style="padding:12px 28px; background:linear-gradient(135deg,#c8a96e,#a07848); color:#fff; border-radius:10px; font-size:14px; font-weight:700; text-decoration:none; transition:all 0.3s;"
                            onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                            <i class="fa fa-home"></i> Kembali ke Beranda
                        </a>
                        <a href="{{ route('home') }}"
                            style="padding:12px 28px; border:2px solid #c8a96e; color:#c8a96e; border-radius:10px; font-size:14px; font-weight:700; text-decoration:none; transition:all 0.3s;"
                            onmouseover="this.style.background='#c8a96e'; this.style.color='#fff'" onmouseout="this.style.background='transparent'; this.style.color='#c8a96e'">
                            <i class="fa fa-shopping-bag"></i> Lanjut Belanja
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

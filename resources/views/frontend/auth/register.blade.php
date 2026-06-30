@extends('frontend.master')

@section('content')
<div class="main-container">
    <div style="min-height: 85vh; display: flex; align-items: center; background: linear-gradient(135deg, #f5f0eb 0%, #ebe3d9 100%); padding: 40px 0;">
        <div class="container">
            <div class="row">
                <!-- Left: Branding -->
                <div class="col-md-6 hidden-sm hidden-xs" style="display: flex; align-items: center; justify-content: center; padding: 60px 40px;">
                    <div style="text-align: center; color: #5a3e2b;">
                        <div style="font-size: 60px; margin-bottom: 20px; color: #c8a96e;"><i class="fa fa-user-plus"></i></div>
                        <h2 style="font-family:'Poppins',sans-serif; font-weight:700; font-size:30px; color:#3a2a1a; margin-bottom:15px;">Bergabung Bersama Kami</h2>
                        <p style="font-size: 15px; color:#7a6555; line-height:1.9;">Daftarkan diri dan nikmati kemudahan berbelanja furnitur premium langsung dari rumah Anda.</p>
                        <div style="margin-top:30px; display:flex; flex-direction:column; gap:12px; text-align:left; max-width:280px; margin-left:auto; margin-right:auto;">
                            <div style="display:flex; align-items:center; gap:12px; color:#7a6555; font-size:14px;">
                                <span style="background:#c8a96e; color:#fff; border-radius:50%; width:28px; height:28px; display:flex; align-items:center; justify-content:center; flex-shrink:0;"><i class="fa fa-check" style="font-size:11px;"></i></span>
                                Akses ke ribuan produk furnitur pilihan
                            </div>
                            <div style="display:flex; align-items:center; gap:12px; color:#7a6555; font-size:14px;">
                                <span style="background:#c8a96e; color:#fff; border-radius:50%; width:28px; height:28px; display:flex; align-items:center; justify-content:center; flex-shrink:0;"><i class="fa fa-check" style="font-size:11px;"></i></span>
                                Lacak status pesanan secara real-time
                            </div>
                            <div style="display:flex; align-items:center; gap:12px; color:#7a6555; font-size:14px;">
                                <span style="background:#c8a96e; color:#fff; border-radius:50%; width:28px; height:28px; display:flex; align-items:center; justify-content:center; flex-shrink:0;"><i class="fa fa-check" style="font-size:11px;"></i></span>
                                Dapatkan penawaran eksklusif member
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right: Form -->
                <div class="col-md-6 col-sm-12">
                    <div style="background: #fff; border-radius: 16px; padding: 45px 40px; box-shadow: 0 20px 60px rgba(90,62,43,0.15); margin: 20px 0;">
                        <div style="text-align: center; margin-bottom: 30px;">
                            <h3 style="font-weight: 700; color: #3a2a1a; font-size: 24px; margin-bottom: 8px;">Buat Akun Baru</h3>
                            <p style="color: #9a8a7a; font-size: 14px;">Sudah punya akun? <a href="{{ route('login') }}" style="color: #c8a96e; font-weight: 600;">Masuk di sini</a></p>
                        </div>

                        @if($errors->any())
                            <div style="background:#f8d7da; color:#721c24; padding:12px 16px; border-radius:8px; margin-bottom:20px; font-size:14px;">
                                <i class="fa fa-exclamation-circle"></i>
                                <ul style="margin:8px 0 0 15px; padding:0;">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('register.post') }}" method="POST">
                            @csrf
                            <div style="margin-bottom: 18px;">
                                <label style="display:block; font-weight:600; color:#3a2a1a; margin-bottom:7px; font-size:13px;">Nama Lengkap <span style="color:#e74c3c;">*</span></label>
                                <div style="position:relative;">
                                    <span style="position:absolute; left:14px; top:50%; transform:translateY(-50%); color:#c8a96e;"><i class="fa fa-user"></i></span>
                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap Anda" required
                                        style="width:100%; padding:12px 14px 12px 40px; border:2px solid #e8e0d5; border-radius:10px; font-size:14px; color:#3a2a1a; box-sizing:border-box; outline:none; transition:border-color 0.3s;"
                                        onfocus="this.style.borderColor='#c8a96e'" onblur="this.style.borderColor='#e8e0d5'">
                                </div>
                            </div>
                            <div style="margin-bottom: 18px;">
                                <label style="display:block; font-weight:600; color:#3a2a1a; margin-bottom:7px; font-size:13px;">Email <span style="color:#e74c3c;">*</span></label>
                                <div style="position:relative;">
                                    <span style="position:absolute; left:14px; top:50%; transform:translateY(-50%); color:#c8a96e;"><i class="fa fa-envelope"></i></span>
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required
                                        style="width:100%; padding:12px 14px 12px 40px; border:2px solid #e8e0d5; border-radius:10px; font-size:14px; color:#3a2a1a; box-sizing:border-box; outline:none; transition:border-color 0.3s;"
                                        onfocus="this.style.borderColor='#c8a96e'" onblur="this.style.borderColor='#e8e0d5'">
                                </div>
                            </div>
                            <div style="margin-bottom: 18px;">
                                <label style="display:block; font-weight:600; color:#3a2a1a; margin-bottom:7px; font-size:13px;">No. Telepon <span style="color:#9a8a7a; font-weight:400;">(opsional)</span></label>
                                <div style="position:relative;">
                                    <span style="position:absolute; left:14px; top:50%; transform:translateY(-50%); color:#c8a96e;"><i class="fa fa-phone"></i></span>
                                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="08xx-xxxx-xxxx"
                                        style="width:100%; padding:12px 14px 12px 40px; border:2px solid #e8e0d5; border-radius:10px; font-size:14px; color:#3a2a1a; box-sizing:border-box; outline:none; transition:border-color 0.3s;"
                                        onfocus="this.style.borderColor='#c8a96e'" onblur="this.style.borderColor='#e8e0d5'">
                                </div>
                            </div>
                            <div style="margin-bottom: 18px;">
                                <label style="display:block; font-weight:600; color:#3a2a1a; margin-bottom:7px; font-size:13px;">Password <span style="color:#e74c3c;">*</span></label>
                                <div style="position:relative;">
                                    <span style="position:absolute; left:14px; top:50%; transform:translateY(-50%); color:#c8a96e;"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password" placeholder="Minimal 8 karakter" required
                                        style="width:100%; padding:12px 14px 12px 40px; border:2px solid #e8e0d5; border-radius:10px; font-size:14px; color:#3a2a1a; box-sizing:border-box; outline:none; transition:border-color 0.3s;"
                                        onfocus="this.style.borderColor='#c8a96e'" onblur="this.style.borderColor='#e8e0d5'">
                                </div>
                            </div>
                            <div style="margin-bottom: 25px;">
                                <label style="display:block; font-weight:600; color:#3a2a1a; margin-bottom:7px; font-size:13px;">Konfirmasi Password <span style="color:#e74c3c;">*</span></label>
                                <div style="position:relative;">
                                    <span style="position:absolute; left:14px; top:50%; transform:translateY(-50%); color:#c8a96e;"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password_confirmation" placeholder="Ulangi password Anda" required
                                        style="width:100%; padding:12px 14px 12px 40px; border:2px solid #e8e0d5; border-radius:10px; font-size:14px; color:#3a2a1a; box-sizing:border-box; outline:none; transition:border-color 0.3s;"
                                        onfocus="this.style.borderColor='#c8a96e'" onblur="this.style.borderColor='#e8e0d5'">
                                </div>
                            </div>
                            <button type="submit"
                                style="width:100%; padding:14px; background: linear-gradient(135deg, #c8a96e, #a07848); color:#fff; border:none; border-radius:10px; font-size:15px; font-weight:700; cursor:pointer; letter-spacing:0.5px; transition:all 0.3s;"
                                onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                                <i class="fa fa-user-plus"></i> DAFTAR SEKARANG
                            </button>
                        </form>

                        <div style="text-align:center; margin-top:20px; padding-top:20px; border-top: 1px solid #f0e8df;">
                            <p style="font-size:13px; color:#9a8a7a;">
                                <a href="{{ route('home') }}" style="color:#c8a96e;"><i class="fa fa-arrow-left"></i> Kembali ke Beranda</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

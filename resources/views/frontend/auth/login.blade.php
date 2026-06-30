@extends('frontend.master')

@section('content')
<div class="main-container">
    <!-- Page Login Premium -->
    <div style="min-height: 80vh; display: flex; align-items: center; background: linear-gradient(135deg, #f5f0eb 0%, #ebe3d9 100%);">
        <div class="container">
            <div class="row">
                <!-- Left: Branding -->
                <div class="col-md-6 hidden-sm hidden-xs" style="display: flex; align-items: center; justify-content: center; padding: 60px 40px;">
                    <div style="text-align: center; color: #5a3e2b;">
                        <div style="font-size: 60px; margin-bottom: 20px; color: #c8a96e;"><i class="fa fa-home"></i></div>
                        <h2 style="font-family:'Poppins',sans-serif; font-weight:700; font-size:32px; color:#3a2a1a; margin-bottom:15px;">Arini Furniture</h2>
                        <p style="font-size: 16px; color:#7a6555; line-height:1.8;">Temukan koleksi furnitur premium untuk hunian impian Anda. Kualitas terjamin, desain elegan.</p>
                        <div style="margin-top: 30px; display: flex; justify-content: center; gap: 20px; font-size: 30px; color: #c8a96e;">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                        <p style="color:#c8a96e; margin-top:10px; font-size:13px;">Dipercaya oleh ribuan pelanggan</p>
                    </div>
                </div>
                <!-- Right: Form -->
                <div class="col-md-6 col-sm-12">
                    <div style="background: #fff; border-radius: 16px; padding: 50px 45px; box-shadow: 0 20px 60px rgba(90,62,43,0.15); margin: 40px 0;">
                        <div style="text-align: center; margin-bottom: 35px;">
                            <h3 style="font-weight: 700; color: #3a2a1a; font-size: 26px; margin-bottom: 8px;">Masuk ke Akun Anda</h3>
                            <p style="color: #9a8a7a; font-size: 14px;">Belum punya akun? <a href="{{ route('register') }}" style="color: #c8a96e; font-weight: 600;">Daftar Sekarang</a></p>
                        </div>

                        @if(session('success'))
                            <div style="background:#d4edda; color:#155724; padding:12px 16px; border-radius:8px; margin-bottom:20px; font-size:14px;">
                                <i class="fa fa-check-circle"></i> {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div style="background:#f8d7da; color:#721c24; padding:12px 16px; border-radius:8px; margin-bottom:20px; font-size:14px;">
                                <i class="fa fa-exclamation-circle"></i> {{ $errors->first() }}
                            </div>
                        @endif

                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div style="margin-bottom: 20px;">
                                <label style="display:block; font-weight:600; color:#3a2a1a; margin-bottom:8px; font-size:13px;">Email Address</label>
                                <div style="position:relative;">
                                    <span style="position:absolute; left:14px; top:50%; transform:translateY(-50%); color:#c8a96e;"><i class="fa fa-envelope"></i></span>
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required
                                        style="width:100%; padding:13px 14px 13px 40px; border:2px solid #e8e0d5; border-radius:10px; font-size:14px; color:#3a2a1a; transition:border-color 0.3s; box-sizing:border-box; outline:none;"
                                        onfocus="this.style.borderColor='#c8a96e'" onblur="this.style.borderColor='#e8e0d5'">
                                </div>
                            </div>
                            <div style="margin-bottom: 25px;">
                                <label style="display:block; font-weight:600; color:#3a2a1a; margin-bottom:8px; font-size:13px;">Password</label>
                                <div style="position:relative;">
                                    <span style="position:absolute; left:14px; top:50%; transform:translateY(-50%); color:#c8a96e;"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password" placeholder="••••••••" required
                                        style="width:100%; padding:13px 14px 13px 40px; border:2px solid #e8e0d5; border-radius:10px; font-size:14px; color:#3a2a1a; transition:border-color 0.3s; box-sizing:border-box; outline:none;"
                                        onfocus="this.style.borderColor='#c8a96e'" onblur="this.style.borderColor='#e8e0d5'">
                                </div>
                            </div>
                            <div style="margin-bottom: 25px; display:flex; align-items:center; justify-content:space-between;">
                                <label style="display:flex; align-items:center; gap:8px; font-size:13px; color:#7a6555; cursor:pointer;">
                                    <input type="checkbox" name="remember" style="accent-color:#c8a96e;"> Ingat Saya
                                </label>
                            </div>
                            <button type="submit"
                                style="width:100%; padding:14px; background: linear-gradient(135deg, #c8a96e, #a07848); color:#fff; border:none; border-radius:10px; font-size:15px; font-weight:700; cursor:pointer; letter-spacing:0.5px; transition:all 0.3s;"
                                onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                                <i class="fa fa-sign-in"></i> MASUK
                            </button>
                        </form>

                        <div style="text-align:center; margin-top:25px; padding-top:25px; border-top: 1px solid #f0e8df;">
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

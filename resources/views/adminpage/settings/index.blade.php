@extends('adminpage.master')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan /</span> Website</h4>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Informasi & Kontak Website</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <h6 class="mb-3 fw-bold text-primary">Informasi Umum</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="website_name">Nama Website</label>
                                    <input type="text" class="form-control" id="website_name" name="website_name" value="{{ old('website_name', $setting->website_name) }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="phone">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $setting->phone) }}" placeholder="(844)555-8386">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="email">Alamat Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $setting->email) }}" placeholder="demo@harvest.com">
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label" for="address">Alamat Lengkap</label>
                                    <textarea class="form-control" id="address" name="address" rows="3">{{ old('address', $setting->address) }}</textarea>
                                </div>
                            </div>

                            <h6 class="mb-3 fw-bold text-primary">Sosial Media (Opsional)</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="facebook_url"><i class='bx bxl-facebook-circle text-primary'></i> Facebook URL</label>
                                    <input type="url" class="form-control" id="facebook_url" name="facebook_url" value="{{ old('facebook_url', $setting->facebook_url) }}" placeholder="https://facebook.com/...">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="twitter_url"><i class='bx bxl-twitter text-info'></i> Twitter URL</label>
                                    <input type="url" class="form-control" id="twitter_url" name="twitter_url" value="{{ old('twitter_url', $setting->twitter_url) }}" placeholder="https://twitter.com/...">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="instagram_url"><i class='bx bxl-instagram text-danger'></i> Instagram URL</label>
                                    <input type="url" class="form-control" id="instagram_url" name="instagram_url" value="{{ old('instagram_url', $setting->instagram_url) }}" placeholder="https://instagram.com/...">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="youtube_url"><i class='bx bxl-youtube text-danger'></i> Youtube URL</label>
                                    <input type="url" class="form-control" id="youtube_url" name="youtube_url" value="{{ old('youtube_url', $setting->youtube_url) }}" placeholder="https://youtube.com/...">
                                </div>
                            </div>

                            <h6 class="mb-3 mt-3 fw-bold text-primary">Footer / Bawah Web</h6>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="copyright_text">Teks Hak Cipta (Copyright)</label>
                                    <input type="text" class="form-control" id="copyright_text" name="copyright_text" value="{{ old('copyright_text', $setting->copyright_text) }}" placeholder="© 2026 Arini Furniture. All Rights Reserved.">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="app_download_image">Gambar Download App (Opsional)</label>
                                    <input class="form-control" type="file" id="app_download_image" name="app_download_image" accept="image/*">
                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah.</small>
                                    <div class="mt-2">
                                        @if($setting->app_download_image)
                                            <img id="app-preview" src="{{ asset('storage/' . $setting->app_download_image) }}" alt="Preview" class="rounded" style="max-height: 80px;">
                                        @else
                                            <img id="app-preview" src="#" alt="Preview" class="d-none rounded" style="max-height: 80px;">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Simpan Pengaturan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $("#app_download_image").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#app-preview').attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endsection

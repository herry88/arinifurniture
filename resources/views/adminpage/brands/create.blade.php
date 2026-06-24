@extends('adminpage.master')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Brands /</span> Tambah Brand</h4>

        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Form Tambah Brand</h5>
                        <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nama Brand <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required placeholder="Contoh: Nokia">
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="link" class="form-label">Link (URL)</label>
                                    <input type="url" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link') }}" placeholder="https://example.com">
                                    @error('link') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="logo" class="form-label">Logo (Kecil) <span class="text-danger">*</span></label>
                                    <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo" name="logo" accept="image/*" required>
                                    <small class="text-muted">Digunakan untuk icon tab menu. Rekomendasi ukuran: 200x50 px</small>
                                    @error('logo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    <div class="mt-2">
                                        <img id="logo-preview" src="#" alt="Preview Logo" class="d-none rounded" style="max-height: 100px;">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="background_image" class="form-label">Background Image (Besar)</label>
                                    <input class="form-control @error('background_image') is-invalid @enderror" type="file" id="background_image" name="background_image" accept="image/*">
                                    <small class="text-muted">Digunakan untuk banner saat tab diklik. Rekomendasi: 800x400 px</small>
                                    @error('background_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    <div class="mt-2">
                                        <img id="bg-preview" src="#" alt="Preview Background" class="d-none rounded" style="max-height: 100px; max-width: 100%;">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Deskripsi singkat brand">{{ old('description') }}</textarea>
                                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="position" class="form-label">Posisi Urutan <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('position') is-invalid @enderror" id="position" name="position" value="{{ old('position', 0) }}" min="0" required>
                                    <small class="text-muted">Angka lebih kecil tampil lebih dulu.</small>
                                    @error('position') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label d-block">Status</label>
                                    <div class="form-check form-switch mt-2">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">Aktif Tampil</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Simpan Brand</button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            </div>
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
    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#' + previewId).attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('#' + previewId).addClass('d-none').attr('src', '#');
        }
    }

    $("#logo").change(function() {
        previewImage(this, 'logo-preview');
    });
    
    $("#background_image").change(function() {
        previewImage(this, 'bg-preview');
    });
</script>
@endsection

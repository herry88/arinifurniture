@extends('adminpage.master')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manajemen / Sales /</span> Tambah</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Form Tambah Sales</h5>
                        <a href="{{ route('admin.sales.index') }}" class="btn btn-secondary btn-sm">
                            <i class="bx bx-arrow-back"></i> Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.sales.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label" for="name">Nama Sales <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="whatsapp">Nomor WhatsApp <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="Contoh: 628123456789" required />
                                <small class="text-muted">Gunakan kode negara (62) tanpa tanda plus (+).</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="code">Kode Sales <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}" placeholder="Contoh: AGUS-01" required />
                                <small class="text-muted">Kode ini akan digunakan sebagai link: {{ url('/sales') }}/<span class="text-primary fw-bold">KODE</span></small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="photo">Foto (Opsional)</label>
                                <input class="form-control" type="file" id="photo" name="photo" accept="image/*" />
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Aktif</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

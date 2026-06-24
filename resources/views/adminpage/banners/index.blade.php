@extends('adminpage.master')
@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Kelola Banner</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Banner</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title"><i class="bi bi-images me-2"></i>Daftar Banner</h3>
                    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg me-1"></i>Tambah Banner
                    </a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th style="width:60px">No</th>
                                <th style="width:120px">Gambar</th>
                                <th>Judul</th>
                                <th>Tipe</th>
                                <th style="width:80px">Posisi</th>
                                <th style="width:80px">Status</th>
                                <th style="width:150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($banners as $index => $banner)
                                <tr>
                                    <td>{{ $banners->firstItem() + $index }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}"
                                            style="width:100px; height:60px; object-fit:cover; border-radius:4px;">
                                    </td>
                                    <td>
                                        <strong>{{ $banner->title }}</strong>
                                        @if ($banner->subtitle)
                                            <br><small class="text-muted">{{ $banner->subtitle }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($banner->type == 'slider_left')
                                            <span class="badge bg-primary">Slider Kiri</span>
                                        @elseif($banner->type == 'slider_right')
                                            <span class="badge bg-info">Slider Kanan</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Promo</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $banner->position }}</td>
                                    <td>
                                        @if ($banner->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.banners.edit', $banner->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Yakin ingin menghapus banner ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">Belum ada banner.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($banners->hasPages())
                    <div class="card-footer">
                        {{ $banners->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

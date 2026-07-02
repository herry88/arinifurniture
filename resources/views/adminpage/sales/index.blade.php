@extends('adminpage.master')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manajemen /</span> Data Sales</h4>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Sales</h5>
                <a href="{{ route('admin.sales.create') }}" class="btn btn-primary">
                    <i class="bx bx-plus me-1"></i> Tambah Sales
                </a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Photo</th>
                            <th>Nama</th>
                            <th>WhatsApp</th>
                            <th>Kode Sales</th>
                            <th>Status</th>
                            <th>Link</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($sales as $index => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($item->photo)
                                        <img src="{{ asset('storage/' . $item->photo) }}" alt="Photo" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                                    @else
                                        <div class="avatar avatar-online">
                                            <span class="avatar-initial rounded-circle bg-label-primary">{{ substr($item->name, 0, 2) }}</span>
                                        </div>
                                    @endif
                                </td>
                                <td><strong>{{ $item->name }}</strong></td>
                                <td>{{ $item->whatsapp }}</td>
                                <td><strong>{{ $item->code }}</strong></td>
                                <td>
                                    @if($item->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('/sales/' . $item->code) }}" target="_blank" class="btn btn-sm btn-outline-primary">Lihat</a>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.sales.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bx bx-edit-alt"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.sales.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus sales ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="bx bx-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data sales.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

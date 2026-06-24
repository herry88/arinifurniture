@extends('adminpage.master')
@section('content')
<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Dashboard</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->
<!--begin::App Content-->
<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row - Summary Cards-->
        <div class="row">
            <!--begin::Col - Total Pesanan-->
            <div class="col-lg-3 col-6">
                <div class="small-box text-bg-primary">
                    <div class="inner">
                        <h3>{{ $totalOrders }}</h3>
                        <p>Total Pesanan</p>
                    </div>
                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path
                            d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z">
                        </path>
                    </svg>
                    <a href="{{ route('admin.orders.index') }}"
                        class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        Lihat Semua <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
            </div>
            <!--end::Col-->
            <!--begin::Col - Total Produk-->
            <div class="col-lg-3 col-6">
                <div class="small-box text-bg-success">
                    <div class="inner">
                        <h3>{{ $totalProducts }}</h3>
                        <p>Total Produk</p>
                    </div>
                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path
                            d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z">
                        </path>
                    </svg>
                    <a href="{{ route('admin.products.index') }}"
                        class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        Lihat Semua <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
            </div>
            <!--end::Col-->
            <!--begin::Col - Total Kategori-->
            <div class="col-lg-3 col-6">
                <div class="small-box text-bg-warning">
                    <div class="inner">
                        <h3>{{ $totalCategories }}</h3>
                        <p>Total Kategori</p>
                    </div>
                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M5.566 4.657A4.505 4.505 0 016.75 4.5h10.5c.41 0 .806.055 1.183.157A3 3 0 0015.75 3h-7.5a3 3 0 00-2.684 1.657zM2.25 12a3 3 0 013-3h13.5a3 3 0 013 3v6a3 3 0 01-3 3H5.25a3 3 0 01-3-3v-6zM5.25 7.5c-.41 0-.806.055-1.184.157A3 3 0 016.75 6h10.5a3 3 0 012.683 1.657A4.505 4.505 0 0018.75 7.5H5.25z">
                        </path>
                    </svg>
                    <a href="{{ route('admin.categories.index') }}"
                        class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                        Lihat Semua <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
            </div>
            <!--end::Col-->
            <!--begin::Col - Total Pengguna-->
            <div class="col-lg-3 col-6">
                <div class="small-box text-bg-danger">
                    <div class="inner">
                        <h3>{{ $totalUsers }}</h3>
                        <p>Total Pengguna</p>
                    </div>
                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path
                            d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                        </path>
                    </svg>
                    <a href="{{ route('admin.users.index') }}"
                        class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        Lihat Semua <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->

        <!--begin::Row - Status Overview Cards-->
        <div class="row">
            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon text-bg-warning"><i class="bi bi-hourglass-split"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pesanan Menunggu</span>
                        <span class="info-box-number">{{ $pendingOrders }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon text-bg-info"><i class="bi bi-gear-fill"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Sedang Diproses</span>
                        <span class="info-box-number">{{ $processingOrders }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon text-bg-success"><i class="bi bi-check-circle-fill"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pesanan Selesai</span>
                        <span class="info-box-number">{{ $completedOrders }}</span>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Row-->

        <!--begin::Row - Chart & Revenue-->
        <div class="row">
            <!-- Start col - Chart -->
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title"><i class="bi bi-graph-up me-2"></i>Grafik Pendapatan & Pesanan (6 Bulan Terakhir)</h3>
                    </div>
                    <div class="card-body">
                        <div id="revenue-chart"></div>
                    </div>
                </div>
            </div>
            <!-- End col -->

            <!-- Start col - Revenue Summary -->
            <div class="col-lg-4">
                <div class="card text-white bg-primary bg-gradient border-primary mb-4">
                    <div class="card-header border-0">
                        <h3 class="card-title"><i class="bi bi-currency-dollar me-1"></i>Ringkasan Pendapatan</h3>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center mb-4">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h2>
                        <p class="text-center opacity-75 mb-0">Total pendapatan dari pesanan yang sudah dibayar</p>
                    </div>
                    <div class="card-footer border-0">
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="fw-bold fs-4">{{ $totalOrders }}</div>
                                <div class="opacity-75 small">Pesanan</div>
                            </div>
                            <div class="col-4">
                                <div class="fw-bold fs-4">{{ $totalProducts }}</div>
                                <div class="opacity-75 small">Produk</div>
                            </div>
                            <div class="col-4">
                                <div class="fw-bold fs-4">{{ $totalUsers }}</div>
                                <div class="opacity-75 small">Pengguna</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Low Stock Alert -->
                @if($lowStockProducts->count() > 0)
                <div class="card card-outline card-danger mb-4">
                    <div class="card-header">
                        <h3 class="card-title"><i class="bi bi-exclamation-triangle-fill me-2 text-danger"></i>Stok Rendah</h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @foreach($lowStockProducts as $product)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $product->name }}</span>
                                <span class="badge bg-danger rounded-pill">Sisa {{ $product->stock }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
            </div>
            <!-- End col -->
        </div>
        <!--end::Row-->

        <!--begin::Row - Recent Orders-->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title"><i class="bi bi-clock-history me-2"></i>Pesanan Terbaru</h3>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>No. Invoice</th>
                                    <th>Tanggal</th>
                                    <th>Pelanggan</th>
                                    <th>Total</th>
                                    <th>Status Pembayaran</th>
                                    <th>Status Pesanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentOrders as $order)
                                <tr>
                                    <td><code>#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</code></td>
                                    <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                                    <td>{{ $order->user->name ?? 'Guest' }}</td>
                                    <td>Rp {{ number_format($order->grand_total, 0, ',', '.') }}</td>
                                    <td>
                                        @if($order->payment_status == 'paid')
                                        <span class="badge bg-success">Dibayar</span>
                                        @elseif($order->payment_status == 'unpaid')
                                        <span class="badge bg-warning text-dark">Belum Dibayar</span>
                                        @else
                                        <span class="badge bg-danger">{{ ucfirst($order->payment_status) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($order->order_status == 'completed')
                                        <span class="badge bg-success">Selesai</span>
                                        @elseif($order->order_status == 'cancelled' || $order->order_status == 'canceled')
                                        <span class="badge bg-danger">Dibatalkan</span>
                                        @elseif($order->order_status == 'pending')
                                        <span class="badge bg-warning text-dark">Menunggu</span>
                                        @elseif($order->order_status == 'processing')
                                        <span class="badge bg-info">Diproses</span>
                                        @elseif($order->order_status == 'shipping')
                                        <span class="badge bg-primary">Dikirim</span>
                                        @else
                                        <span class="badge bg-secondary">{{ ucfirst($order->order_status) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">Belum ada pesanan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content-->

@endsection

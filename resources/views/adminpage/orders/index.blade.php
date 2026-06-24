@extends('adminpage.master')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Pesanan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Daftar Pesanan</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No. Order</th>
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Total (Rp)</th>
                            <th>Status Pembayaran</th>
                            <th>Status Pesanan</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr>
                            <td>#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
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
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i> Detail</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada pesanan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {{ $orders->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection

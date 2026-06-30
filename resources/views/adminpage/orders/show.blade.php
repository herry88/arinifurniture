@extends('adminpage.master')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Detail Pesanan #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Pesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8">
                <!-- Info Produk -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Produk yang Dipesan</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->product->name ?? 'Produk Dihapus' }}</td>
                                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-end">Subtotal Produk:</th>
                                    <th>Rp {{ number_format($order->total_price, 0, ',', '.') }}</th>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-end">Ongkos Kirim:</th>
                                    <th>Rp {{ number_format($order->shipping_price, 0, ',', '.') }}</th>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-end">Grand Total:</th>
                                    <th><h4 class="text-primary mb-0">Rp {{ number_format($order->grand_total, 0, ',', '.') }}</h4></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <!-- Info Pengiriman -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Pengiriman</h3>
                    </div>
                    <div class="card-body">
                        @if($order->shippingAddress)
                        <dl class="row mb-0">
                            <dt class="col-sm-3">Penerima</dt>
                            <dd class="col-sm-9">{{ $order->shippingAddress->recipient_name }} ({{ $order->shippingAddress->phone_number }})</dd>

                            <dt class="col-sm-3">Alamat Lengkap</dt>
                            <dd class="col-sm-9">
                                {{ $order->shippingAddress->address_detail }}<br>
                                {{ $order->shippingAddress->city_name }} - {{ $order->shippingAddress->province_name }}<br>
                                Kode Pos: {{ $order->shippingAddress->postal_code }}
                            </dd>

                            <dt class="col-sm-3">Kurir / Layanan</dt>
                            <dd class="col-sm-9 text-uppercase">{{ $order->courier }} - {{ $order->courier_service }}</dd>

                            <dt class="col-sm-3">Nomor Resi</dt>
                            <dd class="col-sm-9 fw-bold">{{ $order->receipt_number ?? 'Belum ada resi' }}</dd>
                        </dl>
                        @else
                        <p class="text-muted">Data alamat pengiriman tidak ditemukan.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- Update Status -->
                <div class="card card-warning card-outline mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Update Status</h3>
                    </div>
                    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="payment_status" class="form-label">Status Pembayaran</label>
                                <select class="form-select" id="payment_status" name="payment_status">
                                    <option value="unpaid" {{ $order->payment_status == 'unpaid' ? 'selected' : '' }}>Belum Dibayar</option>
                                    <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Dibayar</option>
                                    <option value="failed" {{ $order->payment_status == 'failed' ? 'selected' : '' }}>Gagal</option>
                                    <option value="expired" {{ $order->payment_status == 'expired' ? 'selected' : '' }}>Kadaluarsa</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="order_status" class="form-label">Status Pesanan</label>
                                <select class="form-select" id="order_status" name="order_status">
                                    <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                    <option value="processing" {{ $order->order_status == 'processing' ? 'selected' : '' }}>Diproses</option>
                                    <option value="shipping" {{ $order->order_status == 'shipping' ? 'selected' : '' }}>Dikirim</option>
                                    <option value="completed" {{ $order->order_status == 'completed' ? 'selected' : '' }}>Selesai</option>
                                    <option value="canceled" {{ $order->order_status == 'canceled' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="receipt_number" class="form-label">Nomor Resi</label>
                                <input type="text" class="form-control" id="receipt_number" name="receipt_number" value="{{ old('receipt_number', $order->receipt_number) }}" placeholder="Masukkan no resi jika sudah dikirim">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning w-100">Update Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

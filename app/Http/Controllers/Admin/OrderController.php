<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        return view('adminpage.orders.index', compact('orders'));
    }

    public function create()
    {
        // Not used
    }

    public function store(Request $request)
    {
        // Not used
    }

    public function show(Order $order)
    {
        $order->load(['user', 'orderItems.product', 'shippingAddress']);
        return view('adminpage.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        // Usually we update status directly in show view or a modal, but let's provide a method just in case
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'order_status' => 'required|in:pending,processing,shipping,completed,canceled',
            'payment_status' => 'required|in:unpaid,paid,failed,expired',
            'receipt_number' => 'nullable|string|max:255'
        ]);

        $order->update($request->only('order_status', 'payment_status', 'receipt_number'));

        return redirect()->route('admin.orders.show', $order->id)->with('success', 'Status pesanan berhasil diperbarui!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Pesanan berhasil dihapus!');
    }
}

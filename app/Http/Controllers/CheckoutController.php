<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product')->where('user_id', Auth::id())->get();
        
        if ($carts->isEmpty()) {
            return redirect()->route('home')->with('error', 'Keranjang Anda kosong.');
        }

        $totalPrice = $carts->sum(function ($cart) {
            $price = $cart->product->discount_price ?? $cart->product->price;
            return $price * $cart->quantity;
        });

        return view('frontend.checkout', compact('carts', 'totalPrice'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'recipient_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'province_name' => 'required|string|max:255',
            'city_name' => 'required|string|max:255',
            'address_detail' => 'required|string',
            'postal_code' => 'required|string|max:10',
            'payment_type' => 'required|in:cod,transfer',
        ]);

        $carts = Cart::with('product')->where('user_id', Auth::id())->get();
        if ($carts->isEmpty()) {
            return redirect()->route('home')->with('error', 'Keranjang Anda kosong.');
        }

        DB::beginTransaction();

        try {
            // 1. Create Shipping Address
            // Using province_id and city_id as 0 since we don't have an API yet.
            $shippingAddress = ShippingAddress::create([
                'user_id' => Auth::id(),
                'recipient_name' => $request->recipient_name,
                'phone_number' => $request->phone_number,
                'province_id' => 0, 
                'province_name' => $request->province_name,
                'city_id' => 0,
                'city_name' => $request->city_name,
                'address_detail' => $request->address_detail,
                'postal_code' => $request->postal_code,
                'is_default' => true,
            ]);

            // 2. Calculate Totals
            $totalPrice = $carts->sum(function ($cart) {
                $price = $cart->product->discount_price ?? $cart->product->price;
                return $price * $cart->quantity;
            });
            
            $shippingCost = 0; // Default shipping cost
            $grandTotal = $totalPrice + $shippingCost;

            // 3. Create Order
            $invoiceNumber = 'INV-' . strtoupper(Str::random(10));
            $order = Order::create([
                'user_id' => Auth::id(),
                'shipping_address_id' => $shippingAddress->id,
                'invoice_number' => $invoiceNumber,
                'total_price' => $totalPrice,
                'shipping_cost' => $shippingCost,
                'grand_total' => $grandTotal,
                'courier' => 'Default Courier',
                'courier_service' => 'Reguler',
                'order_status' => 'pending',
                'payment_status' => 'unpaid',
                'payment_type' => $request->payment_type,
            ]);

            // 4. Create Order Items
            foreach ($carts as $cart) {
                $price = $cart->product->discount_price ?? $cart->product->price;
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'product_name' => $cart->product->name,
                    'price' => $price,
                    'quantity' => $cart->quantity,
                    'weight' => $cart->product->weight ?? 1000,
                ]);
            }

            // 5. Clear Cart
            Cart::where('user_id', Auth::id())->delete();

            DB::commit();

            return redirect()->route('checkout.success', $order->invoice_number);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses pesanan: ' . $e->getMessage());
        }
    }

    public function success($invoice)
    {
        $order = Order::where('invoice_number', $invoice)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('frontend.success', compact('order'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private function getCartQuery()
    {
        if (Auth::check()) {
            return Cart::where('user_id', Auth::id());
        }
        
        // Ensure session is started and has an ID
        $sessionId = Session::getId();
        return Cart::where('session_id', $sessionId);
    }

    public function index()
    {
        $carts = $this->getCartQuery()->with('product')->get();
        return view('frontend.cart', compact('carts'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        
        $cart = $this->getCartQuery()
            ->where('product_id', $product->id)
            ->first();

        if ($cart) {
            $cart->quantity += $request->quantity;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => Auth::check() ? Auth::id() : null,
                'session_id' => Auth::check() ? null : Session::getId(),
                'product_id' => $product->id,
                'quantity' => $request->quantity
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function remove($id)
    {
        $cart = $this->getCartQuery()->where('id', $id)->firstOrFail();
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::with(['category', 'galleries'])->where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::with(['category', 'galleries'])
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(6)
            ->get();

        return view('frontend.product-detail', compact('product', 'relatedProducts'));
    }
}

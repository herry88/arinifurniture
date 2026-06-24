<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->orderBy('sort_order')->take(8)->get();
        
        $latestProducts = Product::with(['category', 'galleries'])->latest()->take(10)->get();
        $featuredProducts = Product::with(['category', 'galleries'])->where('is_featured', true)->take(10)->get();
        $discountProducts = Product::with(['category', 'galleries'])->whereNotNull('discount_price')->take(10)->get();
        
        $sliders = Banner::active()
            ->whereIn('type', ['slider_left', 'slider_right'])
            ->ordered()
            ->get();

        $brands = \App\Models\Brand::active()->ordered()->get();
            
        return view('frontend.home', compact('categories', 'latestProducts', 'featuredProducts', 'discountProducts', 'sliders', 'brands'));
    }
}

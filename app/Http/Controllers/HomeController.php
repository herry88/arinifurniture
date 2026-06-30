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

        // Deals of the Days: categories with their discounted products (max 4 tabs, 3 products each)
        $dealCategories = Category::whereNull('parent_id')
            ->orderBy('sort_order')
            ->take(4)
            ->get()
            ->map(function ($category) {
                $category->dealProducts = Product::with('galleries')
                    ->where('category_id', $category->id)
                    ->whereNotNull('discount_price')
                    ->where('status', true)
                    ->latest()
                    ->take(3)
                    ->get();
                return $category;
            })->filter(function ($category) {
                return $category->dealProducts->count() > 0;
            })->values();

        // Popular Products: featured products for the right sidebar (max 3)
        $popularProducts = Product::with('galleries')
            ->where('is_featured', true)
            ->where('status', true)
            ->latest()
            ->take(3)
            ->get();

        $sliders = Banner::active()
            ->whereIn('type', ['slider_left', 'slider_right'])
            ->ordered()
            ->get();

        $brands = \App\Models\Brand::active()->ordered()->get();

        return view('frontend.home', compact(
            'categories',
            'latestProducts',
            'featuredProducts',
            'discountProducts',
            'sliders',
            'brands',
            'dealCategories',
            'popularProducts'
        ));
    }
}

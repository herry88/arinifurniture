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

    public function search(Request $request)
    {
        $keyword = trim($request->input('keyword', ''));
        $categoryId = $request->input('category_id');
        $sortBy = $request->input('sort_by', 'latest');

        $query = Product::with(['category', 'galleries'])
            ->where('status', true);

        if ($keyword !== '') {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%")
                    ->orWhere('sku', 'like', "%{$keyword}%");
            });
        }

        if ($categoryId) {
            // Ambil semua ID kategori turunan (anak & cucu) agar produk sub-kategori ikut muncul
            $categoryIds = $this->getAllCategoryIds((int) $categoryId);
            $query->whereIn('category_id', $categoryIds);
        }

        switch ($sortBy) {
            case 'price_asc':
                $query->orderByRaw('COALESCE(discount_price, price) ASC');
                break;
            case 'price_desc':
                $query->orderByRaw('COALESCE(discount_price, price) DESC');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            default:
                $query->latest();
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::whereNull('parent_id')->orderBy('sort_order')->get();

        return view('frontend.search', compact('products', 'keyword', 'categories', 'categoryId', 'sortBy'));
    }

    /**
     * Rekursif: kembalikan array ID kategori beserta seluruh turunannya.
     */
    private function getAllCategoryIds(int $parentId): array
    {
        $ids = [$parentId];
        $children = Category::where('parent_id', $parentId)->pluck('id')->toArray();

        foreach ($children as $childId) {
            $ids = array_merge($ids, $this->getAllCategoryIds($childId));
        }

        return $ids;
    }
}

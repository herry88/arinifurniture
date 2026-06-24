<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductGallery;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('adminpage.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('adminpage.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sku' => 'nullable|string|max:100|unique:products,sku',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'weight' => 'required|integer|min:0',
            'status' => 'required|boolean',
            'is_featured' => 'nullable|boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('images');
        $data['slug'] = Str::slug($request->name);
        
        // Auto-generate SKU if empty
        if (empty($data['sku'])) {
            $data['sku'] = 'PRD-' . strtoupper(Str::random(6));
        }

        $data['is_featured'] = $request->has('is_featured') ? true : false;

        $product = Product::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('assets/product', 'public');
                ProductGallery::create([
                    'product_id' => $product->id,
                    'image' => $path,
                    'is_primary' => $index === 0 ? true : false
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show(Product $product)
    {
        return view('adminpage.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('adminpage.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sku' => 'nullable|string|max:100|unique:products,sku,' . $product->id,
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'weight' => 'required|integer|min:0',
            'status' => 'required|boolean',
            'is_featured' => 'nullable|boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('images');
        $data['slug'] = Str::slug($request->name);

        if (empty($data['sku'])) {
            $data['sku'] = 'PRD-' . strtoupper(Str::random(6));
        }

        $data['is_featured'] = $request->has('is_featured') ? true : false;

        $product->update($data);

        if ($request->hasFile('images')) {
            // Delete old images if new ones are uploaded
            foreach ($product->galleries as $gallery) {
                Storage::disk('public')->delete($gallery->image);
                $gallery->delete();
            }

            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('assets/product', 'public');
                ProductGallery::create([
                    'product_id' => $product->id,
                    'image' => $path,
                    'is_primary' => $index === 0 ? true : false
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        foreach ($product->galleries as $gallery) {
            Storage::disk('public')->delete($gallery->image);
        }
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}

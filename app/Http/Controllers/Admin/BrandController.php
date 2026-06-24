<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::ordered()->paginate(10);
        return view('adminpage.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('adminpage.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'description' => 'nullable|string',
            'link' => 'nullable|string|max:255',
            'position' => 'required|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->except(['logo', 'background_image']);
        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('assets/brand', 'public');
        }

        if ($request->hasFile('background_image')) {
            $data['background_image'] = $request->file('background_image')->store('assets/brand', 'public');
        }

        Brand::create($data);

        return redirect()->route('admin.brands.index')->with('success', 'Brand berhasil ditambahkan!');
    }

    public function edit(Brand $brand)
    {
        return view('adminpage.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'description' => 'nullable|string',
            'link' => 'nullable|string|max:255',
            'position' => 'required|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->except(['logo', 'background_image']);
        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('logo')) {
            if ($brand->logo) {
                Storage::disk('public')->delete($brand->logo);
            }
            $data['logo'] = $request->file('logo')->store('assets/brand', 'public');
        }

        if ($request->hasFile('background_image')) {
            if ($brand->background_image) {
                Storage::disk('public')->delete($brand->background_image);
            }
            $data['background_image'] = $request->file('background_image')->store('assets/brand', 'public');
        }

        $brand->update($data);

        return redirect()->route('admin.brands.index')->with('success', 'Brand berhasil diperbarui!');
    }

    public function destroy(Brand $brand)
    {
        if ($brand->logo) {
            Storage::disk('public')->delete($brand->logo);
        }
        if ($brand->background_image) {
            Storage::disk('public')->delete($brand->background_image);
        }
        
        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Brand berhasil dihapus!');
    }
}

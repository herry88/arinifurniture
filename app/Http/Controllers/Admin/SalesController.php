<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = \App\Models\Sales::orderBy('created_at', 'desc')->get();
        return view('adminpage.sales.index', compact('sales'));
    }

    public function create()
    {
        return view('adminpage.sales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:20',
            'code' => 'required|string|max:50|unique:sales',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('sales', 'public');
        }

        \App\Models\Sales::create($data);

        return redirect()->route('admin.sales.index')->with('success', 'Sales created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $sales = \App\Models\Sales::findOrFail($id);
        return view('adminpage.sales.edit', compact('sales'));
    }

    public function update(Request $request, string $id)
    {
        $sales = \App\Models\Sales::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:20',
            'code' => 'required|string|max:50|unique:sales,code,' . $sales->id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('photo')) {
            if ($sales->photo && \Illuminate\Support\Facades\Storage::disk('public')->exists($sales->photo)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($sales->photo);
            }
            $data['photo'] = $request->file('photo')->store('sales', 'public');
        }

        $sales->update($data);

        return redirect()->route('admin.sales.index')->with('success', 'Sales updated successfully.');
    }

    public function destroy(string $id)
    {
        $sales = \App\Models\Sales::findOrFail($id);
        
        if ($sales->photo && \Illuminate\Support\Facades\Storage::disk('public')->exists($sales->photo)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($sales->photo);
        }
        
        $sales->delete();

        return redirect()->route('admin.sales.index')->with('success', 'Sales deleted successfully.');
    }
}

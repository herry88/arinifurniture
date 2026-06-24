<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->paginate(10);
        return view('adminpage.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('adminpage.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        Role::create($request->all());

        return redirect()->route('admin.roles.index')->with('success', 'Hak akses berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Role $role)
    {
        return view('adminpage.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
        ]);

        $role->update($request->all());

        return redirect()->route('admin.roles.index')->with('success', 'Hak akses berhasil diperbarui!');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Hak akses berhasil dihapus!');
    }
}

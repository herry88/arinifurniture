<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function show($code)
    {
        $sales = \App\Models\Sales::where('code', $code)->where('is_active', 1)->firstOrFail();
        
        // Simpan kode sales ke session
        session(['sales_code' => $sales->code]);
        
        // Redirect ke halaman utama (home)
        return redirect()->route('home');
    }
}

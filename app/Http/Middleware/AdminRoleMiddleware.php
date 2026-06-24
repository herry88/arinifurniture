<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Asumsi relasi user dengan role sudah benar
            if (Auth::user()->role && in_array(Auth::user()->role->name, ['Admin', 'Superadmin'])) {
                return $next($request);
            }
        }
        
        // Jika tidak berhak, bisa diredirect ke login atau halaman error/utama
        return redirect()->route('admin.login')->with('error', 'Anda tidak memiliki hak akses ke halaman Admin.');
    }
}

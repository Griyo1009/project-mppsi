<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user sudah login
        if (Auth::check()) {
            // Cek role user
            // 1 = Admin
            if (Auth::user()->role== 1) {
                return $next($request);
            }
        }
        
        // Jika tidak login atau bukan admin, alihkan ke halaman utama
        return redirect('/login')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
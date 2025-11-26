<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user sudah login (role 0 atau 1)
        if (Auth::check()) {
            return $next($request);
        }
        
        // Jika belum login (guest), alihkan ke halaman login
        return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
    }
}
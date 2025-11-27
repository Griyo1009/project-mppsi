<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        // Mendapatkan guards (biasanya hanya 'web')
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // 1. Cek apakah user sudah login
            if (Auth::guard($guard)->check()) {
                
                // 2. Ambil objek user yang sedang login
                $user = Auth::guard($guard)->user();

                // 3. Logika Pengalihan Berdasarkan Role (0=User Biasa, 1=Admin)
                if ($user->role == 1) {
                    // Jika role adalah Admin, alihkan ke halaman Admin
                    return redirect('/admin/home'); 
                } 
                
                // Jika role adalah User Biasa (0) atau role lain yang bukan admin
                return redirect('/warga/homepage'); 
            }
        }

        // Jika user belum login (Guest), lanjutkan ke halaman yang diminta (Login/Register)
        return $next($request);
    }
}

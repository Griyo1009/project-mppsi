<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil admin.
     */
    public function index()
    {
        // Asumsi route ini mengembalikan view blade Anda
        return view('admin.admin-profile');
    }

    /**
     * Memperbarui biodata pengguna (Nama dan Email).
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi, pastikan email unik kecuali email pengguna saat ini
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => [
                'email'
            ],
        ]);

        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Profil berhasil diperbarui.',
            'data' => [
                'nama_lengkap' => $user->nama_lengkap,
                'email' => $user->email 
            ]
        ]);
    }

    /**
     * Update foto profil pengguna.
     */
    public function updatePhoto(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'foto_profil' => 'required|image|mimes:jpg,jpeg,png|max:2048' // Max 2MB
        ]);

        // Hapus foto lama, kecuali jika foto lama adalah 'default.png' atau kosong
        if ($user->foto_profil && $user->foto_profil !== 'default.png') {
            // Pastikan Anda menggunakan 'storage' sebagai disk public
            Storage::disk('public')->delete('profiles/' . $user->foto_profil);
        }

        // Upload foto baru
        $file = $request->file('foto_profil');
        // Gunakan hash nama file untuk menghindari konflik
        $filename = time() . '_' . $file->hashName(); 
        $file->storeAs('profiles', $filename, 'public');

        $user->foto_profil = $filename;
        $user->save();
        
        // Mengembalikan path lengkap untuk update di client side
        return response()->json([
            'success' => true,
            'message' => 'Foto profil berhasil diperbarui.',
            'image' => asset('storage/profiles/' . $user->foto_profil)
        ]);
    }
}
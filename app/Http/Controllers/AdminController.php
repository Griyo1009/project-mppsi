<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
    public function index()
    {
        // Data dummy sementara, nanti bisa diganti pakai model
        $data = [
            'warga_aktif' => 10,
            'materi_upload' => 10,
            'komentar_count' => 8,
        ];

        return view('admin.homepage', compact('data'));
    }
    public function pengumuman()
    {
        return view('admin.pengumuman');
    }
    public function materi()
    {
        return view('admin.materi');
    }
    public function warga()
    {
        // Ambil akun yang belum disetujui (status_akun = 0)
        $pending = User::where('status_akun', "0")->get();

        // Ambil akun yang sudah aktif (status_akun = 1) atau diblokir (status_akun = 2)
        $user = User::whereIn('status_akun', ["1", "2"])->get();

        return view('admin.warga', compact('pending', 'user'));
    }
    public function profil()
    {
        return view('admin.profil');
    }



    public function terima($id)
    {
        $user = User::findOrFail($id);
        $user->status_akun = 1;        // 1 = diterima
        $user->save();

        return redirect()->back()->with('success', 'Akun berhasil diterima!');
    }

    public function blokir($id)
    {
        $user = User::findOrFail($id); // pakai primaryKey id_user
        $user->status_akun = 2;        // 2 = diblokir
        $user->save();

        return redirect()->back()->with('success', 'Akun berhasil diblokir!');
    }
    public function buka($id)
    {
        $user = User::findOrFail($id); // pakai primaryKey id_user
        $user->status_akun = 1;        // 2 = diblokir
        $user->save();

        return redirect()->back()->with('success', 'Akun berhasil dibuka!');
    }


}



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;

class WargaController extends Controller
{
    public function homepage()
    {
        return view('warga.homepage');
    }
    public function pengumuman()
    {
        $pengumuman = Pengumuman::orderBy('created_at')
            ->take(3)
            ->get();

        return view('warga.pengumuman', compact());
    }
    public function materi()
    {
        return view('warga.materi');
    }
    public function lihat_materi()
    {
        return view('warga.lihat-materi');
    }
    public function profil_warga()
    {
        return view('warga.profil-warga');
    }
    public function edit_profil_warga()
    {
        return view('warga.edit-profil-warga');
    }
}

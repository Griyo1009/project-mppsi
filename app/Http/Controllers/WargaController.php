<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function homepage()
    {
        return view('warga.homepage');
    }
    public function pengumuman()
    {
        return view('warga.pengumuman');
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

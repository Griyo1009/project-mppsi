<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\Materi;

class WargaController extends Controller
{
    public function homepage()
    {
        $pengumuman = Pengumuman::latest()->first();
        $materi = Materi::latest()->take(6)->get();
        return view('warga.homepage', compact('pengumuman', 'materi'));
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

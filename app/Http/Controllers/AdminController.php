<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.warga');
    }
}



<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengumuman;
use App\Models\Komentar;



class AdminController extends Controller
{
    //menampilkan jumlah warga aktig, jumlah materi yang sudah di upload, dan komentar yang belum dibaca
    public function index()
    {
        $warga_aktif = User::where('role', 0)
            ->where('status_akun', '!=', 2)
            ->count();
        $materi_upload = Materi::count();
        $komentar_baru = Komentar::where('status_baca', 0)
            ->latest('tgl_komen')
            ->with('materi', 'user')
            ->get();

        return view('admin.homepage', compact(
            'warga_aktif',
            'materi_upload',
            'komentar_baru'
        ));
    }

    // untuk membuka komentar terbaru
    public function bukaKomentar($id_komentar)
    {
        $komentar = Komentar::findOrFail($id_komentar);
        $komentar->status_baca = 1;
        $komentar->save();

        return redirect()->route('admin.lihat-materi', $komentar->id_materi);
    }

    //////////////////////////////masih ga tau ini untuk apa makanya ku komentarin
    // public function pengumuman()
    // {
    //     $pengumuman = Pengumuman::latest()->get();
    //     return view('admin.pengumuman', compact('pengumuman'));
    // }

    ///////////////////////////////masih ga tau ini untuk apa makanya ku komentarin
    // public function materi()
    // {
    //     $materi = Materi::latest()->get(); // ambil semua materi
    //     return view('admin.materi', compact('materi'));

    // }

    //menampilkan daftar materi di page daftar materi
    public function daftarMateri()
    {
        $materi = Materi::with('files')->orderBy('created_at', 'desc')->get(); // sortir berdasarkan tanggal
        return view('admin.daftar-materi', compact('materi'));
    }

    //menampilkan detail materi
    public function lihatMateri($id_materi)
    {
        $materi = Materi::with('files', 'komentar.user')->findOrFail($id_materi);
        return view('admin.lihat-materi', compact('materi'));
    }


    //untuk bagian page manage akun
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
        $user->status_akun = 1;        //  = legal
        $user->save();

        return redirect()->back()->with('success', 'Akun berhasil dibuka!');
    }


}



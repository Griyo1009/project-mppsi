<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengumuman;
use App\Models\Komentar;



class AdminController extends Controller
{
    public function index()
    {
        // Data dummy sementara, nanti bisa diganti pakai model
        $warga_aktif = User::where('role', 0)
            ->where('status_akun', '!=', 2)
            ->count();
        $materi_upload = Materi::count();
        // $komentar_count = Komentar::count();
        $komentar_baru = Komentar::where('status_baca', 0)
            ->latest('tgl_komen')
            ->with('materi', 'user') // eager load untuk materi dan user
            ->get();

        return view('admin.homepage', compact(
            'warga_aktif',
            'materi_upload',
            'komentar_baru'
        ));
    }

    public function bukaKomentar($id_komentar)
    {
        $komentar = Komentar::findOrFail($id_komentar);
        $komentar->status_baca = 1;
        $komentar->save();

        return redirect()->route('admin.lihat-materi', $komentar->id_materi);
    }

    public function pengumuman()
    {
        $pengumuman = Pengumuman::latest()->get();
        return view('admin.pengumuman', compact('pengumuman'));
    }

    public function materi()
    {
        $materi = Materi::latest()->get(); // ambil semua materi
        return view('admin.materi', compact('materi'));

    }
    public function daftarMateri()
    {
        $materi = Materi::with('files')->orderBy('created_at', 'desc')->get(); // sortir berdasarkan tanggal
        return view('admin.daftar-materi', compact('materi'));
    }

    public function lihatMateri($id_materi)
    {
        $materi = Materi::with('files', 'komentar.user')->findOrFail($id_materi);
        return view('admin.lihat-materi', compact('materi'));
    }

    //dipindah nanti
    public function kirimKomentar(Request $request, $id_materi)
    {
        $request->validate([
            'isi_komen' => 'required|string|max:1000',
        ]);

        Komentar::create([
            'id_materi' => $id_materi,
            'id_user' => auth()->id(), // Admin yang login
            'isi_komen' => $request->isi_komen,
            'tgl_komen' => now(),
        ]);

        return redirect()->route('admin.lihat-materi', $id_materi)->with('success', 'Komentar berhasil dikirim');
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
        $user->status_akun = 1;        //  = legal
        $user->save();

        return redirect()->back()->with('success', 'Akun berhasil dibuka!');
    }


}



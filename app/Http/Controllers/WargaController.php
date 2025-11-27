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
    $allPengumuman = Pengumuman::latest()->get();

    $pengumumanTerbaru = null;
    $pengumumanTerdahulu = collect();

    if ($allPengumuman->isNotEmpty()) {
        $pengumumanTerbaru = $allPengumuman->first();
        $pengumumanTerdahulu = $allPengumuman->slice(1);
    }
    return view('warga.pengumuman', compact('pengumumanTerbaru', 'pengumumanTerdahulu'));
    
    }
    public function materi()
    {
        $materi = Materi::latest()->get(); // ambil semua materi
        return view('warga.materi', compact('materi'));
    }
    public function lihat_materi($id_materi)
    {
        $materi = Materi::with('files', 'komentar.user')->findOrFail($id_materi);

        return view('warga.lihat-materi', compact('materi'));
    }

    public function profil_warga()
    {
        return view('warga.profil-warga');
    }
    public function edit_profil_warga(Request $request)
    {
        return view('warga.edit-profil-warga');
    }

    public function update_profil_warga(Request $request)
    {
        return "MASUK CONTROLLER";
        // $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'nik' => 'required|string|max:20',
        //     'email' => 'required|email|max:255',
        // ]);

        // $user = auth()->user();

        // $user->update([
        //     'nama_lengkap' => $request->nama,
        //     'NIK' => $request->nik,
        //     'email' => $request->email,
        // ]);

        // return back()->with('success', 'Profil berhasil diperbarui!');
    }



    public function kirimKomentar(Request $request, $id_materi)
    {
        $request->validate([
            'isi_komen' => 'required|string|max:500'
        ]);

        \App\Models\Komentar::create([
            'id_materi' => $id_materi,
            'id_user' => auth()->id(),
            'isi_komen' => $request->isi_komen,
            'tgl_komen' => now(),
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }

}

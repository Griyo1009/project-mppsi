<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function kirimKomentar(Request $request, $id_materi)
    {
        $request->validate([
            'isi_komen' => 'required|string|max:1000',
        ]);

        Komentar::create([
            'id_materi' => $id_materi,
            'id_user' => auth()->id(),
            'isi_komen' => $request->isi_komen,
            'tgl_komen' => now(),
        ]);

        return redirect()->route('admin.lihat-materi', $id_materi)->with('success', 'Komentar berhasil dikirim');
    }
}
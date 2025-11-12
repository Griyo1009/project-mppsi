<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\log;

class PengumumanController extends Controller
{
    public function index()
    {
        // Ambil semua data pengumuman dari database
        $pengumuman = Pengumuman::latest()->get();

        // Kirim ke view
        return view('admin.pengumuman', compact('pengumuman'));
    }
    public function show($id)
    {
        $pengumuman = Pengumuman::find($id);
        if (!$pengumuman) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan.'], 404);
        }
        return response()->json($pengumuman);
    }


    public function fetch()
    {
        $data = Pengumuman::latest()->get();
        return response()->json($data);
    }

     public function store(Request $request)
    {
        // validasi
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tgl_pengumuman' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        // ambil id user dengan beberapa fallback
        $authUser = auth()->user(); // object atau null
        $idUser = null;

        if ($authUser) {
            // jika primaryKey di User adalah id_user
            if (isset($authUser->id_user)) {
                $idUser = $authUser->id_user;
            } else {
                // fallback ke Laravel standard (id)
                $idUser = $authUser->id ?? null;
            }
        }

        // fallback ke helper auth()->id() — Laravel biasanya mengembalikan value primaryKey
        if (!$idUser) {
            $idUser = auth()->id();
        }

        // fallback ke session manual (jika login disimpan custom)
        if (!$idUser && session()->has('id_user')) {
            $idUser = session('id_user');
        }

        // jika masih null — stop dan kembalikan error terperinci
        if (!$idUser) {
            // log untuk debugging server
            Log::warning('Pengumuman store: id_user not found', [
                'auth_user' => $authUser ? $authUser->toArray() : null,
                'session_id_user' => session('id_user'),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'User belum terautentikasi. id_user tidak ditemukan.',
            ], 401);
        }

        // simpan file jika ada
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('pengumuman', 'public');
        }

        // siapkan data
        $data = [
            'id_user' => $idUser,
            'judul' => $validated['judul'],
            'isi' => $validated['isi'],
            'tgl_pengumuman' => $validated['tgl_pengumuman'],
            'gambar' => $gambarPath,
        ];

        try {
            $pengumuman = Pengumuman::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Pengumuman berhasil ditambahkan.',
                'data' => $pengumuman,
            ]);
        } catch (\Exception $e) {
            Log::error('Pengumuman store error: '.$e->getMessage(), [
                'data' => $data,
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server saat menyimpan pengumuman.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function update(Request $request, $id)
{
    $pengumuman = Pengumuman::findOrFail($id);

    // Validasi ringan
    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'isi' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
    ]);

    // Simpan gambar baru kalau ada
    if ($request->hasFile('gambar')) {
        // hapus gambar lama
        if ($pengumuman->gambar) {
            \Storage::disk('public')->delete($pengumuman->gambar);
        }

        $path = $request->file('gambar')->store('pengumuman', 'public');
        $validated['gambar'] = $path;
    }

    // Update data ke DB
    $pengumuman->update($validated);

    return response()->json([
        'success' => true,
        'message' => 'Pengumuman berhasil diperbarui.',
        'data' => $pengumuman
    ]);
}


   public function destroy($id)
{
    try {
        $pengumuman = Pengumuman::find($id);

        if (!$pengumuman) {
            return response()->json([
                'success' => false,
                'message' => 'Pengumuman tidak ditemukan atau sudah dihapus sebelumnya.',
            ], 404);
        }

        // Hapus gambar jika ada
        if ($pengumuman->gambar && Storage::disk('public')->exists($pengumuman->gambar)) {
            Storage::disk('public')->delete($pengumuman->gambar);
        }

        $judul = $pengumuman->judul; // buat dikirim di response
        $pengumuman->delete();

        return response()->json([
            'success' => true,
            'message' => "Pengumuman '{$judul}' berhasil dihapus.",
            'deleted_id' => $id,
        ]);
    } catch (\Exception $e) {
        \Log::error('Gagal menghapus pengumuman: ' . $e->getMessage(), [
            'pengumuman_id' => $id,
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan saat menghapus pengumuman.',
            'error' => $e->getMessage(),
        ], 500);
    }
}


}


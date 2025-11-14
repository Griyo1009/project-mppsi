<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\MateriFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    // ===== TAMPILKAN LIST MATERI =====
    public function index()
    {
        $materi = Materi::with('files')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.materi', compact('materi'));
    }

    // ===== SHOW: AMBIL 1 DATA =====
    public function show($id)
    {
        $materi = Materi::with('files')->find($id);

        if (!$materi) {
            return response()->json([
                'success' => false,
                'message' => 'Materi tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $materi
        ]);
    }

    // ===== STORE: TAMBAH MATERI BARU =====
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:225',
            'deskripsi' => 'required|string',
            'files.*' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,jpg,jpeg,png,mp4|max:51200',
            'links.*' => 'nullable|url',
        ]);

        try {
            $materi = Materi::create([
                'judul_materi' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'tgl_up' => now()->format('Y-m-d'),
                'id_user' => Auth::id(),
            ]);

            // Simpan file
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $path = $file->store('materi', 'public');
                    $ext = strtolower($file->getClientOriginalExtension());
                    $tipe = match ($ext) {
                        'pdf' => 'pdf',
                        'mp4' => 'mp4',
                        'jpg', 'jpeg', 'png' => 'gambar',
                        'doc', 'docx', 'ppt', 'pptx' => 'teks',
                        default => 'lainnya',
                    };

                    MateriFile::create([
                        'id_materi' => $materi->id_materi,
                        'file_path' => $path,
                        'tipe_file' => $tipe,
                    ]);
                }
            }

            // Simpan link eksternal
            if ($request->links && is_array($request->links)) {
                foreach ($request->links as $link) {
                    if (!empty($link)) {
                        MateriFile::create([
                            'id_materi' => $materi->id_materi,
                            'link_url' => $link,
                            'tipe_file' => 'link',
                        ]);
                    }
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Materi berhasil ditambahkan!',
                'data' => $materi->load('files')
            ]);
        } catch (\Exception $e) {
            \Log::error('Gagal menyimpan materi: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan materi.'
            ], 500);
        }
    }

    // ===== UPDATE MATERI =====
    public function update(Request $request, $id)
    {
        $materi = Materi::find($id);

        if (!$materi) {
            return response()->json([
                'success' => false,
                'message' => 'Materi tidak ditemukan.'
            ], 404);
        }

        $request->validate([
            'judul_materi' => 'required|string|max:225',
            'deskripsi' => 'nullable|string',
            'files.*' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,jpg,jpeg,png,mp4|max:51200',
            'link_url' => 'nullable|url',
        ]);

        try {
            $materi->update([
                'judul_materi' => $request->judul_materi,
                'deskripsi' => $request->deskripsi,
                'tgl_up' => now()->format('Y-m-d'),
            ]);

            // Simpan file baru
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $path = $file->store('materi', 'public');
                    $ext = strtolower($file->getClientOriginalExtension());
                    $tipe = match ($ext) {
                        'pdf' => 'pdf',
                        'mp4' => 'mp4',
                        'jpg', 'jpeg', 'png' => 'gambar',
                        'doc', 'docx', 'ppt', 'pptx' => 'teks',
                        default => 'lainnya',
                    };

                    MateriFile::create([
                        'id_materi' => $materi->id_materi,
                        'file_path' => $path,
                        'tipe_file' => $tipe,
                    ]);
                }
            }

            // Update atau buat link baru
            if ($request->link_url) {
                MateriFile::updateOrCreate(
                    ['id_materi' => $materi->id_materi, 'tipe_file' => 'link'],
                    ['link_url' => $request->link_url]
                );
            }

            return response()->json([
                'success' => true,
                'message' => 'Materi berhasil diperbarui!',
                'data' => $materi->load('files')
            ]);
        } catch (\Exception $e) {
            \Log::error('Gagal update materi: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memperbarui materi.'
            ], 500);
        }
    }

    // ===== HAPUS MATERI =====
    public function destroy($id)
    {
        $materi = Materi::with('files')->find($id);

        if (!$materi) {
            return response()->json([
                'success' => false,
                'message' => 'Materi tidak ditemukan.'
            ], 404);
        }

        try {
            foreach ($materi->files as $file) {
                if ($file->file_path && Storage::disk('public')->exists($file->file_path)) {
                    Storage::disk('public')->delete($file->file_path);
                }
                $file->delete();
            }

            $materi->delete();

            return response()->json([
                'success' => true,
                'message' => 'Materi dan semua file berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            \Log::error('Gagal hapus materi: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus materi.'
            ], 500);
        }
    }

    // ===== HAPUS FILE TERKAIT =====
    public function destroyFile($id)
    {
        $file = MateriFile::find($id);

        if (!$file) {
            return response()->json(['success' => false, 'message' => 'File tidak ditemukan.']);
        }

        if ($file->file_path && Storage::disk('public')->exists($file->file_path)) {
            Storage::disk('public')->delete($file->file_path);
        }

        $file->delete();

        return response()->json(['success' => true, 'message' => 'File berhasil dihapus.']);
    }
}

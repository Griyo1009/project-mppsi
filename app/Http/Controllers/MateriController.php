<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\MateriFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Gunakan Log untuk debugging

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
            // Pastikan ini adalah nama input di form create
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
            Log::error('Gagal menyimpan materi: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan materi.'
            ], 500);
        }
    }

    // ===== UPDATE MATERI (TERKOREKSI) =====
    public function update(Request $request, $id)
    {
        $materi = Materi::with('files')->find($id);

        if (!$materi) {
            return response()->json([
                'success' => false,
                'message' => 'Materi tidak ditemukan.'
            ], 404);
        }

        // 1. VALIDASI DATA BARU
        // Menggunakan 'new_files.*' dan 'new_links.*' sesuai nama input dari JS
        $request->validate([
            'judul_materi' => 'required|string|max:225',
            'deskripsi' => 'nullable|string',
            'new_files.*' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,jpg,jpeg,png,mp4|max:51200',
            'new_links.*' => 'nullable|url',
        ]);

        try {
            // 2. UPDATE TEXT DASAR (Judul & Deskripsi)
            $materi->update([
                'judul_materi' => $request->judul_materi,
                'deskripsi' => $request->deskripsi,
                'tgl_up' => now()->format('Y-m-d'),
                // 'id_user' tidak perlu di-update jika tidak berubah
            ]);

            // 3. PROSES PENGHAPUSAN FILE LAMA (deleted_files)
            if ($request->deleted_files) {
                $deletedIds = json_decode($request->deleted_files, true);
                
                if (is_array($deletedIds) && count($deletedIds) > 0) {
                    $filesToDelete = MateriFile::whereIn('id_file', $deletedIds)->get();
                    
                    foreach ($filesToDelete as $file) {
                        // Hapus file fisik jika bukan link dan memiliki path
                        if ($file->tipe_file !== 'link' && $file->file_path && Storage::disk('public')->exists($file->file_path)) {
                            Storage::disk('public')->delete($file->file_path);
                        }
                        // Hapus record dari database
                        $file->delete();
                    }
                }
            }
            
            // 4. SIMPAN FILE BARU (new_files)
            // Menggunakan 'new_files' sesuai nama input di FormData JS
            if ($request->hasFile('new_files')) { 
                foreach ($request->file('new_files') as $file) {
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
            
            // 5. SIMPAN LINK BARU (new_links)
            // Menggunakan 'new_links' sesuai nama input di FormData JS
            if ($request->new_links && is_array($request->new_links)) {
                foreach ($request->new_links as $link) {
                    // PENTING: Cek agar input kosong di UI (yang Anda minta) tidak tersimpan
                    if (!empty($link)) { 
                        MateriFile::create([
                            'id_materi' => $materi->id_materi,
                            'link_url' => $link,
                            'tipe_file' => 'link',
                        ]);
                    }
                }
            }

            // 6. RETURN DATA TERBARU
            return response()->json([
                'success' => true,
                'message' => 'Materi berhasil diperbarui!',
                'data' => $materi->load('files') // Reload relasi files
            ]);
        } catch (\Exception $e) {
            Log::error('Gagal update materi: ' . $e->getMessage());
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
            Log::error('Gagal hapus materi: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus materi.'
            ], 500);
        }
    }

}
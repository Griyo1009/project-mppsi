@extends('layouts.warga-layout')

@section('page-title', 'Lihat Materi Warga')

@push('styles')
    <style>
        /* Variabel Warna Utama */
        :root {
            --primary-color: #162660;
            --secondary-color: #2D4EC6;
        }

        /* Gaya khusus untuk tombol kembali agar terlihat tebal dan rapi */
        .back-link {
            color: var(--primary-color) !important; /* Warna utama untuk teks */
            transition: color 0.2s ease;
        }

        .back-link:hover {
            color: var(--secondary-color) !important; /* Warna secondary saat hover */
        }

        /* Gaya untuk teks gradient (sesuai yang ada di Admin Layout) */
        .gradient-text {
            /* Pastikan class ini didefinisikan di CSS layout jika Anda ingin warna gradien */
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Gaya untuk Konten Materi (latar belakang gradient) */
        .materi-content-wrapper {
            background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* Gaya untuk Card Deskripsi */
        .materi-description-card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Gaya untuk List File/Link Materi */
        .file-item-card {
            border: 1px solid #e0e0e0;
            border-left: 5px solid var(--secondary-color); /* Garis biru sebagai highlight */
            border-radius: 8px;
            transition: background-color 0.2s;
        }

        .file-item-card:hover {
            background-color: #f8f9fa;
        }
        
        /* Gaya untuk Tombol Unduh/Buka */
        .btn-gradient {
            background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
            border: none;
            color: white;
            transition: transform 0.2s;
        }
        
        .btn-gradient:hover {
            transform: translateY(-1px);
            color: white;
        }

        /* Gaya untuk Komentar Warga */
        .comment-card {
            border-left: 4px solid #adb5bd; /* Abu-abu untuk komentar warga */
            border-radius: 6px;
            background-color: #ffffff;
            transition: box-shadow 0.2s;
        }
        
        .comment-card:hover {
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.08);
        }

        /* Gaya untuk Komentar Admin/Balasan */
        .comment-card-admin {
            border-left: 4px solid var(--secondary-color); /* Biru untuk komentar Admin/Balasan */
            background-color: #e9ecef;
        }
    </style>
@endpush

@section('content')

    <div class="container py-4">

        {{-- 1. HEADER & TOMBOL KEMBALI --}}
        {{-- Menggunakan route dan style yang sesuai dengan Admin, menyesuaikan route ke warga.materi --}}
        <a href="{{ route('warga.materi') }}"
            class="d-inline-flex align-items-center fw-bold text-decoration-none back-link mb-3">
            <i class="bi bi-arrow-left fs-5 me-1"></i>
            <span class="fs-6 ps-2">Kembali</span>
        </a>
        
        <hr class="mt-0 mb-4 border-2 opacity-75 border-dark">

        {{-- 2. JUDUL MATERI --}}
        <h2 class="gradient-text fw-bold">{{ $materi->judul_materi }}</h2>
        <p class="text-muted mb-4 small">
            <i class="bi bi-calendar-event me-1"></i> Tanggal Upload: 
            {{ \Carbon\Carbon::parse($materi->tgl_up)->format('d F Y') }}
        </p>

        {{-- 3. WADAH MATERI UTAMA --}}
        <div class="materi-content-wrapper mb-5"    >
            <div class="card materi-description-card p-4">
                
                {{-- DESKRIPSI --}}
                <h5 class="fw-semibold text-secondary mb-3 border-bottom pb-1">
                    <i class="bi bi-file-earmark-text me-2"></i> Deskripsi Materi
                </h5>
                <p class="mb-4 text-dark">{{ $materi->deskripsi }}</p>

                {{-- DAFTAR FILE/LINK --}}
                <h5 class="fw-semibold text-secondary mb-3 border-bottom pb-1">
                    <i class="bi bi-paperclip me-2"></i> Sumber Materi
                </h5>

                @forelse ($materi->files as $file)
                    <div class="file-item-card d-flex justify-content-between align-items-center p-3 mb-2">
                        
                        {{-- Nama File/Link --}}
                        <div class="d-flex align-items-center gap-3">
                            @if ($file->file_path)
                                <i class="bi bi-file-earmark-pdf-fill fs-4 text-danger"></i>
                                <span class="fw-medium">{{ $file->nama_alias ?? 'Materi File' }} (PDF/Dokumen)</span>
                            @elseif ($file->link_url)
                                <i class="bi bi-youtube fs-4 text-danger"></i>
                                <span class="fw-medium">{{ $file->nama_alias ?? 'Video/Link' }}</span>
                            @endif
                        </div>

                        {{-- Tombol Aksi --}}
                        <div>
                            @if ($file->file_path)
                                <a href="{{ asset('storage/' . $file->file_path) }}" class="btn btn-sm btn-gradient px-4" download>
                                    <i class="bi bi-download me-1"></i> Unduh
                                </a>
                            @elseif ($file->link_url)
                                <a href="{{ $file->link_url }}" target="_blank" class="btn btn-sm btn-gradient px-4">
                                    <i class="bi bi-box-arrow-up-right me-1"></i> Buka
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="alert alert-warning text-center small my-2">
                        Tidak ada file atau tautan yang dilampirkan pada materi ini.
                    </div>
                @endforelse
            </div>
        </div>

        {{-- 4. KOMENTAR --}}
        <h4 class="fw-bold mb-3 border-bottom pb-2">
            <i class="bi bi-chat-dots-fill me-2 gradient-text"></i> Diskusi & Komentar
        </h4>

        <div class="row">
            <div class="col-lg-8 overflow-auto" style="max-height: 200px;"> 
                
                {{-- DAFTAR KOMENTAR --}}
                @forelse ($materi->komentar as $k)
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 me-3">
                            {{-- Icon disesuaikan berdasarkan role --}}
                            @if($k->user->role == 'admin')
                                <i class="bi bi-person-circle fs-3" style="color: var(--secondary-color);"></i>
                            @else
                                <i class="bi bi-person-circle fs-3 text-secondary"></i>
                            @endif
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold me-2">
                                    {{ $k->user->username ?? 'Anonim' }}
                                    @if($k->user->role == 'admin') <small class="badge bg-primary">Admin</small> @endif
                                </span>
                                <span class="text-muted small">
                                    {{ \Carbon\Carbon::parse($k->tgl_komen)->diffForHumans() }}
                                </span>
                            </div>
                            {{-- Menggunakan class komentar yang sesuai (admin atau warga) --}}
                            <div class="card p-3 @if($k->user->role == 'admin') comment-card-admin @else comment-card @endif">
                                <p class="mb-0">{!! nl2br(e($k->isi_komen)) !!}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-secondary text-center py-4">
                        <i class="bi bi-chat-square-text me-2"></i> Belum ada komentar pada materi ini.
                    </div>
                @endforelse

            </div>

            <div class="col-lg-4">
                {{-- FORM KOMENTAR WARGA --}}
                <div class="card shadow-sm p-3 sticky-top" style="top: 80px;">
                    <h6 class="mb-3 fw-bold gradient-text">Tulis Komentar</h6>
                    <form action="{{ route('warga.komentar.kirim', $materi->id_materi) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <textarea name="isi_komen" class="form-control" rows="3"
                                placeholder="Tulis komentar sebagai '{{ auth()->user()->username ?? 'Warga' }}'"></textarea>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary btn-gradient w-100">
                                Kirim Komentar <i class="bi bi-send-fill ms-1"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div> {{-- End Row Komentar --}}

    </div> {{-- End Container --}}

@endsection
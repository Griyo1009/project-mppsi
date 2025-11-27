@extends('layouts.warga-layout')

@section('page-title', 'HomePage Warga')

@push('styles')
<style>
    /* ====== STYLES DARI KODE AWAL (BANNER) ====== */
    .background-atas {
        position: relative;
        background: url('{{ asset("images/login-bg.png") }}') center/cover no-repeat;
        height: 250px;
        overflow: hidden;
    }

    .tulisan-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        justify-content: center;
        align-items: flex-end;
        color: white;
        font-size: 1.5rem;
        padding-bottom: 30px;
    }

    /* ====== STYLES BARU (KONTEN) ====== */

    /* CARD GLOBAL (PENGUMUMAN & MATERI) */
    .card-custom {
        border-radius: 12px;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    /* HEADER GRADIENT (PENGUMUMAN) */
    /* Menggunakan gradient biru yang lebih halus ke kanan */
    .section-header-gradient {
        background: linear-gradient(to right, #162660, #2D4EC6);
        padding: 1rem 0;
        margin-top: -1px;
        /* Mengatasi celah visual */
    }

    /* MATERI CARD KHUSUS */
    .materi-card-custom {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    .materi-card-custom .btn {
        margin-top: auto;
    }

    /* Memastikan gradient-text tetap berfungsi untuk judul Materi */
    .gradient-text {
        background: linear-gradient(to bottom, #162660, #2D4EC6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

</style>
@endpush

@section('content')
{{-- BAGIAN 1: BANNER SELAMAT DATANG (STRUKTUR AWAL DIPERTAHANKAN) --}}
<div class="background-atas">
    <div class="tulisan-overlay ">
        Selamat Datang! Warga RT 07
    </div>
</div>


<div style="background:linear-gradient(#162660,#2D4EC6)">
    <h4 class="text-white py-3 fw-bold ms-5" style="margin-left:8rem;">Pengumuman Terbaru</h4>
</div>
<div class="container mt-4">

    <div class="container py-4">
        @if ($pengumuman)
        {{-- Card Pengumuman dengan Efek Hover --}}
        <a href="{{ route('warga.pengumuman') }}" class="text-decoration-none text-dark">
            <div class="card card-custom d-flex flex-row align-items-center p-3">

                {{-- Gambar Pengumuman --}}
                <div class="me-4 flex-shrink-0">
                    <img src="{{ asset('storage/' . $pengumuman->gambar) }}" alt="Pengumuman" class="img-fluid"
                        style="width:100px; height:100px; object-fit: cover; border-radius:8px; border: 1px solid #ddd;">
                </div>

                {{-- Judul dan Detail --}}
                <div class="flex-grow-1">
                    <h5 class="card-title fw-bold mb-1 gradient-text">{{ $pengumuman->judul }}</h5>
                    <div class="detail-info mb-4">
                        <p class="card-text text-muted mb-0">
                            <i class="bi bi-calendar-event-fill me-1"></i> Dilaksanakan:
                            <span class="fw-medium">{{ $pengumuman->tgl_pelaksanaan ?? 'Belum ditentukan' }}</span>
                        </p>
                        <p class="card-text text-muted mb-0">
                            <i class="bi bi-geo-alt-fill me-1"></i> Tempat:
                            <span class="fw-medium">{{ $pengumuman->lokasi ?? 'belum ditentukan' }}</span>
                        </p>
                    </div>
                    <p class="text-muted small mb-0">
                        <i class="bi bi-clock"></i> {{ $pengumuman->created_at->format('d F Y') }}
                    </p>
                </div>

                {{-- Tombol Lihat Detail (Tersembunyi di Mobile) --}}
                <div class="ms-auto d-none d-md-block">
                    <button class="btn btn-gradient-outline px-4">
                        See More <i class="bi bi-arrow-right"></i>
                    </button>
                </div>

            </div>
        </a>
        @else
        <div class="alert alert-info text-center" role="alert">
            <i class="bi bi-info-circle me-2"></i>Belum ada pengumuman terbaru saat ini.
        </div>
        @endif
    </div>

    {{-- Pemisah --}}
    <hr class="mb-4 mt-0 border-2 opacity-50 border-dark">

    {{-- BAGIAN 3: MATERI TERBARU (PERUBAHAN DITERAPKAN) --}}
    <div class="container px-2 pb-5">
        <h4 class="gradient-text my-3 text-center fw-bold">
            <i class="bi bi-journal-text me-2"></i>Materi Terbaru
        </h4>

        <div class="row justify-content-center g-4">
            @forelse ($materi as $m)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card card-custom materi-card-custom p-3 text-center">
                    <i class="bi bi-file-earmark-text-fill h1 gradient-text mb-2"></i>

                    {{-- Judul Materi --}}
                    <h6 class="card-title fw-medium mb-3 flex-grow-1 d-flex align-items-center justify-content-center">
                        {{ Str::limit($m->judul_materi, 30) }}
                    </h6>

                    {{-- Tombol Buka/Lihat --}}
                    <a href="{{ route('warga.lihat-materi', $m->id_materi) }}"
                        class="btn btn-gradient-outline btn-sm w-100 mt-2">
                        Buka <i class="bi bi-chevron-right"></i>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-secondary text-center" role="alert">
                    <i class="bi bi-archive me-2"></i>Belum ada materi yang dipublikasikan.
                </div>
            </div>
            @endforelse
        </div>
    </div>
    @endsection

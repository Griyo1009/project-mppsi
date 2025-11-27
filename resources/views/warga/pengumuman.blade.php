@extends('layouts.warga-layout')

@section('page-title', 'Pengumuman Warga')

@push('styles')
<style>
    .pengumuman-card {
        border-radius: 12px;
        border: 1px solid #ddd;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        cursor: pointer;
    }

    .pengumuman-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .card-image-wrapper {
        width: 150px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 15px;
    }

    @media (max-width: 767.98px) {
        .pengumuman-card {
            flex-direction: column !important;
        }

        .card-image-wrapper {
            width: 100%;
            height: 150px;
            padding: 10px 15px 0;
        }

        .card-image-wrapper img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            border-radius: 8px 8px 0 0 !important;
        }

        .card-content-body {
            padding-top: 1rem !important;
        }
    }

    .card-text-truncate {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .detail-info p {
        font-size: 0.875rem;
        line-height: 1.4;
    }

</style>
@endpush

@section('content')

@php
$pengumuman_terbaru = null;
$pengumuman_terdahulu = collect();

if (isset($pengumuman_all) && $pengumuman_all->isNotEmpty()) {
$pengumuman_terbaru = $pengumuman_all->first();
$pengumuman_terdahulu = $pengumuman_all->slice(1);
}
@endphp

<div class="container py-4">
    <h4 class="fw-bold mb-4 gradient-text">
        Pengumuman
    </h4>

    {{-- BAGIAN PENGUMUMAN TERBARU --}}
    <h5 class="fw-semibold mb-3 text-secondary border-bottom pb-1">
        Pengumuman Terbaru
    </h5>

    @if ($pengumumanTerbaru)
    <div class="pengumuman-card d-flex mb-4">
        {{-- Gambar --}}
        <div class="card-image-wrapper">
            <img src="{{ $pengumumanTerbaru->gambar ? asset('storage/' . $pengumumanTerbaru->gambar) : asset('images/warga.png') }}"
                alt="Pengumuman Terbaru" class="img-fluid"
                style="width:120px; height:120px; object-fit:cover; border-radius:8px;">
        </div>

        {{-- Konten --}}
        <div class="card-body py-3">
            <h5 class="card-title fw-bold gradient-text mb-2 px-sm-4">{{ $pengumumanTerbaru->judul }}</h5>

            {{-- MODIFIKASI: Menggunakan overflow-auto dan max-height inline --}}
            <div class="overflow-auto mb-3 px-sm-4" style="max-height: 120px;">
                <p class="card-text my-0">{!! nl2br(e($pengumumanTerbaru->isi)) !!}</p>
            </div>
            {{-- END MODIFIKASI --}}

            {{-- Detail menggunakan Ikon --}}
            <div class="detail-info px-sm-4">
                <p class="card-text text-muted mb-0">
                    <i class="bi bi-calendar-event-fill me-1"></i> Dilaksanakan:
                    <span class="fw-medium">{{ $pengumumanTerbaru->tgl_pelaksanaan ?? 'Belum ditentukan' }}</span>
                </p>
                <p class="card-text text-muted mb-0">
                    <i class="bi bi-geo-alt-fill me-1"></i> Tempat:
                    <span class="fw-medium">{{ $pengumumanTerbaru->lokasi ?? 'Belum ditentukan' }}</span>
                </p>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-info text-center" role="alert">
        <i class="bi bi-info-circle me-2"></i>Belum ada pengumuman terbaru saat ini.
    </div>
    @endif

    <hr class="my-4">

    {{-- BAGIAN PENGUMUMAN TERDAHULU --}}
    <h5 class="fw-semibold mb-3 text-secondary border-bottom pb-1">
        Pengumuman Terdahulu
    </h5>

    @if($pengumumanTerdahulu->isNotEmpty())
    @foreach($pengumumanTerdahulu as $p)
    <div class="pengumuman-card d-flex mb-3">
        {{-- Gambar --}}
        <div class="card-image-wrapper">
            {{-- Menggunakan gambar default jika $p->gambar kosong --}}
            <img src="{{ $p->gambar ? asset('storage/' . $p->gambar) : asset('images/warga.png') }}" alt="Pengumuman"
                class="img-fluid" style="width:120px; height:120px; object-fit:cover; border-radius:8px;">
        </div>

        {{-- Konten --}}
        <div class="card-body card-content-body py-3">
            <h5 class="card-title gradient-text fw-bold mb-2 mx-sm-4">{{ $p->judul }}</h5>
            <div class="overflow-auto mb-3 px-sm-4" style="max-height: 120px;">
                <p class="card-text my-0">{!! nl2br(e($p->isi)) !!}</p>
            </div>

            {{-- Detail menggunakan Ikon --}}
            <div class="detail-info mx-sm-4">
                <p class="card-text text-muted mb-0">
                    <i class="bi bi-calendar-event-fill me-1"></i> Dilaksanakan:
                    <span class="fw-medium">{{ $p->tgl_pelaksanaan ?? 'Belum ditentukan' }}</span>
                </p>
                <p class="card-text text-muted mb-0">
                    <i class="bi bi-geo-alt-fill me-1"></i> Tempat:
                    <span class="fw-medium">{{ $p->lokasi ?? 'Online / Daring' }}</span>
                </p>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="alert alert-secondary text-center" role="alert">
        <i class="bi bi-archive me-2"></i>Arsip pengumuman terdahulu masih kosong.
    </div>
    @endif

</div>

@endsection

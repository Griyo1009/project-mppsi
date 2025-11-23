@extends('layouts.warga-layout')

@section('page-title', 'HomePage Warga')

@push('styles')
    <style>
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

        .card {
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-4px);
        }
    </style>
@endpush

@section('content')
    <div class="background-atas">
        <div class="tulisan-overlay ">
            Selamat Datang! Warga RT 07
        </div>
    </div>

    <div style="background:linear-gradient(#162660,#2D4EC6)">
        <h4 class="text-white py-3 fw-bold ms-5" style="margin-left:8rem;">Pengumuman Terbaru</h4>
    </div>
    <div class="container mt-4">

        {{-- Pengumuman Terbaru, ambil 3 --}}
        @if ($pengumuman)

            <div class="card mb-1 d-flex flex-row align-items-center">
                <div class="px-3 py-3">
                    <img src="{{ asset('storage/' . $pengumuman->gambar) }}" alt="Pengumuman"
                        style="width:120px; height:120px; aspect-ratio:1/1; object-fit:contain; border-radius:8px;">
                </div>
                <div class="flex-grow-1 d-flex justify-content-center">
                    <h5 class="card-title fw-bold mb-0 text-center">{{ $pengumuman->judul }}</h5>
                </div>
            </div>

        @else
            <p class="text-center">Belum ada pengumuman.</p>
        @endif


    </div>

    <hr class="mb-0" style="height: 2px; background-color: #000000ff; border: none;">


    <div class="px-2">
        <h4 class="text-primary my-3 text-center">Materi Terbaru</h4>

        <div class="container">
            <div class="row justify-content-center g-3">
                @foreach ($materi as $m)
                    <div class="col-6 col-md-4 col-lg-2 d-flex justify-content-center">
                        <div class="card materi-card py-2 px-2 " style="width:175px;">
                            <h6 class="card-title text-center">{{ Str::limit($m->judul_materi, 20) }}</h6>
                            <a href="{{ route('warga.lihat-materi', $m->id_materi) }}" class="btn btn-primary btn-sm"
                                style="width: 125px;">Buka</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endsection
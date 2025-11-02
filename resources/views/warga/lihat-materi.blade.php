@extends('layouts.warga-layout')

@section('page-title', 'Lihat Materi Warga')


@section('content')

    <style>

    </style>

    <a href="{{ route('warga.materi') }}"
        class="d-inline-flex align-items-center fw-bold text-primary text-decoration-none py-2 ms-5 gap-2"
        style="margin-left:8rem;">
        <i class="bi bi-chevron-left fs-3"></i>
        <h4 class="mb-0">Kembali</h4>
    </a>
    <hr class="mt-0 mb-0" style="height: 2px; background-color: #000000ff; border: none;">





    <h4 class=" text-primary pt-3" style="margin-left:4rem;">Judul Materi</h4>
    <p class=" mb-3" style="margin-left:4rem;">00/00/00</p>


    <div style="background: linear-gradient(to bottom, #162660, #2D4EC6); border: 1px solid #000000;" class="py-3 px-4">
        <!-- ulang sesuai jumlah pengumuman -->
        <div class="card py-3 px-5" style="border: 1px solid #000000ff;">
            <p class="mb-3">Deskripsi</p>
            <p class="mb-3">1. Baca bener bener materinya <br>
                2. Materi rapat membahas bahaya judol
            </p>
            <!-- ulangi sesuai jumlah materi dan jenis nya -->
            <div class=" d-flex justify-content-between align-items-center ms-4 mb-2">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-file-earmark-pdf"></i>
                    <p class="card-text">kiyvisas</p>
                </div>

                <a href="{{ route('warga.lihat-materi') }}" class="btn btn-sm text-white"
                    style="background: linear-gradient(to bottom, #162660, #2D4EC6); border: 2px solid #162660; border-radius:8px; width: 100px;">
                    Unduh
                </a>
            </div>
            <div class=" d-flex justify-content-between align-items-center ms-4 mb-2">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-file-play"></i>
                    <p class="card-text">kiyvisas</p>
                </div>

                <a href="{{ route('warga.lihat-materi') }}" class="btn btn-sm text-white"
                    style="background: linear-gradient(to bottom, #162660, #2D4EC6); border: 2px solid #162660; border-radius:8px; width: 100px;">
                    Unduh
                </a>
            </div>
        </div>
    </div>

    <h4 class=" pt-2" style="margin-left:4rem;">Komentar</h4>
    <hr class="mt-0 mb-0" style="height: 2px; background-color: #000000ff; border: none;">
    <div class="text-center">Belum ada komentar</div>
    <!-- pr membuat buble chat -->

    <div class="card shadow-lg px-3 pt-1 mb-4">
        <div class="card-body">

            <!-- Card di dalam card -->
            <div class="card" style="background-color: #D1D4DB;">
                <div class="card-body">
                    <form action="" method="">
                        <div class="mb-2">
                            <input type="text" class="form-control" id="komentar" placeholder="Komentar sebagai 'username'">
                        </div>
                    </form>
                    <div class="text-end">
                        <button class="btn btn-primary btn-sm "
                            style="background: linear-gradient(to bottom, #162660, #2D4EC6); border: 2px solid #162660; border-radius:8px; width: 100px;">
                            Kirim
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>



@endsection
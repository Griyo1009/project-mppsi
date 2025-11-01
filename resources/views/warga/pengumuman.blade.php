@extends('layouts.navbar-warga')

@section('page-title', 'Pengumuman Warga')


@section('content')

    <style>

    </style>

    <h4 class=" py-3 fw-bold ms-5 text-primary" style="margin-left:8rem;">Pengumuman Terbaru</h4>

    <div class="card" style="width: 20rem;">
        <div class="card-body ">
            <h5 class="card-title">Judul Berita Utama</h5>
            <h6 class="card-subtitle mb-2 text-muted">Deskripsi</h6>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                dolore eu fugiat nulla pariatur. </p>
            <p class="text-end">waktu dan tanggal</p>
        </div>
    </div>


    <div class="container mt-4">

        {{-- Pengumuman Terbaru, ambil 3 --}}

        <div class="card mb-1 d-flex flex-row ">
            <div class="px-3 py-3">
                <img src="{{ asset('images/warga.png') }}" alt="Pengumuman"
                    style="width:120px; height:120px; aspect-ratio:1/1; object-fit:cover; border-radius:8px;">
            </div>
            <div class="card-body pt-4 mb-2">
                <h5 class="card-title  fw-bold my-3">Ngaji di Rumah Pak Ahmad
                </h5>
                <p class="card-text mb-0">Dilaksanakan pada : Sabtu, 18.00 WIB</p>
                <p class="card-text mb-0">Tempat : Rumah Pak Ahmad</p>
            </div>
        </div>


    </div>

    <hr class="mb-0">














    <div class="px-2">
        <h4 class="text-primary ms-2 mb-2">Materi Terbaru</h4>

        <div class="d-flex flex-nowrap overflow-auto gap-3" style="scroll-behavior:smooth;">

            <div class="card materi-card py-2 px-2" style="width:175px; flex: 0 0 auto;">
                <img src="{{ asset('images/warga.png') }}"
                    style="width:100%; aspect-ratio:1/1; object-fit:cover; border-radius:8px;" alt="Materi">
                <div class="card-body text-center">
                    <h6 class="card-title">Materi</h6>
                    <a href="#" class="btn btn-primary btn-sm" style="width: 125px;">Buka</a>
                </div>
            </div>



        </div>
    </div>





@endsection
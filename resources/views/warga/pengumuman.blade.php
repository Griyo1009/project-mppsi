@extends('layouts.warga-layout')

@section('page-title', 'Pengumuman Warga')


@section('content')

    <style>

    </style>

    <h4 class=" py-3 fw-bold ms-5 text-primary" style="margin-left:8rem;">Pengumuman Terbaru</h4>

    <div class="d-flex justify-content-end pe-4 py-4"
        style="background: url('{{ asset('images/warga.png') }}') center/cover no-repeat;">
        <div class="card " style="width: 50%; ">
            <div class="card-body ">
                <h5 class="card-title mb-3">Judul Berita Utama</h5>
                <h6 class="card-subtitle mb-3 text-muted">Deskripsi</h6>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt
                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                    dolore eu fugiat nulla pariatur. </p>
                <p class="text-end">waktu dan tanggal</p>
            </div>
        </div>
    </div>

    <div class="container mt-4">

        <h6>baru ditambahkan</h6>

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

@endsection
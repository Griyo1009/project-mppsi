@extends('layouts.warga-layout')

@section('page-title', 'Pengumuman Warga')


@section('content')

    <style>

    </style>

    <h4 class=" py-3 fw-bold ms-3 text-primary" style="margin-left:8rem;">Pengumuman</h4>
    <div class="mx-4">

        <h6>Baru Ditambahkan</h6>

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
        <h6>Terdahulu</h6>

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
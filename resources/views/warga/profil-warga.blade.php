@extends('layouts.warga-layout')

@section('page-title', 'Pengumuman Warga')

@section('content')

    <style>

    </style>

    <div class="d-flex justify-content-center align-items-center py-2 "
        style="background: linear-gradient(to bottom, #162660, #2D4EC6);">

        <div class="text-center">
            <div class="mb-2">
                <img src="{{ asset('images/warga.png') }}" alt="Foto Profil" class="rounded-circle shadow-sm"
                    style="width: 175px; height: 175px; object-fit: cover;">
            </div>

            <!-- Tombol ganti foto -->
            <div class="pt-2">

                <a href="{{ route('warga.edit-profil-warga') }}" class="btn btn-sm fw-semibold text-primary"
                    style="background-color: white; border: 2px solid white; border-radius:8px;">
                    Ganti Foto
                </a>

            </div>
        </div>
    </div>

    <h4 class=" pt-2 text-primary" style="margin-left:3rem;">Biodata Diri</h4>
    <div class="py-3" style="background: linear-gradient(to bottom, #162660, #2D4EC6);">

        <div style="background-color: #D1D4DB; border-radius: 5px;" class="mx-4 px-3">
            <p class="mb-1 pt-4 ms-4">Nama Lengkap</p>
            <!-- ulang sesuai jumlah pengumuman -->
            <div class="card py-3 px-4" style="border : 1px solid #000;">
                <div class=" d-flex justify-content-between align-items-center">
                    Nama Lengkap
                </div>
            </div>
            <p class="mb-1 pt-4 ms-4">NIK</p>
            <!-- ulang sesuai jumlah pengumuman -->
            <div class="card py-3 px-4" style="border : 1px solid #000;">
                <div class=" d-flex justify-content-between align-items-center">
                    NIK
                </div>
            </div>
            <p class="mb-1 pt-4 ms-4">No. Handphone</p>
            <!-- ulang sesuai jumlah pengumuman -->
            <div class="card py-3 px-4" style="border : 1px solid #000;">
                <div class=" d-flex justify-content-between align-items-center">
                    No. Handphone
                </div>
            </div>

            <!-- ulang sesuai jumlah pengumuman -->
            <div class=" py-4 ms-5 d-flex justify-content-center align-items-center">
                <a href="{{ route('warga.edit-profil-warga') }}" class="btn btn-sm text-white"
                    style="background: linear-gradient(to bottom, #162660, #2D4EC6); border-radius:8px; width: 300px; text-decoration: none;">
                    Edit
                </a>
            </div>
        </div>
    </div>









@endsection
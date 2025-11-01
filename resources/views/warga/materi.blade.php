@extends('layouts.warga-layout')

@section('page-title', 'Materi Warga')


@section('content')

    <style>

    </style>

    <h4 class=" py-3 fw-bold ms-5 text-primary" style="margin-left:8rem;">Materi</h4>

    <!-- repeat sesuai tanggal -->
    <hr class="mt-0 mb-0">
    <p class="pt-2 mb-2" style="margin-left:3rem;">00/00/00</p>

    <div style="background-color: #D1D4DB; border: 1px solid #000000ff;" class="py-3 px-4">
        <!-- ulang sesuai jumlah pengumuman -->
        <div class="card py-3 px-5" style="border: 1px solid #000000ff;">
            <div class=" d-flex justify-content-between align-items-center">
                <div>
                    <h5 class=" card-title mb-3">jc</h5>
                    <h6 class="card-subtitle mb-3">jgc</h6>
                    <p class="card-text">kiyvisas</p>
                </div>
                <div class=" d-flex flex-column flex-lg-row justify-content-between align-items-center gap-2">
                    <button type="button" class="btn btn-sm"
                        style="color: #162660; border: 2px solid #162660; border-radius:8px; width: 100px;">Lihat</button>
                    <button type="button" class="btn btn-sm text-white"
                        style="background: linear-gradient(to bottom, #162660, #2D4EC6); border: 2px solid #162660; border-radius:8px; width: 100px;">Unduh</button>
                </div>
            </div>
        </div>
    </div>
@endsection
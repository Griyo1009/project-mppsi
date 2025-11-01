@extends('layouts.warga-layout')

@section('page-title', 'HomePage Warga')


@section('content')

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
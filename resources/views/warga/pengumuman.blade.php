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
                <img src="{{ asset('storage/' . $pengumuman->gambar) }}" alt="Pengumuman"
                    style="width:120px; height:120px; aspect-ratio:1/1; object-fit:cover; border-radius:8px;">
            </div>
            <div class="card-body pt-4 mb-2">
                <h5 class="card-title  fw-bold">{{ $pengumuman->judul }}</h5>
                <p class="card-text mb-0">{{ $pengumuman->isi }}</p>
                <p class="card-text mb-0">Dilaksanakan pada : {{ $pengumuman->tgl_pelaksanaan ?? '-' }}</p>
                <p class="card-text mb-0">Tempat : {{ $pengumuman->lokasi ?? '-' }}</p>
            </div>
        </div>


        <h6>Terdahulu</h6>

        @if($pengumuman_all->isEmpty())
            <p class="text-center">Belum ada pengumuman.</p>
        @else
            @foreach($pengumuman_all as $p)
                <div class="card mb-1 d-flex flex-row">
                    <div class="px-3 py-3">
                        <img src="{{ $p->gambar ? asset('storage/' . $p->gambar) : asset('images/warga.png') }}" alt="Pengumuman"
                            style="width:120px; height:120px; aspect-ratio:1/1; object-fit:cover; border-radius:8px;">
                    </div>
                    <div class="card-body pt-4 mb-2">
                        <h5 class="card-title fw-bold">{{ $p->judul }}</h5>
                        <p class="card-text mb-0">{{ $p->isi }}</p>
                        <p class="card-text mb-0">Dilaksanakan pada : {{ $p->tgl_pelaksanaan ?? '-' }}</p>
                        <p class="card-text mb-0">Tempat : {{ $p->lokasi ?? '-' }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection
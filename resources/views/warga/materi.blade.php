@extends('layouts.warga-layout')

@section('page-title', 'Materi Warga')

@section('content')

    <h4 class=" py-3 fw-bold ms-5 text-primary" style="margin-left:8rem;">Materi</h4>

    @php
        // Grup berdasarkan tanggal
        $materi_by_date = $materi->groupBy(function ($item) {
            return \Carbon\Carbon::parse($item->created_at)->format('d/m/Y');
        });
    @endphp

    @foreach ($materi_by_date as $tanggal => $list)

        <hr class="mt-0 mb-0" style="height: 2px; background-color:#000; border:none;">
        <p class="pt-2 mb-2" style="margin-left:3rem;">{{ $tanggal }}</p>

        <div style="background-color:#D1D4DB; border:1px solid #000;" class="py-3 px-4">

            @foreach ($list as $m)
                <div class="card py-3 px-5 mb-3" style="border:1px solid #000;">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <h5 class="card-title mt-1">{{ $m->judul_materi }}</h5>
                        </div>

                        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center gap-2">
                            <a href="{{ route('warga.lihat-materi', $m->id_materi) }}" class="btn btn-sm"
                                style="color:#162660; border:2px solid #162660; border-radius:8px; width:100px; text-decoration:none;">
                                Lihat
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

    @endforeach

@endsection
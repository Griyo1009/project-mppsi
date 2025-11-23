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





    <h4 class=" text-primary pt-3" style="margin-left:4rem;">{{ $materi->judul_materi }}</h4>
    <p class=" mb-3" style="margin-left:4rem;">{{ \Carbon\Carbon::parse($materi->tgl_up)->format('d/m/Y') }}</p>


    <div style="background: linear-gradient(to bottom, #162660, #2D4EC6); border: 1px solid #000000;" class="py-3 px-4">
        <!-- ulang sesuai jumlah pengumuman -->
        <div class="card py-3 px-5" style="border: 1px solid #000000ff;">
            <p class="mb-3">Deskripsi</p>
            <p class="mb-3">{{ $materi->deskripsi }}</p>
            <!-- ulangi sesuai jumlah materi dan jenis nya -->
            @foreach ($materi->files as $file)
                <div class=" d-flex justify-content-between align-items-center ms-4 mb-2">
                    <div class="d-flex align-items-center gap-2">
                        @if ($file->file_path)
                            <i class="bi bi-file-earmark-pdf"></i>
                            <p class="card-text">{{ $file->nama_alias ?? 'Materi.Pdi' }}
                            </p>
                        @endif
                        @if ($file->link_url)
                            <i class="bi bi-file-play"></i>
                            <p class="card-text">{{ $file->nama_alias ?? 'Materi.Video' }}</p>
                        @endif

                    </div>

                    @if ($file->file_path)
                        <a href="{{ asset('storage/' . $file->file_path) }}" class="btn btn-sm text-white" download
                            style="background: linear-gradient(to bottom, #162660, #2D4EC6); border: 2px solid #162660; border-radius:8px; width: 100px;">
                            Unduh
                        </a>
                    @endif

                    @if ($file->link_url)
                        <a href="{{ $file->link_url }}" target="_blank" class="btn btn-sm text-white"
                            style="background: linear-gradient(to bottom, #162660, #2D4EC6); border: 2px solid #162660; border-radius:8px; width: 100px;">
                            Buka
                        </a>
                    @endif
                </div>
            @endforeach


        </div>
    </div>

    <h4 class=" pt-2" style="margin-left:4rem;">Komentar</h4>
    <hr class="mt-0 mb-0" style="height: 2px; background-color: #000000ff; border: none;">
    @if ($materi->komentar->count() == 0)
        <div class="text-center py-5">Belum ada komentar</div>
    @else
        @foreach ($materi->komentar as $k)
            <div class="pt-1">
                <div class="pt-1 ms-4">
                    Komentar dari {{ $k->user->username ?? 'Warga' }}
                    <span class="text-muted" style="font-size: 12px;">
                        ({{ \Carbon\Carbon::parse($k->tgl_komen)->format('d/m/Y') }})
                    </span>
                </div>

                <div class="card mb-1 ms-2">
                    <p class="ms-3  mt-3">{{ $k->isi_komen }}</p>
                </div>
            </div>
        @endforeach
    @endif


    <div class="card shadow-lg px-3 pt-1 mb-4">
        <div class="card-body">

            <!-- Card di dalam card -->
            <div class="card" style="background-color: #D1D4DB;">
                <div class="card-body">
                    <form action="{{ route('warga.komentar.kirim', $materi->id_materi) }}" method="POST">
                        @csrf

                        <div class="mb-2">
                            <input type="text" name="isi_komen" class="form-control"
                                placeholder="Komentar sebagai '{{ auth()->user()->username ?? 'Warga' }}'">
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary btn-sm"
                                style="background: linear-gradient(to bottom, #162660, #2D4EC6); border:2px solid #162660; border-radius:8px; width:100px;">
                                Kirim
                            </button>
                        </div>
                    </form>



                </div>
            </div>

        </div>
    </div>



@endsection
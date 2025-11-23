@extends('layouts.admin-layout')

@section('page-title', 'Lihat Materi RT')

@section('content')

    <div class="container py-4">

        {{-- Tombol Kembali --}}
        <a href="{{ route('admin.materi') }}"
            class="d-inline-flex align-items-center fw-bold text-primary text-decoration-none py-2 gap-2 mb-3">
            <i class="bi bi-chevron-left fs-3"></i>
            <span class="fs-5">Kembali</span>
        </a>

        {{-- Judul & Tanggal --}}
        <h4 class="text-primary">{{ $materi->judul_materi }}</h4>
        <p class="text-muted">{{ \Carbon\Carbon::parse($materi->tgl_up)->format('d/m/Y') }}</p>

        {{-- Deskripsi --}}
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5>Deskripsi</h5>
                <p>{{ $materi->deskripsi }}</p>

                {{-- Files --}}
                @if($materi->files->count())
                    <h6>File / Media</h6>
                    @foreach ($materi->files as $file)
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center gap-2">
                                @if ($file->file_path)
                                    <i class="bi bi-file-earmark-pdf"></i>
                                    <span>{{ $file->nama_alias ?? 'Materi.pdf' }}</span>
                                @elseif ($file->link_url)
                                    <i class="bi bi-file-play"></i>
                                    <span>{{ $file->nama_alias ?? 'Materi Video' }}</span>
                                @endif
                            </div>
                            <div>
                                @if ($file->file_path)
                                    <a href="{{ asset('storage/' . $file->file_path) }}" class="btn btn-sm btn-primary" download>
                                        Unduh
                                    </a>
                                @endif
                                @if ($file->link_url)
                                    <a href="{{ $file->link_url }}" target="_blank" class="btn btn-sm btn-success">
                                        Buka
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        {{-- Komentar --}}
        <h5>Komentar</h5>
        <hr>
        @if($materi->komentar->isEmpty())
            <div class="text-center py-3 text-muted">Belum ada komentar</div>
        @else
            @foreach($materi->komentar as $k)
                <div class="mb-2">
                    <strong>{{ $k->user->username ?? 'RT' }}</strong>
                    <small class="text-muted">({{ \Carbon\Carbon::parse($k->tgl_komen)->format('d/m/Y') }})</small>
                    <div class="card mt-1">
                        <div class="card-body py-2">
                            {{ $k->isi_komen }}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        {{-- Form Tambah Komentar --}}
        <div class="card shadow-sm mt-3">
            <div class="card-body">
                <form action="{{ route('admin.komentar.kirim', $materi->id_materi) }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <input type="text" name="isi_komen" class="form-control"
                            placeholder="Komentar sebagai '{{ auth()->user()->username ?? 'RT' }}'">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
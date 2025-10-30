@extends('layouts.admin-layout')

@section('title', 'Dashboard Admin RT 07')

@push('styles')
<style>
  /* HEADER */
  .header-bg {
    background: url('{{ asset('images/login-bg.png') }}') center/cover no-repeat;
    height: 230px;
    position: relative
  }

  .header-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.45);
  }

  
</style>
@endpush

@section('content')
  <!-- HEADER -->
  <div class="header-bg d-flex align-items-center justify-content-center text-white">
    <div class="header-overlay"></div>
    <div class="position-relative">
      <h4 class="fw-semibold text-white text-shadow">Selamat Datang! Admin RT 07</h4>
    </div>
  </div>

  <!-- DATA STATISTIK -->
  <div class="bg-white shadow mt-n5 overflow-hidden position-relative w-100" style="border-radius: 0;">
    <!-- Judul Section -->
    <div class="text-white fw-bold px-4 py-2"
         style="background: linear-gradient(to bottom, #162660, #2D4EC6);">
      DATA STATISTIK
    </div>

    <!-- Isi Statistik -->
    <div class="row text-center p-4 mx-0">
      <!-- Warga Aktif -->
      <div class="col-md-6 border-end border-dark d-flex flex-column justify-content-between">
        <div class="text-start">
          <small class="text-muted">Warga Aktif</small>
        </div>
        <div class="text-center">
          <h3 class="fw-bold mb-0">10 Warga <i class="bi bi-people-fill"></i></h3>
        </div>
      </div>

      <!-- Materi -->
      <div class="col-md-6 d-flex flex-column justify-content-between">
        <div class="text-start">
          <small class="text-muted">Materi Yang Sudah Diupload</small>
        </div>
        <div class="text-center">
          <h3 class="fw-bold mb-0">10 Materi <i class="bi bi-journal-bookmark-fill"></i></h3>
        </div>
      </div>
    </div>
    <hr>

    <!-- Komentar Section -->
    <div class="px-4 pb-4">
      <p class="mb-2 text-muted text-start">Komentar (8)</p>
      <a href="#" class="btn btn-outline-dark text-start fst-italic w-100">Lihat Komentar Terbaru <i class="bi bi-chevron-right"></i></a>
    </div>
  </div>

  <!-- AKSES CEPAT -->
  <div class="container my-5">
    <h6 class="fw-bold mb-4 text-uppercase text-muted">Akses Cepat</h6>
    <div class="row g-4 justify-content-center">
      <div class="col-md-3">
        <div class="card shadow-sm border-0 h-100 text-center">
          <img src="{{ asset('images/pengumuman.png') }}" class="card-img-top" alt="Pengumuman">
          <div class="card-body">
            <h6 class="fw-semibold">Pengumuman</h6>
            <a href="#" class="btn btn-gradient-outline mt-2 px-4"><span>Tambah</span></a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card shadow-sm border-0 h-100 text-center">
          <img src="{{ asset('images/materi.png') }}" class="card-img-top" alt="Materi">
          <div class="card-body">
            <h6 class="fw-semibold">Materi</h6>
            <a href="#" class="btn btn-gradient-outline mt-2 px-4"><span>Tambah</span></a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card shadow-sm border-0 h-100 text-center">
          <img src="{{ asset('images/warga.png') }}" class="card-img-top" alt="Warga">
          <div class="card-body">
            <h6 class="fw-semibold">Warga</h6>
            <a href="#" class="btn btn-gradient-outline mt-2 px-4"><span>Kelola</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

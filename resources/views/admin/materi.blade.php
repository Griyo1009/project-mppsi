@extends('layouts.admin-layout')

@section('title', 'Tambah Materi | Dashboard Admin RT 07')

@push('styles')
<style>
  body {
    background-color: #f5f6fa;
    font-family: 'Roboto', sans-serif;
  }

  .btn-danger {
    background: linear-gradient(to bottom, #dc3545, #a71d2a);
    border-color: #dc3545;
    width: 100px;
  }

  .btn-danger:hover {
    background: linear-gradient(to bottom, #a71d2a, #dc3545);
    border-color: #a71d2a;
  }

  .btn-warning {
    background: linear-gradient(to bottom, #162660, #2D4EC6);
    border-color: #162660;
    width: 100px;
  }

  .form-materi {
    display: none;
    background: #f1f3f6;
    border-radius: 10px;
    margin-top: 15px;
    padding: 20px;
    animation: fadeIn 0.6s ease;
  }

  .form-materi.show {
    display: block;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(-5px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .materi-card {
    position: relative;
    border: none;
    border-radius: 12px;
    padding: 15px;
    background: #fff;
    transition: 0.3s ease;
  }

  .materi-card::before {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 12px;
    padding: 2px;
    background: linear-gradient(to bottom, #162660, #2D4EC6);
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
  }

  .materi-card:hover {
    box-shadow: 0 4px 12px rgba(45, 78, 198, 0.2);
  }
</style>
@endpush

@section('content')
<div class="bg-white shadow mt-n5 overflow-hidden position-relative w-100" style="border-radius: 0;">
  <div class="p-3">
    <div class="fw-bold fs-6 ms-2" style="color: #162660;">MATERI</div>
  </div>

  <div class="pb-1 pt-4 mb-4" style="background: linear-gradient(to bottom, #162660, #2D4EC6);">
    <div class="bg-white shadow-sm rounded mx-4 p-3 mb-4">
      <div class="d-flex justify-content-between align-items-center flex-wrap">
        <p class="fw-normal mb-2 mb-sm-0">Materi Baru</p>
        <button id="toggleFormBtn" class="btn btn-gradient-outline">
          Tambah <i class="bi bi-plus-circle ms-2"></i>
        </button>
      </div>

      <!-- ===== FORM TAMBAH MATERI ===== -->
      <form id="formMateri" action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data"
        class="p-3 border rounded bg-light mt-3 d-none">
        @csrf

        <div class="mb-3">
          <label for="file" class="form-label fw-semibold">Unggah File Materi</label>
          <input type="file" name="file" id="file" class="form-control" accept=".pdf,.doc,.docx,.ppt,.pptx" required>
        </div>

        <div class="mb-3">
          <label for="judul" class="form-label fw-semibold">Judul Materi</label>
          <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul materi" required>
        </div>

        <div class="mb-5">
          <label for="tanggal" class="form-label fw-semibold">Tanggal</label>
          <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ date('Y-m-d') }}" readonly>
        </div>

        <div class="d-flex justify-content-center gap-3">
          <button type="button" id="cancelForm" class="btn btn-secondary" style="width: 200px;">Batal</button>
          <button type="submit" class="btn btn-warning text-white" style="width: 200px;">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ===== LIST MATERI BARU ===== -->
<div class="container my-5">
  <h6 class="fw-bold mb-4 text-uppercase text-muted">Baru Ditambahkan</h6>

  @forelse($materi as $item)
  <div class="materi-card d-flex flex-wrap align-items-start justify-content-between">
    <div class="flex-grow-1">
      <h5 class="fw-bold mb-1">{{ $item->judul }}</h5>
      <p class="mb-1 text-muted">Jenis File: {{ pathinfo($item->file, PATHINFO_EXTENSION) }}</p>
      <small class="text-muted">{{ $item->tanggal }}</small>
    </div>

    <div class="d-flex align-items-center gap-2 mt-3 mt-md-0 align-self-center">
      <form action="{{ route('materi.destroy', $item->id_materi) }}" method="POST" class="m-0">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm">Hapus</button>
      </form>

      <a href="{{ route('materi.edit', $item->id_materi) }}" class="btn btn-warning text-white px-4 btn-sm">Edit</a>
    </div>
  </div>
  @empty
  <div class="materi-card">
    <p class="text-muted m-0">Belum ada materi yang ditambahkan.</p>
  </div>
  @endforelse
</div>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('toggleFormBtn');
    const form = document.getElementById('formMateri');
    const cancelBtn = document.getElementById('cancelForm');

    if (!toggleBtn || !form || !cancelBtn) return;

    toggleBtn.addEventListener('click', () => {
      form.classList.toggle('d-none');
      toggleBtn.innerHTML = form.classList.contains('d-none')
        ? 'Tambah <i class="bi bi-plus-circle ms-2"></i>'
        : 'Tutup <i class="bi bi-chevron-up ms-2"></i>';
    });

    cancelBtn.addEventListener('click', () => {
      form.classList.add('d-none');
      toggleBtn.innerHTML = 'Tambah <i class="bi bi-plus-circle ms-2"></i>';
      form.reset();
    });
  });
</script>
@endpush

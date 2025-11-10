@extends('layouts.admin-layout')

@section('title', 'Dashboard Admin RT 07')

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
</style>
@endpush

@section('content')
<div class="container-fluid p-0 mb-5">
  <!-- ===== HEADER ===== -->
<div class="p-3">
  <div class="fw-bold fs-6 ms-2" style="color: #162660;">PENGUMUMAN</div>
</div>

  <div class=" pb-1 pt-4 mb-4" style="background: linear-gradient(to bottom, #162660, #2D4EC6);">
    <div class="bg-white shadow-sm rounded mx-4 p-3 mb-4">
      <div class="d-flex justify-content-between align-items-center flex-wrap">
        <p class="fw-normal mb-2 mb-sm-0">Pengumuman Baru</p>
        <button id="toggleFormBtn" class="btn btn-gradient-outline">
          Tambah <i class="bi bi-plus-circle ms-2"></i>
        </button>
      </div>
  
      <!-- ===== FORM TAMBAH ===== -->
    
      <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data" class="p-3 border rounded bg-light">
        @csrf

        <div class="mb-3">
          <label for="gambar" class="form-label fw-semibold">Unggah Gambar</label>
          <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
          <label for="judul" class="form-label fw-semibold">Judul</label>
          <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul pengumuman" required>
        </div>

        <div class="mb-3">
          <label for="isi" class="form-label fw-semibold">Isi</label>
          <textarea name="isi" id="isi" class="form-control" rows="4" placeholder="Tulis isi pengumuman..." required></textarea>
        </div>

        <div class="mb-5">
          <label for="tgl_pengumuman" class="form-label fw-semibold">Tanggal</label>
          <input type="date" name="tgl_pengumuman" id="tgl_pengumuman" class="form-control" value="{{ date('Y-m-d') }}" readonly>
        </div>

        <div class="d-flex justify-content-center gap-3">
          <button type="button" id="cancelForm" class="btn btn-secondary" style="width: 200px;">Batal</button>
          <button type="submit" class="btn btn-warning text-white" style="width: 200px;">Tambah</button>
        </div>
      </form>
    </div>
  </div>

  <!-- ===== LIST PENGUMUMAN ===== -->
  <div class="mt-5 mx-4">
    <h6 class="fw-bold mb-3 text-muted text-uppercase">Baru Ditambahkan</h6>

    @foreach($pengumuman as $item)
      <div class="card mb-3 shadow-sm">
        <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
          <div class="d-flex flex-column flex-md-row align-items-start gap-3 w-100">
            <img src="{{ asset('images/bahlil.jpg') }}"
            {{-- {{ asset('storage/'.$item->gambar) }} --}}
              alt="Gambar Pengumuman" class="rounded" style="width:200px; height:150px; object-fit:cover;">
            <div class="flex-grow-1 ">
              <h5 class="fw-bold mb-4">{{ $item->judul }}</h5>
              <p class="mb-4">{{ Str::limit($item->isi, 100) }}</p>
              <small class="text-muted">Tanggal: {{ $item->tgl_pengumuman }}</small>
            </div>
          </div>
          <div class="d-flex gap-2 align-self-md-center">
            <form 
              action="{{-- {{ route('pengumuman.destroy', $item->id_pengumuman) }} --}}" 
              method="POST" class="m-0">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
            <a href="{{-- {{ route('pengumuman.edit', $item->id_pengumuman) }} --}}" class="btn btn-warning text-white px-4 btn-sm">Edit</a>
          </div>
        </div>
      </div>
    @endforeach
    @foreach($pengumuman as $item)
      <div class="card mb-3 shadow-sm">
        <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
          <div class="d-flex flex-column flex-md-row align-items-start gap-3 w-100">
            <img src="{{ asset('images/bahlil.jpg') }}"
            {{-- {{ asset('storage/'.$item->gambar) }} --}}
              alt="Gambar Pengumuman" class="rounded" style="width:200px; height:150px; object-fit:cover;">
            <div class="flex-grow-1 ">
              <h5 class="fw-bold mb-4">{{ $item->judul }}</h5>
              <p class="mb-4">{{ Str::limit($item->isi, 100) }}</p>
              <small class="text-muted">Tanggal: {{ $item->tgl_pengumuman }}</small>
            </div>
          </div>
          <div class="d-flex gap-2 align-self-md-center">
            <form 
              action="{{-- {{ route('pengumuman.destroy', $item->id_pengumuman) }} --}}" 
              method="POST" class="m-0">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger px-4  btn-sm">Hapus</button>
            </form>
            <a href="{{-- {{ route('pengumuman.edit', $item->id_pengumuman) }} --}}" class="btn btn-warning text-white px-4 btn-sm">Edit</a>
          </div>
        </div>
      </div>
    @endforeach
    @foreach($pengumuman as $item)
      <div class="card mb-3 shadow-sm">
        <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
          <div class="d-flex flex-column flex-md-row align-items-start gap-3 w-100">
            <img src="{{ asset('images/bahlil.jpg') }}"
            {{-- {{ asset('storage/'.$item->gambar) }} --}}
              alt="Gambar Pengumuman" class="rounded" style="width:200px; height:150px; object-fit:cover;">
            <div class="flex-grow-1 ">
              <h5 class="fw-bold mb-4">{{ $item->judul }}</h5>
              <p class="mb-4">{{ Str::limit($item->isi, 100) }}</p>
              <small class="text-muted">Tanggal: {{ $item->tgl_pengumuman }}</small>
            </div>
          </div>
          <div class="d-flex gap-2 align-self-md-center">
            <form 
              action="{{-- {{ route('pengumuman.destroy', $item->id_pengumuman) }} --}}" 
              method="POST" class="m-0">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger px-4  btn-sm">Hapus</button>
            </form>
            <a href="{{-- {{ route('pengumuman.edit', $item->id_pengumuman) }} --}}" class="btn btn-warning text-white px-4 btn-sm">Edit</a>
          </div>
        </div>
      </div>
    @endforeach
    @foreach($pengumuman as $item)
      <div class="card mb-3 shadow-sm">
        <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
          <div class="d-flex flex-column flex-md-row align-items-start gap-3 w-100">
            <img src="{{ asset('images/bahlil.jpg') }}"
            {{-- {{ asset('storage/'.$item->gambar) }} --}}
              alt="Gambar Pengumuman" class="rounded" style="width:200px; height:150px; object-fit:cover;">
            <div class="flex-grow-1 ">
              <h5 class="fw-bold mb-4">{{ $item->judul }}</h5>
              <p class="mb-4">{{ Str::limit($item->isi, 100) }}</p>
              <small class="text-muted">Tanggal: {{ $item->tgl_pengumuman }}</small>
            </div>
          </div>
          <div class="d-flex gap-2 align-self-md-center">
            <form 
              action="{{-- {{ route('pengumuman.destroy', $item->id_pengumuman) }} --}}" 
              method="POST" class="m-0">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger px-4  btn-sm">Hapus</button>
            </form>
            <a href="{{-- {{ route('pengumuman.edit', $item->id_pengumuman) }} --}}" class="btn btn-warning text-white px-4 btn-sm">Edit</a>
          </div>
        </div>
      </div>
    @endforeach
  
  </div>
</div>
@endsection

@push('scripts')
<script>
  const toggleBtn = document.getElementById('toggleFormBtn');
  const form = document.getElementById('formPengumuman');
  const cancelBtn = document.getElementById('cancelForm');

  toggleBtn.addEventListener('click', () => {
    form.classList.toggle('d-none');
    toggleBtn.innerHTML = form.classList.contains('d-none')
      ? 'Tambah <i class="bi bi-plus-circle ms-2"></i>'
      : 'Tutup Form <i class="bi bi-chevron-up ms-2"></i>';
  });

  cancelBtn.addEventListener('click', () => {
    form.classList.add('d-none');
    toggleBtn.innerHTML = 'Tambah <i class="bi bi-plus-circle ms-2"></i>';
  });
</script>
@endpush

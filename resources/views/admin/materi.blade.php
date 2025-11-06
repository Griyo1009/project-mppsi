@extends('layouts.admin-layout')

@section('title', 'Tambah Materi | Dashboard Admin RT 07')

@push('styles')
<style>
    .btn-gradient-outline {
        border: 1.5px solid #2D4EC6;
        color: #2D4EC6;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-gradient-outline:hover {
        background: linear-gradient(to bottom, #162660, #2D4EC6);
        color: #fff;
    }

    .btn-primary-custom {
        background: linear-gradient(to bottom, #162660, #2D4EC6);
        border: none;
        color: #fff;
    }

    .btn-primary-custom:hover {
        background: linear-gradient(to top, #162660, #2D4EC6);
    }

    .btn-cancel {
        background-color: #6c757d;
        border: none;
        color: #fff;
    }

    .btn-cancel:hover {
        background-color: #5c636a;
    }

    .btn-edit {
        background: #2D4EC6;
        border: none;
        color: #fff;
        padding: 6px 16px;
        border-radius: 6px;
    }

    .btn-edit:hover {
        background: #162660;
    }

    .btn-delete {
        background: #dc3545;
        border: none;
        color: #fff;
        padding: 6px 16px;
        border-radius: 6px;
    }

    .btn-delete:hover {
        background: #bb2d3b;
    }

    /* ===== FORM TAMBAH MATERI ===== */
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

    .form-materi label {
        font-weight: 600;
        color: #333;
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
        -webkit-mask:
            linear-gradient(#fff 0 0) content-box,
            linear-gradient(#fff 0 0);
        mask:
            linear-gradient(#fff 0 0) content-box,
            linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
    }

    .materi-card:hover {
        box-shadow: 0 4px 12px rgba(45, 78, 198, 0.2);
    }

</style>
@endpush

@section('content')
<!-- ===== HEADER SECTION ===== -->
<div class="bg-white shadow mt-n5 overflow-hidden position-relative w-100" style="border-radius: 0;">
    <div class="px-4 py-2 bg-transparent">
        <p class="fw-bold gradient-text mb-0 fs-4">MATERI</p>
    </div>

    <div style="background: linear-gradient(to bottom, #162660, #2D4EC6);">
        <div class="container py-3">
            <div class="card bg-white shadow-sm border-0">
                <div class="card-body d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="fw-semibold mb-0">Materi Baru</h6>

                    <button id="toggleFormBtn" class="btn btn-gradient-outline mt-2 mt-sm-0">
                        <span>Tambah <i class="bi bi-plus-circle ms-2"></i></span>
                    </button>
                </div>

                <!-- ===== FORM TAMBAH MATERI ===== -->
                <div id="formMateri" class="form-materi">
                    <form action="" {{-- "{{ route('materi.store') }}" --}} method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="file" class="form-label">Unggah Materi</label>
                            <input type="file" name="file" id="file" class="form-control"
                                accept=".pdf,.doc,.docx,.ppt,.pptx" required>
                        </div>

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control"
                                placeholder="Masukkan judul materi" required>
                        </div>

                        <div class="mb-3">
                            <label for="isi" class="form-label">Deskripsi</label>
                            <textarea name="isi" id="isi" class="form-control" rows="3"
                                placeholder="Tuliskan deskripsi singkat materi..." required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                value="{{ date('Y-m-d') }}" readonly>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" id="cancelForm" class="btn btn-cancel">Batal</button>
                            <button type="submit" class="btn btn-primary-custom">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== LIST MATERI BARU ===== -->
<div class="container my-5">
    <h6 class="fw-bold mb-4 text-uppercase text-muted">Baru Ditambahkan</h6>

    <div class="d-flex flex-column gap-3">
        <div class="materi-card d-flex flex-wrap align-items-start justify-content-between">
            <div class="flex-grow-1">
                <h5 class="fw-bold mb-1">Panduan Keamanan Lingkungan</h5>
                <p class="mb-1 text-muted">Jenis File: PDF</p>
                <small class="text-muted">01 November 2025</small>
            </div>
            <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
                <button class="btn btn-delete">Hapus</button>
                <button class="btn btn-edit">Edit</button>
            </div>
        </div>
        <div class="materi-card d-flex flex-wrap align-items-start justify-content-between">
            <div class="flex-grow-1">
                <h5 class="fw-bold mb-1">Panduan Keamanan Lingkungan</h5>
                <p class="mb-1 text-muted">Jenis File: PDF</p>
                <small class="text-muted">01 November 2025</small>
            </div>
            <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
                <button class="btn btn-delete">Hapus</button>
                <button class="btn btn-edit">Edit</button>
            </div>
        </div>
        <div class="materi-card d-flex flex-wrap align-items-start justify-content-between">
            <div class="flex-grow-1">
                <h5 class="fw-bold mb-1">Panduan Keamanan Lingkungan</h5>
                <p class="mb-1 text-muted">Jenis File: PDF</p>
                <small class="text-muted">01 November 2025</small>
            </div>
            <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
                <button class="btn btn-delete">Hapus</button>
                <button class="btn btn-edit">Edit</button>
            </div>
        </div>
        <div class="materi-card d-flex flex-wrap align-items-start justify-content-between">
            <div class="flex-grow-1">
                <h5 class="fw-bold mb-1">Panduan Keamanan Lingkungan</h5>
                <p class="mb-1 text-muted">Jenis File: PDF</p>
                <small class="text-muted">01 November 2025</small>
            </div>
            <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
                <button class="btn btn-delete">Hapus</button>
                <button class="btn btn-edit">Edit</button>
            </div>
        </div>
        <div class="materi-card d-flex flex-wrap align-items-start justify-content-between">
            <div class="flex-grow-1">
                <h5 class="fw-bold mb-1">Panduan Keamanan Lingkungan</h5>
                <p class="mb-1 text-muted">Jenis File: PDF</p>
                <small class="text-muted">01 November 2025</small>
            </div>
            <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
                <button class="btn btn-delete">Hapus</button>
                <button class="btn btn-edit">Edit</button>
            </div>
        </div>
        <div class="materi-card d-flex flex-wrap align-items-start justify-content-between">
            <div class="flex-grow-1">
                <h5 class="fw-bold mb-1">Panduan Keamanan Lingkungan</h5>
                <p class="mb-1 text-muted">Jenis File: PDF</p>
                <small class="text-muted">01 November 2025</small>
            </div>
            <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
                <button class="btn btn-delete">Hapus</button>
                <button class="btn btn-edit">Edit</button>
            </div>
        </div>
        <div class="materi-card d-flex flex-wrap align-items-start justify-content-between">
            <div class="flex-grow-1">
                <h5 class="fw-bold mb-1">Panduan Keamanan Lingkungan</h5>
                <p class="mb-1 text-muted">Jenis File: PDF</p>
                <small class="text-muted">01 November 2025</small>
            </div>
            <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
                <button class="btn btn-delete">Hapus</button>
                <button class="btn btn-edit">Edit</button>
            </div>
        </div>
        <div class="materi-card d-flex flex-wrap align-items-start justify-content-between">
            <div class="flex-grow-1">
                <h5 class="fw-bold mb-1">Panduan Keamanan Lingkungan</h5>
                <p class="mb-1 text-muted">Jenis File: PDF</p>
                <small class="text-muted">01 November 2025</small>
            </div>
            <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
                <button class="btn btn-delete">Hapus</button>
                <button class="btn btn-edit">Edit</button>
            </div>
        </div>
        <div class="materi-card d-flex flex-wrap align-items-start justify-content-between">
            <div class="flex-grow-1">
                <h5 class="fw-bold mb-1">Panduan Keamanan Lingkungan</h5>
                <p class="mb-1 text-muted">Jenis File: PDF</p>
                <small class="text-muted">01 November 2025</small>
            </div>
            <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
                <button class="btn btn-delete">Hapus</button>
                <button class="btn btn-edit">Edit</button>
            </div>
        </div>
        <div class="materi-card d-flex flex-wrap align-items-start justify-content-between">
            <div class="flex-grow-1">
                <h5 class="fw-bold mb-1">Panduan Keamanan Lingkungan</h5>
                <p class="mb-1 text-muted">Jenis File: PDF</p>
                <small class="text-muted">01 November 2025</small>
            </div>
            <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
                <button class="btn btn-delete">Hapus</button>
                <button class="btn btn-edit">Edit</button>
            </div>
        </div>
        <div class="materi-card d-flex flex-wrap align-items-start justify-content-between">
            <div class="flex-grow-1">
                <h5 class="fw-bold mb-1">Panduan Keamanan Lingkungan</h5>
                <p class="mb-1 text-muted">Jenis File: PDF</p>
                <small class="text-muted">01 November 2025</small>
            </div>
            <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
                <button class="btn btn-delete">Hapus</button>
                <button class="btn btn-edit">Edit</button>
            </div>
        </div>
        {{-- @foreach($materi as $item)
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
            <button class="btn btn-delete">Hapus</button>
        </form>

        <a href="{{ route('materi.edit', $item->id_materi) }}" class="btn btn-edit">Edit</a>
    </div>
</div>
@endforeach --}}
</div>
</div>
@endsection

@push('scripts')
<script>
    const toggleBtn = document.getElementById('toggleFormBtn');
    const form = document.getElementById('formMateri');
    const cancelBtn = document.getElementById('cancelForm');

    toggleBtn.addEventListener('click', () => {
        form.classList.toggle('show');
        toggleBtn.innerHTML = form.classList.contains('show') ?
            '<span>Tutup <i class="bi bi-chevron-up ms-2"></i></span>' :
            '<span>Tambah <i class="bi bi-plus-circle ms-2"></i></span>';
    });

    cancelBtn.addEventListener('click', () => {
        form.classList.remove('show');
        toggleBtn.innerHTML = '<span>Tambah <i class="bi bi-plus-circle ms-2"></i></span>';
    });

</script>
@endpush

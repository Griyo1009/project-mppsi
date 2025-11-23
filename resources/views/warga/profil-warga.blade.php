@extends('layouts.warga-layout')

@section('page-title', 'User Profile')

@section('content')

    @php
        $user = Auth::user(); // Ambil user yang sedang login
      @endphp
    <div class="mx-auto pt-5 pb-3" style="background: linear-gradient(to bottom, #162660, #2D4EC6);">

        <!-- FOTO PROFIL -->
        <div class="text-center mb-2">
            <img src="{{ asset('storage/profiles/' . $user->foto_profil) }}" alt="Profile Photo" class="rounded-circle mb-3"
                style="width: 200px; height: 200px; object-fit: cover;">
            <div>
                <button class="btn btn-light btn-sm">Unggah Foto</button>
            </div>
        </div>

    </div>

    <!-- BIODATA DIRI -->
    <div class="card-header gradient-text fw-semibold ps-5 py-2 mx-0 bg-white ">
        BIODATA DIRI
    </div>

    <div class="mx-auto p-5" style="background: linear-gradient(to bottom, #162660, #2D4EC6);">
        <div class="card border-0 shadow my-3">
            <form action="{{ route('warga.update-profil') }}" method="POST" enctype="multipart/form-data"
                class="p-3 border rounded bg-light">

                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->nama_lengkap }}"
                        readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="{{ $user->NIK }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                </div>

                <div class="text-center mt-4" id="btn-group">
                    <button type="button" class="btn btn-secondary px-4 text-white" id="btnEdit">Edit</button>

                    <div id="editActions" style="display: none;">
                        <button type="button" class="btn btn-secondary px-4 me-2" id="btnCancel">Batal</button>
                        <button type="submit" class="btn btn-gradient-outline px-4"><span>Simpan</span></button>

                    </div>
                </div>

            </form>
        </div>
    </div>

    <!-- Script interaksi -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const editBtn = document.getElementById("btnEdit");
            const cancelBtn = document.getElementById("btnCancel");
            const editActions = document.getElementById("editActions");
            const inputs = document.querySelectorAll("#nama, #nik, #email");

            editBtn.addEventListener("click", () => {
                inputs.forEach(el => el.readOnly = false);
                editBtn.classList.add("d-none");
                editActions.classList.remove("d-none");
            });

            cancelBtn.addEventListener("click", () => {
                inputs.forEach(el => el.readOnly = true);
                editActions.classList.add("d-none");
                editBtn.classList.remove("d-none");
            });
        });
    </script>
@endsection
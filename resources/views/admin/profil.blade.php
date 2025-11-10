@extends('layouts.admin-layout')

@section('title', 'Profil | Dashboard Admin RT 07')

@section('content')
<div class="mx-auto pt-5 pb-3" style="background: linear-gradient(to bottom, #162660, #2D4EC6);">

  <!-- FOTO PROFIL -->
  <div class="text-center mb-2">
    <img src="{{ asset('/images/bahlil.jpg') }}" alt="Profile Photo" class="rounded-circle mb-3"
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
    <form action="" method="" enctype="multipart/form-data" class="p-3 border rounded bg-light">

      <div class="mb-3">
        <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" value="Username 001" disabled>
      </div>
      <div class="mb-3">
        <label for="nik" class="form-label fw-semibold">NIK</label>
        <input type="text" class="form-control" id="nik" placeholder="NIK" value="0012345678" disabled>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label fw-semibold">Alamat</label>
        <textarea class="form-control" id="alamat" rows="2" placeholder="Alamat" disabled>Jl. Melati No. 7, RT 07</textarea>
      </div>

      <!-- Tombol -->
      <div class="text-center mt-4" id="btn-group">
        <button type="button" class="btn btn-warning px-4 text-white" id="btnEdit">Edit</button>

        <div id="editActions" class="d-none">
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
    const inputs = document.querySelectorAll("#nama, #nik, #alamat");

    editBtn.addEventListener("click", () => {
      inputs.forEach(el => el.disabled = false);
      editBtn.classList.add("d-none");
      editActions.classList.remove("d-none");
    });

    cancelBtn.addEventListener("click", () => {
      inputs.forEach(el => el.disabled = true);
      editActions.classList.add("d-none");
      editBtn.classList.remove("d-none");
    });
  });
</script>
@endsection

@extends('layouts.warga-layout')

@section('page-title', 'Pengumuman Warga')

@section('content')

    <style>

    </style>

    <div class="d-flex justify-content-center align-items-center py-2"
        style="background: linear-gradient(to bottom, #162660, #2D4EC6);">

        <div class="text-center">
            <div class="mb-2">
                <img src="{{ asset('images/warga.png') }}" alt="Foto Profil" class="rounded-circle shadow-sm"
                    style="width: 175px; height: 175px; object-fit: cover;">
            </div>

            <!-- Tombol ganti foto -->
            <div class="pt-2">
                <form action="" method="">
                    @csrf
                    <input type="file" name="foto" id="fotoinput" class="d-none" accept="image/*">
                    <label for="fotoinput" class="btn btn-sm fw-semibold text-primary"
                        style="background-color : white; border-radius: 4px; cursor: pointer;">Upload Foto</label>
                </form>

            </div>
        </div>
    </div>

    <h4 class=" pt-2 text-primary" style="margin-left:3rem;">Biodata Diri</h4>
    <div class="py-3" style="background: linear-gradient(to bottom, #162660, #2D4EC6);">

        <div style="background-color: #D1D4DB; border-radius: 5px; padding-bottom: 20px;" class="mx-4 px-3">

            <form action="" method="" enctype="multipart/form-data">
                @csrf
                <p class="mb-1 pt-4 ms-4">Nama Lengkap</p>
                <div class="card py-1 px-4" style="border : 1px solid #000;">
                    <input type="text" name="nama"
                        class="form-control d-flex justify-content-between align-items-center border-0 px-0"
                        placeholder="Masukkan nama lengkap" value="">
                </div>
                <p class="mb-1 pt-4 ms-4">NIK</p>
                <div class="card py-1 px-4" style="border : 1px solid #000;">
                    <input type="text" name="nik"
                        class="form-control d-flex justify-content-between align-items-center border-0 px-0"
                        placeholder="Masukkan NIK" value="">
                </div>
                <p class="mb-1 pt-4 ms-4">No. Handphone</p>
                <div class="card py-1 px-4" style="border : 1px solid #000;">
                    <input type="text" name="no.handphone"
                        class="form-control d-flex justify-content-between align-items-center border-0 px-0"
                        placeholder="No. Handphone" value="">
                </div>

                <div class="pt-5 d-flex justify-content-center align-items-center gap-4">
                    <button type="button" class="text-white"
                        style="background-color: #6B7380; border-radius:4px; border: 0px; width: 150px;"
                        onclick="window.location.reload();">
                        Batal
                    </button>

                    <button type="submit" class="text-white"
                        style="background: linear-gradient(to bottom, #162660, #2D4EC6); border-radius:4px; border: 0px; width: 150px;">
                        Simpan
                    </button>
                    <!-- nanti di bekend di buat supaya ketika menyimpan langsung di arahin ke profil warga -->
                </div>
            </form>
        </div>
    </div>
@endsection
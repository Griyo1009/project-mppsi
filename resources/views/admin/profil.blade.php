@extends('layouts.admin-layout')

@section('title', 'Profil | Dashboard Admin RT 07')

@section('content')

@php
    $user = Auth::user();
    $defaultImagePath = asset('images/profile-default.jpg'); // Path default image
    
    // Cek apakah file foto profil ada di storage, jika tidak pakai default
    $storagePath = 'profiles/' . $user->foto_profil;
    $profileImagePath = ($user->foto_profil && Storage::disk('public')->exists($storagePath)) 
                        ? asset('storage/' . $storagePath) 
                        : $defaultImagePath;
@endphp
<div class="mx-auto pt-5 pb-3" style="background: linear-gradient(to bottom, #162660, #2D4EC6);">

    {{-- Form Pengunggahan Foto Profil --}}
    <form action="{{ route('admin.profile.update.photo') }}" method="POST" enctype="multipart/form-data" id="photo-upload-form">
        @csrf
        @method('PUT') {{-- Method spoofing untuk update --}}
        <div class="text-center mb-2">
            <img src="{{ $profileImagePath }}" alt="Profile Photo" class="rounded-circle mb-3"
                style="width: 200px; height: 200px; object-fit: cover;" id="profile-image-preview">
            <div>
                {{-- Label dan input file disembunyikan --}}
                <label for="foto_profil" class="btn btn-light btn-sm">
                    Unggah Foto
                </label>
                <input type="file" name="foto_profil" id="foto_profil" class="d-none" accept="image/*">
                
                {{-- Tombol Simpan Foto hanya muncul setelah file dipilih --}}
                <button type="submit" class="btn btn-success btn-sm d-none" id="savePhotoBtn">Simpan Foto</button>
            </div>
        </div>
    </form>

</div>

<div class="card-header gradient-text fw-semibold ps-5 py-2 mx-0 bg-white ">
    BIODATA DIRI
</div>

<div class="mx-auto p-5" style="background: linear-gradient(to bottom, #162660, #2D4EC6);">
    <div class="card border-0 shadow my-3">
        {{-- Form Update Biodata --}}
        <form action="{{ route('admin.profile.update') }}" method="POST" class="p-3 border rounded bg-light" id="biodata-form">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label fw-semibold">Nama Lengkap</label>
                <input type="text" class="form-control editable-field" name="nama_lengkap" id="nama_lengkap" 
                       value="{{ old('nama_lengkap', $user->nama_lengkap) }}" readonly>
                @error('nama_lengkap')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            
            <div class="mb-3">
                <label for="nik" class="form-label fw-semibold">NIK</label>
                {{-- NIK selalu readonly --}}
                <input type="text" class="form-control" id="nik" 
                       value="{{ old('NIK', $user->NIK) }}" readonly>
                @error('NIK')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" class="form-control editable-field" name="email" id="email" 
                       value="{{ old('email', $user->email) }}" readonly>
                @error('email')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="text-center mt-4" id="btn-group">
                <button type="button" class="btn btn-warning px-4 text-white" id="btnEdit">Edit</button>

                <div id="editActions" class="d-none">
                    <button type="button" class="btn btn-secondary px-4 me-2" id="btnCancel">Batal</button>
                    {{-- Tombol Simpan akan submit form biodata-form --}}
                    <button type="submit" class="btn btn-gradient-outline px-4"><span>Simpan</span></button>
                </div>
            </div>

        </form>
    </div>
</div>

{{-- Memanggil file JavaScript yang sudah dikoreksi --}}
<script src="{{ asset('js/profil.js') }}"></script>
@endsection
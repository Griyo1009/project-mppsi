@extends('layouts.auth-layout')

@section('content')
    <div style="overflow-y: auto; max-height: 80vh;">

        <h4 class="mb-3 fw-bold text-primary">Daftar Akun</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form method="POST" action="{{ route('register.admin.post') }}">
            @csrf

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" value="{{ old('nik') }}"
                    required>
                <label for="nik">NIK</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap"
                    value="{{ old('nama_lengkap') }}" required>
                <label for="nama_lengkap">Nama Lengkap</label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                    value="{{ old('email') }}" required>
                <label for="email">Email</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                    value="{{ old('username') }}" required>
                <label for="username">Username</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>

            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    placeholder="Ulangi Password" required>
                <label for="password_confirmation">Ulangi Password</label>
            </div>

            <div class="form-floating mb-4">
                <select class="form-select" id="role" name="role" required>
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="0" {{ old('role') == '0' ? 'selected' : '' }}>Warga</option>
                    <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Admin</option>
                </select>
                <label for="role">Role</label>
            </div>

            <button type="submit" class="btn btn-gradient-outline w-100 mb-2">Daftar</button>
            <a href="{{ route('admin.warga') }}" class="btn btn-gradient-outline w-100">
                Kembali
            </a>
        </form>


    </div>

@endsection
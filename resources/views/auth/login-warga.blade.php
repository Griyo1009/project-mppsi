@extends('layouts.auth-layout')

@section('title', 'Login Warga RT 07')

@section('content')
    <h5 class="mb-4 fw-bold gradient-text">Login Warga RT 07</h5>
    
    <form action="{{ route('login.warga.post') }}" method="POST">
      @csrf
      <div class="form-floating mb-3">
        <input type="" class="form-control" id="nik" name="nik" placeholder="NIK" required>
        <label for="nik">NIK</label>
      </div>

      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan kata sandi">
        <label for="password">Kata Sandi</label>
      </div>

      <button type="submit" class="btn btn-gradient-outline w-100 mt-2"><span>Masuk</span></button>

      <div class="text-center mt-3">
        <small>Belum punya akun? <a href="/register
            {{-- {{ route('register.warga') }} --}}
             " class="fw-semibold gradient-text">Daftar</a></small>
      </div>
    </form>
@endsection

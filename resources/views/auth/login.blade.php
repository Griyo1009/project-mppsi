@extends('layouts.auth-layout')

@section('title', 'Login Warga RT 07')

@section('content')
  <h5 class="mb-4 fw-bold gradient-text">Login</h5>

  <form action="{{ route('warga.homepage') }}" method="">
    @csrf
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
      <label for="username">Username</label>
    </div>

    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi">
      <label for="password">Kata Sandi</label>
    </div>

    <button type="submit" class="btn btn-gradient-outline w-100 mt-2"><span>Masuk</span></button>

    <div class="text-center mt-3">
      <small>
        Belum punya akun? 
        <a href="{{ route('register') }}" class="fw-semibold gradient-text">Daftar</a>
      </small>
    </div>
  </form>
@endsection

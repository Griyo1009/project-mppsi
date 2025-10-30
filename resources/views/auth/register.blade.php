@extends('layouts.auth-layout')

@section('content')
  <h4 class="mb-3 fw-bold">Daftar Akun</h4>
  <form method="POST" action="
  {{-- {{ route('register.post') }} --}}
   ">
    @csrf
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
      <label for="name">Nama Lengkap</label>
    </div>
    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
      <label for="email">Email</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      <label for="password">Password</label>
    </div>
    <button type="submit" class="btn btn-gradient-outline w-100"><span>Daftar</span></button>
  </form>
  <div class="mt-3">
    <small>Sudah punya akun? <a href="{{ route('login') }}" class="gradient-text fw-semibold text-decoration-underline">Masuk</a></small>
  </div>
@endsection

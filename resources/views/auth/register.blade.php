@extends('layouts.auth-layout')

@section('content')
  <h4 class="mb-3 fw-bold">Daftar Akun</h4>
  <form method="POST" action="
                {{-- {{ route('register.post') }} --}}
                 ">
    @csrf
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required>
      <label for="nik">NIK</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
      <label for="name">Nama Lengkap</label>
    </div>
    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
      <label for="email">Email</label>
    </div>
    <div class="form-floating mb-3">
      <input type="username" class="form-control" id="username" name="username" placeholder="username" required>
      <label for="username">Username</label>
    </div>
    <!-- ikon mata nya belum -->
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      <label for="password">Password</label>
    </div>
    <div class="form-floating mb-4">
      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
        placeholder="Ulangi Password" required>
      <label for="password_confirmation">Ulangi Password</label>
    </div>

    <!-- role -->


    <button type="submit" class="btn btn-gradient-outline w-100"><span>Daftar</span></button>
  </form>
  <button class="btn btn-gradient-outline w-100"><span>Kembali</span></button>
@endsection
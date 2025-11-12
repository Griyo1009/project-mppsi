@extends('layouts.auth-layout')

@section('content')
  <h4 class="mb-3 fw-bold text-primary">Daftar Akun</h4>

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('register.post') }}">
    @csrf
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required>
      <label for="nik">NIK</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" required>
      <label for="nama_lengkap">Nama Lengkap <i>(max 50 karakter)</i></label>
    </div>
    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
      <label for="email">Email</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
      <label for="username">Username <i>(min 5 karakter)</i></label>
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
    <button type="submit" class="btn btn-gradient-outline w-100 mb-2"><span>Daftar</span></button>
  </form>
@endsection

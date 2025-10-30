@extends('layouts.auth-layout')

@section('title', 'Login Admin / RT 07')

@section('content')
  <h5 class="mb-4 fw-bold gradient-text">Login Admin / RT 07</h5>

  <form action="{{ route('login.admin.post') }}" method="POST">
    @csrf
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="username" name="username" placeholder="Username atau Email" required>
      <label for="username">Username / Email</label>
    </div>

    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan kata sandi">
      <label for="password">Kata Sandi</label>
    </div>

    <button type="submit" class="btn btn-gradient-outline w-100 mt-2">
      <span>Masuk</span>
    </button>

    <div class="text-center mt-3">
      <small>Lupa kata sandi? 
        <a href="/forgot-password" class="fw-semibold gradient-text">Klik di sini</a>
      </small>
    </div>
  </form>
@endsection

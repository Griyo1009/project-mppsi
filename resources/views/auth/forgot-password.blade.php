@extends('layouts.auth-layout')

@section('content')
  <h4 class="mb-3 fw-bold">Lupa Password</h4>
  <p class="text-muted">Masukkan email untuk reset password</p>
  <form method="POST" action="">
    @csrf
    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
      <label for="email">Email</label>
    </div>
    <button type="submit" class="btn btn-gradient-outline w-100"><span>Kirim Link Reset</span></button>
  </form>
  
@endsection

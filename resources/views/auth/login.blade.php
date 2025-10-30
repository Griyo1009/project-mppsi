@extends('layouts.auth-layout')

@section('content')
  <h4 class="mb-4 fw-bold gradient-text">Sign In</h4>
  <p class="text-muted">Masuk sebagai</p>

  <div class="d-grid gap-3">
    <a href="/login/warga"
      class="btn btn-gradient-outline">
      <span>Warga</span>
    </a>
    <a href="/login/admin"
      class="btn btn-gradient-outline">
      <span>Pengurus RT</span>
    </a>
  </div>

  <div class="mt-4 mb-5"></div>
@endsection

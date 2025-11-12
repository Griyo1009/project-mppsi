@extends('layouts.auth-layout')

@section('title', 'Login Warga RT 07')

@section('content')
  <h5 class="mb-4 fw-bold gradient-text">Login</h5>

  <form action="{{ route('login.post') }}" method="POST">
    @csrf
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
      <label for="username">Username</label>
    </div>

    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi" required>
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

@push('scripts')
  <!-- 🧃 SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    @if (session('swal_success'))
      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('swal_success') }}',
        confirmButtonColor: '#3085d6',
      });
    @endif

    @if (session('swal_error'))
      Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: '{{ session('swal_error') }}',
        confirmButtonColor: '#d33',
      });
    @endif

    @if (session('swal_warning'))
      Swal.fire({
        icon: 'warning',
        title: 'Perhatian!',
        text: '{{ session('swal_warning') }}',
        confirmButtonColor: '#f6c23e',
      });
    @endif
  </script>
@endpush
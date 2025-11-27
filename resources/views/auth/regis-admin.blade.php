@extends('layouts.auth-layout')

@section('content')
    <div>
        <div>
            {{-- Bagian ini mungkin untuk logo atau gambar --}}
        </div>
        <h4 class="mb-3 fw-bold gradient-text">Daftar Akun</h4>

        {{-- Blok Error PHP standar Dihilangkan karena menggunakan SweetAlert2 --}}

        <form method="POST" action="{{ route('register.admin.post') }}">
            @csrf
            <div style="overflow-y: auto; max-height: 70vh;">
                
                {{-- 1. NIK --}}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" placeholder="NIK" value="{{ old('nik') }}"
                        required>
                    <label for="nik">NIK</label>
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                {{-- 2. Nama Lengkap --}}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap"
                        value="{{ old('nama_lengkap') }}" required>
                    <label for="nama_lengkap">Nama Lengkap</label>
                    @error('nama_lengkap')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                {{-- 3. Email --}}
                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email"
                        value="{{ old('email') }}" required>
                    <label for="email">Email</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                {{-- 4. Username --}}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username"
                        value="{{ old('username') }}" required>
                    <label for="username">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                {{-- 5. Password --}}
                <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                {{-- 6. Ulangi Password (validasi menggunakan 'password') --}}
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Ulangi Password" required>
                    <label for="password_confirmation">Ulangi Password</label>
                    {{-- Pesan error konfirmasi password biasanya terikat pada field 'password' --}}
                </div>
    
                {{-- 7. Role --}}
                <div class="form-floating mb-4">
                    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                        <option value="" disabled selected>Pilih Role</option>
                        <option value="0" {{ old('role') == '0' ? 'selected' : '' }}>Warga</option>
                        <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Admin</option>
                    </select>
                    <label for="role">Role</label>
                    @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            
            <div class="d-flex justify-content-between gap-3">
                <button type="submit" class="btn btn-gradient-outline w-50">Daftar</button>
                <a href="{{ route('admin.warga') }}" class="btn btn-gradient-outline w-50">
                    Kembali
                </a>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    @if ($errors->any())
    <script>
        // Mengumpulkan semua pesan error untuk SweetAlert2
        let errorMessages = '';
        @foreach ($errors->all() as $error)
            errorMessages += '<li>{{ $error }}</li>';
        @endforeach

        Swal.fire({
            icon: 'error',
            title: 'Gagal Mendaftar!',
            html: 'Mohon periksa kembali isian Anda:<ul class="text-start mt-2">' + errorMessages + '</ul>',
            confirmButtonText: 'Oke',
            customClass: {
                htmlContainer: 'text-start'
            }
        });
    </script>
    @endif
@endpush
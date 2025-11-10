@extends('layouts.warga-layout')

@section('page-title', 'User Profile')

@section('content')

    <style>
        .responsive-card {
            width: 50vw;
            /* ukuran default untuk mobile */
        }

        @media (min-width: 768px) {

            /* layar medium ke atas */
            .responsive-card {
                width: 68vw;
            }
        }

        @media (min-width: 1200px) {

            /* layar besar ke atas */
            .responsive-card {
                width: 80vw;
            }
        }
    </style>

    <div class="d-flex justify-content-between align-items-center py-1 "
        style="background: linear-gradient(to bottom, #162660, #2D4EC6);">
        <div>





            <!-- Card di tengah -->
            <div class="" style="margin-left: 4rem;">
                <!-- Foto profil -->
                <div class="text-center">
                    <div class="mb-2">
                        <img src="{{ asset('images/warga.png') }}" alt="Foto Profil" class="rounded-circle shadow-sm"
                            style="width: 120px; height: 120px; object-fit: cover;">
                    </div>

                    <!-- Tombol ganti foto -->
                    <div class="pt-2">
                        <button class="btn btn-sm fw-semibold text-primary"
                            style="background-color: white; border: 2px solid white; border-radius:8px;">
                            Ganti Foto
                        </button>
                    </div>
                </div>

            </div>






        </div>
        <div class="card me-4 responsive-card">
            <h4 class="mb-3">Nama Lengkap</h4>
            <p>Jabatan : Warga</p>
            <p>Alamat : Jln. Raya No.666</p>
            <p>NIK : 012345678</p>
            <p>Email : Warga@gmail.com</p>
        </div>
    </div>








@endsection
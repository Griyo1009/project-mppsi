<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning RT 07</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark gradient-nav">
        <div class="container d-flex justify-content-between align-items-center">
            <img style="width: 35px; height: 60.71px;" src="{{ asset('images/logo.png') }}" alt="ERT07" class="me-2">
            <div class="d-flex gap-2">
                <a href="/login" class="btn btn-light btn-sm fw-semibold px-4">Login</a>
                <a href="/register" class="btn btn-outline-light btn-sm fw-semibold px-4">Register</a>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="hero-section d-flex align-items-center position-relative">
        <div class="position-absolute"
            <img src="{{ asset('images/blue-circle.png') }}" alt="Background Circle" style="opacity: 0.8;">
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 text-black">
                    <h1 class="fw-bold display-6 mb-5">Selamat Datang di<br>
                        E-Learning RT 07<br>
                        Beliung Alam Barajo</h1>
                    <p class="lead ">
                        Sistem E-Learning RT 07 adalah platform pembelajaran <br> berbasis web yang dirancang 
                        untuk mendukung warga <br>dalam mengakses berbagai materi edukatif dan informasi <br> kegiatan secara online.
                    </p>
                </div>

                <!-- Blue Circle di belakang -->
                <div class="blue-circle">
                    <img src="{{ asset('images/blue-circle.png') }}" alt="Background Circle">
                </div>

                <!-- Hero Image -->
                <div class="col-md-5 text-center">
                    <img src="{{ asset('images/hero.png') }}" class="img-fluid hero-img" alt="Hero Illustration">
                </div>
            </div>
        </div>
    </section>

    <!-- TUJUAN DAN MANFAAT -->
    <section class="benefit-section text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="overflow-hidden">
                        <img src="{{ asset('images/kegiatan.png') }}" class="card-img-top" alt="Kegiatan Warga">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="fw-bold mb-3">Tujuan dan Manfaat</h3>
                    <p class="fw-semibold">
                        ERT07 hadir untuk mempermudah proses pembelajaran dan komunikasi antarwarga melalui satu wadah digital terpadu.
                    </p>
                    <p class="fw-semibold">
                        Seluruh warga dapat mengakses materi pelatihan, panduan kegiatan, serta informasi penting secara terstruktur dan efisien.
                    </p>
                    <p class="fw-semibold">
                        Ketua RT juga dapat menyampaikan pengumuman, membagikan materi, dan memantau partisipasi warga.
                        Semua ini agar kegiatan belajar di lingkungan RT menjadi lebih interaktif, inklusif, dan menyenangkan.
                    </p>
                </div>
            </div>
        </div>
    </section>

   <!-- FOOTER -->
    <footer class="footer-section">
        <div class="footer-wave ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <defs>
                    <linearGradient id="grad" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="#2D4EC6" />
                        <stop offset="100%" stop-color="#162660" />
                    </linearGradient>
                </defs>
                <path fill="url(#grad)" d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
            </svg>
            
        </div>
        <div class="footer-content container d-flex justify-content-between align-items-end">
            <div class="footer-text text-white">
                <p class="mb-1">Ketua RT 07 Antonius</p>
                <p class="mb-1">Hubungi nomor ini jika butuh bantuan: 0812345678</p>
                <p class="mb-0 fw-semibold text-warning">- MPPSI Kelompok 7 -</p>
            </div>

            <div class="footer-logo">
                <img src="{{ asset('images/logo.png') }}" alt="ERT07 Logo">
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

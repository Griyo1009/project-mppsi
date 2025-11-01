<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Ubuntu', sans-serif;
        }

        .gradient-text {
            background: linear-gradient(to bottom, #162660, #2D4EC6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Navbar */
        .navbar-custom {
            background: linear-gradient(to bottom, #162660, #2D4EC6);
        }

        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand,
        .navbar-custom .dropdown-toggle {
            color: #fff !important;
            font-weight: 500;
        }

        .navbar-custom .nav-link:hover {
            opacity: 0.85;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Navbar active underline menggunakan Bootstrap */
        /* ====== NAVBAR BASE ====== */
        .navbar-custom {
            position: relative;
            border-bottom: 4px solid transparent;
        }

        .navbar-custom .nav-link {
            position: relative;
            color: #fff !important;
            font-weight: 500;
            padding-bottom: .5rem;
            transition: all 0.3s ease;
        }

        /* ====== GARIS AKTIF & HOVER ====== */
        .navbar-custom .nav-link.active::after,
        .navbar-custom .nav-link:hover::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -15px;
            /* atur biar sejajar bottom navbar */
            width: 100%;
            height: 4px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        /* Warna garis aktif */
        .navbar-custom .nav-link.active::after {
            background-color: #D0E6FD;
        }

        /* Warna garis hover */
        .navbar-custom .nav-link:hover::after {
            background-color: rgba(255, 255, 255, 0.4);
            height: 2px;
        }

        /* ====== EXCLUDE DROPDOWN USERNAME ====== */
        /* Hilangkan efek hover & active untuk dropdown username */
        .navbar-custom .nav-item.dropdown .nav-link::after {
            content: none !important;
        }

        .navbar-custom .nav-item.dropdown .nav-link:hover {
            opacity: 1 !important;
        }

        .navbar-custom .nav-item.dropdown .nav-link.active {
            color: #fff !important;
        }

        /* Tombol Logout */
        .btn-logout {
            background: #fff;
            color: #2D4EC6;
            border-radius: 50px;
            font-weight: 500;
            padding: 6px 14px;
            transition: 0.3s ease;
        }

        .btn-logout:hover {
            background: #2D4EC6;
            color: #fff;
        }

        /* Tombol Outline Gradient */
        .btn-gradient-outline {
            display: inline-block;
            font-weight: 600;
            border: 2px solid transparent;
            border-radius: 12px;
            background-image:
                linear-gradient(white, white),
                linear-gradient(to bottom, #162660, #2D4EC6);
            background-origin: padding-box, border-box;
            background-clip: padding-box, border-box;
            color: #162660;
            transition: all 0.3s ease;
        }

        .btn-gradient-outline span {
            background: linear-gradient(to bottom, #162660, #2D4EC6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: all 0.3s ease;
        }

        .btn-gradient-outline:hover {
            background-image:
                linear-gradient(to bottom, #162660, #2D4EC6),
                linear-gradient(to bottom, #162660, #2D4EC6);
            transform: translateY(-2px);
        }

        .btn-gradient-outline:hover span {
            -webkit-text-fill-color: #fff;
        }

        .btn-gradient-outline:active {
            transform: translateY(0);
            opacity: 0.9;
        }

        /* Footer */
        footer {
            background: #D0E6FD;
            font-size: 0.9rem;
        }

        /* Footer Wave */
        .footer-wave {
            position: relative;
            overflow: hidden;
            background-color: #D0E6FD;
        }

        .shapedividers_com-1655 {
            position: relative;
            overflow: hidden;
        }

        .shapedividers_com-1655::before {
            content: '';
            position: absolute;
            z-index: 3;
            pointer-events: none;
            background-repeat: no-repeat;
            bottom: -0.1vw;
            left: -0.1vw;
            right: -0.1vw;
            top: -0.1vw;
            background-size: 163% 54px;
            background-position: 50% 0%;
            transform: rotateY(180deg);
            background-image: url("data:image/svg+xml;charset=utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 35.28 2.17' preserveAspectRatio='none'><path d='M0 1c3.17.8 7.29-.38 10.04-.55 2.75-.17 9.25 1.47 12.67 1.3 3.43-.17 4.65-.84 7.05-.87 2.4-.02 5.52.88 5.52.88V0H0z' fill='%23f8f9fa'/></svg>");
        }

        @media (min-width: 2100px) {
            .shapedividers_com-1655::before {
                background-size: 163% calc(2vw + 54px);
            }
        }

        html::-webkit-scrollbar,
        body::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, Opera */
        }
    </style>

    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img style="width: 20px" src="{{ asset('images/logo.png') }}" alt="ERT07" height="35" class="me-2">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon text-white"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    <li class="nav-item ">
                        <a class="nav-link {{--{{ Request::is('/') ? 'active' : '' }}--}} active"
                            href="{{ route('warga.homepage') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{-- {{ Request::is('pengumuman') ? 'active' : '' }} --}} "
                            href="{{ route('warga.pengumuman') }}">Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('materi') ? 'active' : '' }}" href="">Materi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('warga') ? 'active' : '' }}" href="/admin/warga">Warga</a>
                    </li>

                    {{-- Dropdown Profil --}}
                    <li class="nav-item dropdown ms-3 ps-3 border-start border-white">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                            role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i> Username <i class="bi bi-caret-down-fill ps-2"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#">Profil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="#" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>Log Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- MAIN CONTENT -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="footer-wave shapedividers_com-1655 text-dark py-5 ">
        <div class="container d-flex justify-content-between align-items-end">
            <div>
                <p class="mb-1 fw-medium">Ketua RT 07 Antonius</p>
                <p class="mb-1">Hubungi nomor ini jika butuh bantuan: 0812345678</p>
                <p class="mb-0 fw-semibold">- MPPSI Kelompok 7 -</p>
            </div>
            <div>
                <img src="{{ asset('images/logo.png') }}" alt="ERT07 Logo" width="60" height="auto">
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
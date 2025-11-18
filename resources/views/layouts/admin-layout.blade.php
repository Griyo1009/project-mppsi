<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard Admin RT 07')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">


    <!-- Custom Styles -->
    <style>
        /* ====== BASE ====== */
        body {
            background-color: #f8f9fa;
            font-family: 'Ubuntu', sans-serif;
        }

        .gradient-text {
            background: linear-gradient(to bottom, #162660, #2D4EC6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* ====== NAVBAR ====== */
        .navbar-custom {
            position: relative;
            background: linear-gradient(to bottom, #162660, #2D4EC6);
            padding: 0;
        }

        .navbar-custom .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.6);
        }

        .navbar-custom .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link,
        .navbar-custom .dropdown-toggle {
            color: #fff !important;
            font-weight: 500;
        }

        .navbar-custom .nav-link {
            position: relative;
            padding-bottom: .5rem;
            transition: all 0.3s ease;
        }

        .navbar-custom .nav-link:hover {
            opacity: 0.85;
        }

        /* ====== NAVBAR ACTIVE & HOVER EFFECT ====== */
        .navbar-custom .nav-link.active::after,
        .navbar-custom .nav-link:hover::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -15px;
            width: 100%;
            height: 4px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .navbar-custom .nav-link.active::after {
            background-color: #D0E6FD;
        }

        .navbar-custom .nav-link:hover::after {
            background-color: rgba(255, 255, 255, 0.4);
            height: 2px;
        }

        /* ====== EXCLUDE DROPDOWN USERNAME ====== */
        .navbar-custom .nav-item.dropdown .nav-link::after {
            content: none !important;
        }

        .navbar-custom .nav-item.dropdown .nav-link:hover {
            opacity: 1 !important;
        }

        .navbar-custom .nav-item.dropdown .nav-link.active {
            color: #fff !important;
        }

        /* ====== DROPDOWN MENU ====== */
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* ====== BUTTONS ====== */
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

        .btn-light:hover {
            background: linear-gradient(to bottom, #162660, #2D4EC6);
            color: white;
            -webkit-background-clip: unset;
            -webkit-text-fill-color: white;
        }

        .btn-gradient-outline {
            border: 1px solid #2D4EC6;
            border-color: #2D4EC6;
            color: #162660;
            background: linear-gradient(to bottom, #162660, #2D4EC6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-gradient-outline:hover {
            background: linear-gradient(to bottom, #162660, #2D4EC6);
            color: white;
            -webkit-background-clip: unset;
            -webkit-text-fill-color: white;
        }

        .btn-danger {
            background: linear-gradient(to bottom, #dc3545, #a71d2a);
            border-color: #dc3545;
            width: 100px;
        }

        .btn-danger:hover {
            background: linear-gradient(to bottom, #a71d2a, #dc3545);
            border-color: #a71d2a;
        }

        .btn-warning {
            background: linear-gradient(to bottom, #162660, #2D4EC6);
            border-color: #162660;
            width: 100px;
        }

        .btn-success {
            background: linear-gradient(to bottom, #28a745, #1e7e34);
            border-color: #28a745;
            width: 100px;
        }

        .btn-success:hover {
            background: linear-gradient(to bottom, #1e7e34, #28a745);
            border-color: #1e7e34;
        }


        /* ====== FOOTER ====== */
        footer {
            background: #D0E6FD;
            font-size: 0.9rem;
        }

        .footer-wave {
            position: relative;
            overflow: hidden;
            background-color: #D0E6FD;
        }

        /* ====== FOOTER WAVE SVG ====== */
        .shapedividers_com-1655 {
            position: relative;
            overflow: hidden;
        }

        .shapedividers_com-1655::before {
            content: '';
            position: absolute;
            z-index: 3;
            pointer-events: none;
            bottom: -0.1vw;
            left: -0.1vw;
            right: -0.1vw;
            top: -0.1vw;
            background-repeat: no-repeat;
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

        /* ====== HIDE SCROLLBAR ====== */
        html::-webkit-scrollbar,
        body::-webkit-scrollbar {
            display: none;
        }

        @media (max-width: 991.98px) {
            .navbar-custom .navbar-collapse {
                background: linear-gradient(to bottom, #162660, #2D4EC6);
                padding: 1rem 1.25rem;
                border-radius: 16px 16px 16px 16px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
                margin: 20px;
            }

            .navbar-custom .navbar-nav {
                flex-direction: column !important;
                align-items: start !important;
                gap: 0.25rem;
            }

            .navbar-custom .nav-item {
                width: 100%;
            }

            .navbar-custom .nav-link {
                width: 100%;
                padding: 0.75rem 0;
                text-align: start;
            }

            .navbar-custom .nav-item:last-child .nav-link {
                border-bottom: none;
            }

            .navbar-custom .nav-item.dropdown.ms-3.ps-3 {
                border: none !important;
                margin-top: 0.5rem;
                padding-left: 0 !important;
            }

            .navbar-custom .dropdown-menu {
                border-radius: 10px;
                margin-top: 0.5rem;
            }

            .navbar-collapse.collapse {
                transition: all 0.35s ease-in-out;
            }
        }
    </style>
    @stack('styles')

</head>

<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img style="width: 35px; height: 60.71px;" src="{{ asset('images/logo.png') }}" alt="ERT07"
                    class="me-2">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon text-white"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    <li class="nav-item ">
                        <a class="nav-link {{--{{ Request::is('/') ? 'active' : '' }}--}} "
                            href="/admin/home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('pengumuman') ? 'active' : '' }} "
                            href="/admin/pengumuman">Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('materi') ? 'active' : '' }}" href="/admin/materi">Materi</a>
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
                            <li><a class="dropdown-item" href="/admin/profil">Profil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ url('/') }}" method="GET" class="m-0">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>

</html>
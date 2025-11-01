<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'ERT07 - Auth' }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">


  <style>
    body {
      background: linear-gradient(to bottom, #162660, #2D4EC6);
      height: 100vh;
      overflow: hidden;
      font-family: 'Ubuntu', sans-serif;
    }

    .login-box {
      background: white;
      border-radius: 15px;
      padding: 40px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 90%;
      max-width: 380px;
    }

    /* ================= LEFT SECTION ================= */

    /* Tombol Kembali (Overlay di kiri atas) */
    .btn-back {
      position: absolute;
      top: 20px;
      left: 25px;
      z-index: 3;
      color: white;
      font-weight: 600;
      text-decoration: none;
      background: rgba(0, 0, 0, 0.35);
      padding: 8px 16px;
      border-radius: 50px;
      transition: all 0.3s ease;
      font-size: 0.95rem;
      backdrop-filter: blur(3px);
    }

    .btn-back:hover {
      background: rgba(255, 255, 255, 0.15);
      transform: translateX(-3px);
      color: #fff;
    }


    .left-section {
      height: 100vh;
      position: relative;
      overflow: hidden;
      background: #162660;
      clip-path: ellipse(100% 130% at 0% 50%);

    }

    .login-image {
      position: absolute;
      top: 0;
      left: -50px;
      width: 120%;
      height: 100%;
      object-fit: cover;
      filter: brightness(75%);
      z-index: 1;
    }

    .overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: white;
      z-index: 2;
      width: 100%;
    }

    .overlay h2 {
      font-size: 3rem;
      font-weight: 700;
      letter-spacing: 1px;
      margin-bottom: 0.3rem;
    }

    .overlay p {
      font-size: 1.1rem;
      color: rgba(255, 255, 255, 0.85);
      margin: 0;
    }

    .overlay-logo {
      width: 150px;
      /* kamu bisa ubah ukuran sesuai desain */
      height: auto;
      display: block;
      margin: 0 auto 10px auto;
      filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.3));
      animation: fadeInUp 0.8s ease-in-out;
    }

    /* Animasi muncul lembut */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .right-section {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .gradient-text {
      background: linear-gradient(to bottom, #162660, #2D4EC6);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .btn-gradient-outline {
      position: relative;
      display: inline-block;
      padding: 10px 0;
      font-weight: 600;
      border-radius: 12px;
      border: 2px solid transparent;
      background-image:
        linear-gradient(white, white),
        /* isi tombol */
        linear-gradient(to bottom, #162660, #2D4EC6);
      /* border gradient */
      background-origin: padding-box, border-box;
      background-clip: padding-box, border-box;
      color: #162660;
      overflow: hidden;
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
        /* sekarang isi = gradient */
        linear-gradient(to bottom, #162660, #2D4EC6);
      /* border tetap gradient (blend-safe) */
      transform: translateY(-2px);
    }

    .btn-gradient-outline:hover span {
      -webkit-text-fill-color: #fff;
    }

    .btn-gradient-outline:active {
      transform: translateY(0);
      opacity: 0.9;
    }
  </style>

  @stack('styles')
</head>

<body>

  <div class="container-fluid h-100">
    <div class="row h-100">
      <!-- Kiri -->
      <div class="col-md-6 d-none d-md-block p-0 left-section">
        <div class="image-wrapper">
          <img src="{{ asset('images/login-bg.png') }}" alt="Background ERT07" class="login-image">

          {{-- button back --}}
          <a href="{{ url()->previous() }}" class="btn-back d-flex align-items-center">
            <i class="bi bi-arrow-left me-2"></i> Kembali
          </a>

          {{-- text --}}
          <div class="overlay">
            <img src="{{ asset('images/logo.png') }}" alt="Logo ERT07" class="overlay-logo mb-2">
            <h2 class="fw-bold text-white mb-4">ERT07</h2>
            <p class="text-white">Ingin Mendaftar sebagai Apa?</p>
          </div>
        </div>
      </div>

      <!-- Kanan -->
      <div class="col-md-6 d-flex align-items-center justify-content-center">
        <div class="login-box text-center">
          @yield('content')
        </div>
      </div>
    </div>
  </div>

  @stack('scripts')
</body>

</html>
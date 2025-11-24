<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\MateriController;
use App\Models\User;  // <-- ini wajib

// ===== Halaman Awal =====
Route::get('/', function () {
    return view('welcome');
});

// ===== AUTH SECTION =====
Route::controller(AuthController::class)->group(function () {
    // Login & Logout
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::post('/logout', 'logout')->name('logout');

    // Register umum
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'doRegister')->name('register.post');

    Route::get('/register/admin', 'showRegisterAdmin')->name('register.admin');
    Route::post('/register/admin', 'registerAdmin')->name('register.admin.post');

    // Lupa Password
    Route::get('/forgot-password', 'showForgotPassword')->name('password.request');
});

// ===== ADMIN SECTION =====
Route::prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/home', 'index')->name('admin.home');
    Route::get('/pengumuman', 'pengumuman')->name('admin.pengumuman');
    Route::get('/materi', 'materi')->name('admin.materi');
    Route::get('/warga', 'warga')->name('admin.warga');
    Route::get('/profil', 'profil')->name('admin.profil');
    // Route::get('/materi-lihat/{id_materi}', 'materi_lihat')->name('materi-lihat');

    Route::get('/daftar-materi', 'daftarMateri')->name('admin.daftar-materi');
    Route::get('/lihat-materi/{id_materi}', 'lihatMateri')->name('admin.lihat-materi');
    Route::post('/lihat-materi/{id_materi}/komentar', 'kirimKomentar')->name('admin.komentar.kirim');

});

// ===== PENGUMUMAN ADMIN =====
Route::prefix('admin/pengumuman')->group(function () {
    Route::get('/', [PengumumanController::class, 'index'])->name('pengumuman.index');
    Route::get('/data', [PengumumanController::class, 'fetch'])->name('pengumuman.fetch');
    Route::post('/', [PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::get('/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');
    Route::put('/{id}', [PengumumanController::class, 'update'])->name('pengumuman.update');
    Route::delete('/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.delete');
});

// ===== MATERI ADMIN =====
Route::prefix('admin/materi')->middleware(['auth'])->group(function () {
    Route::get('/', [MateriController::class, 'index'])->name('materi.index');
    Route::get('/data', [MateriController::class, 'fetch'])->name('materi.fetch');
    Route::get('/show/{id}', [MateriController::class, 'show'])->name('materi.show'); // <--- tambahan penting
    Route::post('/store', [MateriController::class, 'store'])->name('materi.store');
    Route::put('/update/{id}', [MateriController::class, 'update'])->name('materi.update');
    Route::delete('/delete/{id}', [MateriController::class, 'destroy'])->name('materi.delete');
    Route::delete('/file/{id}', [MateriController::class, 'destroyFile'])->name('materi.file.delete');
});




// ===== STATUS AKUN DI ADMIN =====
Route::put('/admin/warga/blokir/{id_user}', [AdminController::class, 'blokir'])->name('admin.blokir');
Route::put('/admin/warga/terima/{id_user}', [AdminController::class, 'terima'])->name('admin.terima');
Route::put('/admin/warga/buka/{id_user}', [AdminController::class, 'buka'])->name('admin.buka');

// ===== WARGA SECTION =====
Route::prefix('warga')->controller(WargaController::class)->group(function () {
    Route::get('/homepage', 'homepage')->name('warga.homepage');
    Route::get('/pengumuman', 'pengumuman')->name('warga.pengumuman');
    Route::get('/materi', 'materi')->name('warga.materi');
    Route::get('/lihat-materi/{id_materi}', 'lihat_materi')->name('warga.lihat-materi');
    Route::get('/profil-warga', 'profil_warga')->name('warga.profil-warga');
    Route::get('/edit-profil-warga', 'edit_profil_warga')->name('warga.edit-profil-warga');
    Route::post('/warga/komentar/{id_materi}', [WargaController::class, 'kirimKomentar'])
        ->name('warga.komentar.kirim');

});


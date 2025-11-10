<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\WargaController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
route::get('/register/warga', [AuthController::class, 'showRegisterWarga'])->name('register.warga');
route::post('/register/warga', [AuthController::class, 'registerWarga'])->name('register.warga.post');
route::get('/register/admin', [AuthController::class, 'showRegisterAdmin'])->name('register.admin');
route::post('/register/admin', [AuthController::class, 'registerAdmin'])->name('register.admin.post');
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/pengumuman', [AdminController::class, 'pengumuman'])->name('admin.pengumuman');
    Route::get('/materi', [AdminController::class, 'materi'])->name('admin.materi');
    Route::get('/warga', [AdminController::class, 'warga'])->name('admin.warga');
});

Route::get('/admin/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
Route::post('/admin/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');

// Route::middleware('auth')->group(function () {
//     Route::get('/admin/home', function () {
//         return view('admin.home');
//     });
// });

Route::get('/warga/homepage', [WargaController::class, 'homepage'])->name('warga.homepage');
Route::get('/warga/pengumuman', [WargaController::class, 'pengumuman'])->name('warga.pengumuman');
Route::get('/warga/materi', [WargaController::class, 'materi'])->name('warga.materi');
Route::get('/warga/lihat-materi', [WargaController::class, 'lihat_materi'])->name('warga.lihat-materi');
Route::get('/warga/profil-warga', [WargaController::class, 'profil_warga'])->name('warga.profil-warga');
Route::get('/warga/edit-profil-warga', [WargaController::class, 'edit_profil_warga'])->name('warga.edit-profil-warga');


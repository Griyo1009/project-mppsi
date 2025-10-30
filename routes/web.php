<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengumumanController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/login/warga', [AuthController::class, 'showLoginWarga'])->name('login.warga');
Route::post('/login/warga', [AuthController::class, 'loginWarga'])->name('login.warga.post');
Route::get('/login/admin', [AuthController::class, 'showLoginAdmin'])->name('login.admin');
Route::post('/login/admin', [AuthController::class, 'loginAdmin'])->name('login.admin.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
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

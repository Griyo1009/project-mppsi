<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // nanti logic login di sini (berdasarkan role: warga/pengurus)
    }
    public function showLoginWarga() {
        return view('auth.login-warga');
    }

    public function showLoginAdmin() {
        return view('auth.login-admin');
    }
    public function loginWarga(Request $request) {
        // logic login warga di sini
    }
    public function loginAdmin(Request $request) {
        // logic login admin di sini
    }
    public function showRegister() {
        return view('auth.register');
    }
    public function register(Request $request) {
        // logic registrasi user baru di sini
    }
    public function logout(Request $request) {
        // logic logout di sini
    }
    public function showForgotPassword() {
        return view('auth.forgot-password');
    }

}


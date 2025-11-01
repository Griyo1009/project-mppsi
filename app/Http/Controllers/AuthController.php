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

    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        // logic registrasi user baru di sini
    }
    public function logout(Request $request)
    {
        // logic logout di sini
    }
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

}


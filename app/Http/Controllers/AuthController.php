<?php
namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //tampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    //fungsi login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:5',
        ]);

        // Cek user di database
        $user = User::where('username', $request->username)->first();

        // Username tidak ditemukan
        if (!$user) {
            return back()->with('swal_error', 'Username tidak ditemukan.');
        }

        // Password salah
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('swal_error', 'Password salah.');
        }

        // Cek status akun
        if ($user->status_akun === '0') {
            return back()->with('swal_warning', 'Akun kamu belum disetujui admin.');
        }

        if ($user->status_akun === '2') {
            return back()->with('swal_error', 'Akun kamu telah diblokir.');
        }

        // Login berhasil
        Auth::login($user);

        // Redirect sesuai role
        if ($user->role == 1) {
            return redirect()->route('admin.home')->with('swal_success', 'Selamat datang, Admin!');
        } else {
            return redirect()->route('warga.homepage')->with('swal_success', 'Selamat datang di halaman warga!');
        }
    }

    //fungsi log out
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('swal_success', 'Kamu berhasil logout!');
    }

    //tampilkan form register umum
    public function showRegister()
    {
        return view('auth.register');
    }

    //query inser data register umum
    public function doRegister(Request $request)
    {
        // ✅ Validasi input
        $validatedData = $request->validate([
            'nik' => ['required', 'min:16', 'unique:users,NIK'],
            'nama_lengkap' => ['required', 'max:50'],
            'email' => ['required', 'email:rfc,dns', 'unique:users,email'],
            'username' => ['required', 'min:5', 'max:20', 'unique:users,username'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        if ($validatedData) {
            $error = null;

            try {
                $user = User::create([
                    'NIK' => $request->nik,
                    'nama_lengkap' => $request->nama_lengkap,
                    'email' => $request->email,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'status_akun' => '0', // default: belum aktif
                    'role' => 0,          // default: warga
                    'foto_profil' => 'profile-default.jpg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                if ($user) {
                    return redirect()
                        ->route('login')->with('swal_success', 'Registrasi berhasil! Silakan login untuk melanjutkan.');
                } else {
                    return back()->with('swal_error', 'Gagal menyimpan data user.');
                }
            } catch (\Exception $e) {
                return back()->with('swal_error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
        }

        return response("Validasi gagal", 400);
    }

    // public function showForgotPassword()
    // {
    //     return view('auth.forgot-password');
    // }
    // public function showRegisterWarga()
    // {
    //     return view('auth.register-warga');
    // }

    //tampilkan register admin 
    public function showRegisterAdmin()
    {
        return view('auth.regis-admin');
    }

    //query insert untukn regist admin (masih eror)

    public function registerAdmin(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nik' => ['required', 'min:16', 'unique:users,NIK'],
            'nama_lengkap' => ['required', 'max:50'],
            'email' => ['required', 'email:rfc,dns', 'unique:users,email'],
            'username' => ['required', 'min:5', 'max:20', 'unique:users,username'],
            'password' => ['required', 'min:6', 'confirmed'],
            'role' => ['required', 'in:0,1'],
        ]);

        try {
            $user = User::create([
                'NIK' => $validatedData['nik'],
                'nama_lengkap' => $validatedData['nama_lengkap'],
                'email' => $validatedData['email'],
                'username' => $validatedData['username'],
                'password' => Hash::make($validatedData['password']),
                'role' => $validatedData['role'],
                'status_akun' => 0, // default belum aktif
                'foto_profil' => 'profile-default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('admin.home')->with('swal_success', 'Akun berhasil dibuat!');
        } catch (\Exception $e) {
            return back()->with('swal_error', 'Gagal menyimpan data: ' . $e->getMessage())->withInput();
        }
    }




}

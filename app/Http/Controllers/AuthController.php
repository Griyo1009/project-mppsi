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
    public function showLogin()
    {
        return view('auth.login');
    }

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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('swal_success', 'Kamu berhasil logout!');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function doRegister(Request $request): Response
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
                    return response("Berhasil register!", 200);
                } else {
                    return response("Gagal menyimpan data user", 500);
                }
            } catch (\Exception $e) {
                return response(" Terjadi kesalahan: " . $e->getMessage(), 500);
            }
        }

        return response("Validasi gagal", 400);
    }
    
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }
    public function showRegisterWarga() {
        return view('auth.register-warga');
    }
    public function registerWarga(Request $request) {
        // logic registrasi warga di sini
    }
    public function showRegisterAdmin() {
        return view('auth.register-admin');
    }

    public function registerAdmin(Request $request) {
        // logic registrasi admin di sini
    }
}

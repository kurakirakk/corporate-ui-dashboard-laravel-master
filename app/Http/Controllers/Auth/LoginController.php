<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pegawai;
use App\Helpers\ResponseHandler;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth/signin');  // Blade login form
    }

    public function login(Request $request)
    {
        $request->validate([
            'nip' => 'required|string|max:18',
            'password' => 'required|string',
        ]);

        $nip = $request->nip;
        $password = $request->password;

        // Cek di users (admin)
        $user = User::where('nip', $nip)->first();
        if ($user && Hash::check($password, $user->password)) {
            Auth::guard('web')->login($user);
            $request->session()->regenerate();

            if ($request->expectsJson()) {
                return ResponseHandler::success('Login berhasil sebagai admin', ['user' => $user]);
            }

            return redirect()->intended('admin/dashboard');
        }

        // Cek di pegawai
        $pegawai = Pegawai::where('nip', $nip)->first();
        if ($pegawai && Hash::check($password, $pegawai->password)) {
            Auth::guard('pegawai')->login($pegawai);
            $request->session()->regenerate();

            if ($request->expectsJson()) {
                return ResponseHandler::success('Login berhasil sebagai pegawai', ['user' => $pegawai]);
            }

            return redirect()->intended('/dashboard');
        }

        // Gagal login
        if ($request->expectsJson()) {
            return ResponseHandler::error('NIP atau password salah', 422);
        }

        return back()->withErrors([
            'nip' => 'NIP atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        } elseif (Auth::guard('pegawai')->check()) {
            Auth::guard('pegawai')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->expectsJson()) {
            return ResponseHandler::success('Logout berhasil');
        }

        return redirect('/');
    }

    public function apiUser(Request $request)
    {
        $user = $request->user();
        if ($request->expectsJson()) {
            return ResponseHandler::success('User info', ['user' => $user]);
        }
        return view('profile', compact('user'));  // contoh blade jika ingin tampil user info
    }
}

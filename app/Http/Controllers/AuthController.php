<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     */

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();
        $register = User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ]);

        if ($register) {
            return redirect(route('login'))->with('success', 'Anda berhasil Registrasi silahkan login terlebih dahulu!');
        } else {
            return redirect(route('register'))->with('error', 'Anda Gagal Registrasi');
        }
    }

    public function login(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        // Fungsi Auth::attempt() akan mencocokkan kredensial dengan data yang ada di database
        if (Auth::attempt($validatedData)) {

            $user = Auth::user();

            return redirect()->intended('/dashboard')->with('success', 'Login berhasil! Selamat datang ' . Auth::user()->name);
        } else {
            // Jika otentikasi gagal, kembali ke halaman login dengan pesan error
            return redirect('/')->with(['gagal' => 'Email atau password salah. Silakan coba lagi.']);
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/login')->with(['success' => 'Berhasil Logout!']);
    }
}

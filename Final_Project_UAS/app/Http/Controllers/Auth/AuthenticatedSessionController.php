<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Proses autentikasi user saat login.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Pastikan LoginRequest memiliki method authenticate()
        // Biasanya berasal dari Laravel Breeze / Fortify
        $request->authenticate();

        // Regenerasi session agar aman
        $request->session()->regenerate();

        // Ambil data user yang login
        $user = Auth::user();

        // Logika redirect berdasarkan role utama
        if ($user->role === 'staff') {
            return redirect()->route('staff.dashboard');
        }

        // Jika role = user, bisa memiliki tipe dosen/mahasiswa
        if ($user->role === 'user') {
            // Contoh: jika ada kolom user_type di tabel users
            if ($user->user_type === 'dosen') {
                return redirect()->route('user.dosen.dashboard');
            } elseif ($user->user_type === 'mahasiswa') {
                return redirect()->route('user.mahasiswa.dashboard');
            }

            // Default fallback
            return redirect()->route('user.dashboard');
        }

        // Jika tidak cocok, arahkan ke halaman utama
        return redirect('/');
    }

    /**
     * Logout user & hapus sesi.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

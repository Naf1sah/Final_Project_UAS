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
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        // 🔥 Jika staff (admin)
        if ($user->role === 'staff') {
            return redirect()->route('staff.dashboard');
        }

        // 🔥 Jika user biasa (mahasiswa atau dosen)
        if ($user->role === 'user') {

            // Kalau kamu ingin pisah dashboard dosen/mahasiswa
            if ($user->jenis_user === 'dosen') {
                return redirect()->route('user.dashboard'); // atau route lain jika ada
            }

            if ($user->jenis_user === 'mahasiswa') {
                return redirect()->route('user.dashboard'); // atau route lain jika ada
            }

            // Default
            return redirect()->route('user.dashboard');
        }

        // Fallback
        return redirect('/');
    }

    /**
     * Logout user.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Default registration (optional)
     */
    public function create(): View
    {
        return view('auth.register_user'); // ⬅️ arahkan ke user register
    }

    /**
     * Handle default registration (user)
     */
    public function store(Request $request): RedirectResponse
    {
        return $this->storeUser($request);
    }

    /**
     * 🔹 Tampilkan form register user
     */
    public function createUser(): View
    {
        return view('auth.register_user');
    }

    /**
     * 🔹 Proses simpan data user
     */
    public function storeUser(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // ⬅️ Sesuai field di migration kamu
        ]);

        event(new Registered($user));

        return redirect()->route('login')->with('status', 'User account created! Please login.');
    }

    /**
     * 🔸 Tampilkan form register staff
     */
    public function createStaff(): View
    {
        return view('auth.register_staff');
    }

    /**
     * 🔸 Proses simpan data staff
     */
    public function storeStaff(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $staff = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'staff', // ⬅️ otomatis jadi staff
        ]);

        event(new Registered($staff));

        return redirect()->route('login')->with('status', 'Staff account created! Please login.');
    }
}

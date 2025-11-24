<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index(Request $request): View
    {
        return view('profile.index', [
            'user' => $request->user(),
        ]);
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->validated();

        // Nama & email tidak boleh berubah
        $data['name'] = $user->name;
        $data['email'] = $user->email;

        $updated = false;

        /** ==================== UPDATE FOTO PROFIL ==================== **/
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => ['image', 'mimes:jpg,jpeg,png', 'max:2048'],
            ]);

            // Hapus foto lama jika ada
            if ($user->photo && Storage::exists('public/' . $user->photo)) {
                Storage::delete('public/' . $user->photo);
            }

            // Upload foto baru
            $path = $request->file('photo')->store('profile', 'public');
            $user->photo = $path;
            $updated = true;
        }

        /** ==================== UPDATE PASSWORD ==================== **/
        if ($request->filled('current_password') || $request->filled('password')) {

            $request->validate([
                'current_password' => ['required'],
                'password'          => ['required', 'confirmed', Password::defaults()],
            ]);

            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password lama tidak sesuai']);
            }

            $user->password = Hash::make($request->password);
            $user->save();
            return Redirect::route('profile.edit')->with('status', 'password-updated');
        }

        /** ==================== UPDATE DATA PROFIL LAIN ==================== **/
        if (!empty($data)) {
            // Amankan field yang tidak boleh berubah
            unset($data['name'], $data['email']);
            $user->fill($data);  
            $updated = true;
        }

        /** ==================== SIMPAN PERUBAHAN JIKA ADA ==================== **/
        if ($updated) {

            // FIX anti error NOT NULL name & email
            $user->name = $user->name;
            $user->email = $user->email;

            $user->save();

            if ($request->hasFile('photo')) {
                return Redirect::route('profile.edit')->with('status', 'photo-updated');
            }

            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        }

        /** ==================== JIKA TIDAK ADA PERUBAHAN ==================== **/
        return Redirect::route('profile.edit')->with('status', 'nothing-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

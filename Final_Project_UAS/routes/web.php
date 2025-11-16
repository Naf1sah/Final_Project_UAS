<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function() {
    return view('welcome');
});

// Semua route yang butuh login
Route::middleware(['auth'])->group(function(){

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');
    Route::get('/staff/dashboard', [DashboardController::class, 'staff'])->name('staff.dashboard');

    // Rooms CRUD (kecuali show)
    Route::resource('rooms', RoomController::class)->except(['show']);

    // Bookings CRUD (hanya index, create, store)
    Route::resource('bookings', BookingController::class)->only(['index','create','store']);

    // Approve & Reject bookings
    Route::post('bookings/{booking}/approve', [BookingController::class,'approve'])
        ->name('bookings.approve');
    Route::post('bookings/{booking}/reject', [BookingController::class,'reject'])
        ->name('bookings.reject');

    /*
    |-----------------------------------------
    | Profile Routes (index, edit, update)
    |-----------------------------------------
    */

    // ➕ Tambahan route untuk profile.index
    Route::get('/profile/index', function () {
        return view('profile.index', [
            'user' => auth()->user()
        ]);
    })->name('profile.index');

    // Halaman edit profil
    Route::get('/profile', function () {
        return view('profile.edit', [
            'user' => auth()->user()
        ]);
    })->name('profile.edit');

    // Proses update profil
    Route::post('/profile', function (\Illuminate\Http\Request $request) {
        $user = $request->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profile updated!');
    })->name('profile.update');

    // Delete akun
    Route::delete('/profile', function (\Illuminate\Http\Request $request) {
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    })->name('profile.destroy');

});

require __DIR__.'/auth.php';

// Redirect default "home" ke dashboard user
Route::get('/home', function () {
    return redirect()->route('user.dashboard');
})->name('home');

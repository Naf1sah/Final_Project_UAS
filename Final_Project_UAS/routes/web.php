<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;

Route::get('/', function() {
    return view('welcome');
});

// Semua route yang butuh login
Route::middleware(['web', 'auth'])->group(function(){

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');
    Route::get('/staff/dashboard', [DashboardController::class, 'staff'])->name('staff.dashboard');

    // List rooms untuk user biasa
    Route::get('/bookings/rooms', [RoomController::class, 'listForBooking'])
        ->name('bookings.rooms');

    // Rooms CRUD (kecuali show)
    Route::resource('rooms', RoomController::class)->except(['show']);

    // Bookings CRUD (hanya index, create, store)
    Route::resource('bookings', BookingController::class)->only(['index','create','store']);

    // Approve & Reject bookings
    Route::post('bookings/{booking}/approve', [BookingController::class,'approve'])
        ->name('bookings.approve');
    Route::post('bookings/{booking}/reject', [BookingController::class,'reject'])
        ->name('bookings.reject');

    // Profile Routes
    Route::get('/profile/index', function () {
        return view('profile.index', [
            'user' => auth()->user()
        ]);
    })->name('profile.index');

    Route::get('/profile', function () {
        return view('profile.edit', [
            'user' => auth()->user()
        ]);
    })->name('profile.edit');

    Route::post('/profile', function (\Illuminate\Http\Request $request) {
        $user = $request->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profile updated!');
    })->name('profile.update');

    // ✅ Tambahan PATCH route untuk update profile + foto
    Route::patch('/profile', function (\Illuminate\Http\Request $request) {
        $user = $request->user();

        $user->name = $request->name;
        $user->email = $request->email;

        // update foto
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profile_photos', 'public');
            $user->photo = $path;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profile updated!');
    })->name('profile.update.patch');
    Route::post('/profile/upload-photo', [ProfileController::class, 'uploadPhoto'])->name('profile.uploadPhoto');


    Route::delete('/profile', function (\Illuminate\Http\Request $request) {
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    })->name('profile.destroy');
});

Route::middleware(['web', 'auth'])->group(function () {

    Route::get('/notifications', [NotificationController::class, 'index'])
        ->name('notifications.all');

    Route::get('/notifications/read/{id}', [NotificationController::class, 'markRead'])
        ->name('notifications.read');

});

require __DIR__.'/auth.php';

// Redirect default "home" ke dashboard user
Route::get('/home', function () {
    return redirect()->route('user.dashboard');
})->name('home');

Route::get('/_debug-auth', function () {
    return [
        'config_db' => config('database.connections.sqlite.database'),
        'auth_user' => optional(Auth::user())->only('id','name','email','role'),
        //'gate_manage_rooms' => Gate::allows('manage-rooms'),
    ];

// Rooms Create Staff
Route::middleware(['auth', 'staff'])->group(function () {
    Route::resource('rooms', RoomController::class);
});

});

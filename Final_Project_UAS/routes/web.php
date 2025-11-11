<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;


Route::get('/', function(){ return view('welcome'); });


Route::middleware(['auth'])->group(function(){
Route::resource('rooms', RoomController::class)->except(['show']);
Route::resource('bookings', BookingController::class)->only(['index','create','store']);


Route::post('bookings/{booking}/approve', [BookingController::class,'approve'])->name('bookings.approve');
Route::post('bookings/{booking}/reject', [BookingController::class,'reject'])->name('bookings.reject');
});


require __DIR__.'/auth.php';
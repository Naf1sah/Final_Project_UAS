<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Room;
use App\Policies\RoomPolicy;
use App\Models\User; // Pastikan model User diimpor

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Pendaftaran Policy untuk model aplikasi.
     * Ini WAJIB didaftarkan agar RoomPolicy dapat bekerja dengan $this->authorize() di Controller.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Room::class => RoomPolicy::class,
    ];


    /**
     * Daftarkan layanan otorisasi/autentikasi aplikasi.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate: manage-rooms - Hanya boleh diakses oleh staf.
        Gate::define('manage-rooms', function(User $user){
            // SOLUSI 403: Menggunakan strtolower() untuk menghindari kesalahan 403
            // jika role di database tersimpan sebagai 'Staff' (kapital)
            return in_array(strtolower($user->role), ['staff']);
        });

        // Gate: approve-booking - Hanya boleh diakses oleh staf.
        Gate::define('approve-booking', function(User $user){
            // SOLUSI 403: Terapkan strtolower() di sini juga.
            return in_array(strtolower($user->role), ['staff']);    
        });
    }
}
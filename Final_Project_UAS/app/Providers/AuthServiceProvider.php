<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = []; // HAPUS policy Room

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-rooms', function(User $user){
            return in_array(strtolower($user->role), ['staff', 'admin']);
        });

        Gate::define('approve-booking', function(User $user){
            return in_array(strtolower($user->role), ['staff', 'admin']);
        });
    }
}

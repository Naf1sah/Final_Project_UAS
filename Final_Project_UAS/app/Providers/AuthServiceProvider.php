<?php


namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
    // 'App\\Models\\Model' => 'App\\Policies\\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-rooms', function($user){
        return in_array($user->role, ['admin','staff']);
        });

        Gate::define('approve-booking', function($user){
        return in_array($user->role, ['admin','staff']);    
        });
    }
}
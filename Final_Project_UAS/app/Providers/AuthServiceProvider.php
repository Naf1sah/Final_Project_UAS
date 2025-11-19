<?php


namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Room;
use App\Policies\RoomPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
    Room::class => RoomPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-rooms', function($user){
        return in_array($user->role, ['staff']);
        });

        Gate::define('approve-booking', function($user){
        return in_array($user->role, ['staff']);    
        });
    }
}
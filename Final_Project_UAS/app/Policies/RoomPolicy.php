<?php

namespace App\Policies;

use App\Models\Room;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RoomPolicy
{
    public function viewAny(User $user)
    {
        return $user->role === 'staff';
    }

    public function create(User $user)
    {
        return $user->role === 'staff';
    }
}

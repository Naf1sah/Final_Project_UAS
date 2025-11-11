<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name','capacity','location','description','status'];

    public function bookings()
    {
    return $this->hasMany(Booking::class);
    }

    public function unavailables()
    {
    return $this->hasMany(RoomUnavailable::class);
    }
}
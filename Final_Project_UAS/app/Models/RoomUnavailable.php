<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomUnavailable extends Model
{
    use HasFactory;

    protected $fillable = ['room_id','start_date','end_date','reason'];


    public function room()
    {
    return $this->belongsTo(Room::class);
    }
}
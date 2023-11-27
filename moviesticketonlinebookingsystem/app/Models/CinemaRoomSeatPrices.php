<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaRoomSeatPrices extends Model
{
    use HasFactory;

    protected $fillable  = ['room_id', 'row_name', 'seat_price'];
}

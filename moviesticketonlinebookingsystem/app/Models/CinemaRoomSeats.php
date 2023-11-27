<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaRoomSeats extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'seat_no', 'row_name', 'seat_type'];
}

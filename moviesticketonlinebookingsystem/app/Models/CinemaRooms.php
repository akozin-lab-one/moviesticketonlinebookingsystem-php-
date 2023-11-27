<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaRooms extends Model
{
    use HasFactory;

    protected $fillable = ['cinema_id', 'room_number', 'room_name', 'seating_capacity'];
}

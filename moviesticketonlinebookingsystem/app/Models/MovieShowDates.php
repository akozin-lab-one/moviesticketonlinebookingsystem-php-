<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovieShowDates extends Model
{
    use HasFactory;

    protected $fillable = ['cinema_id', 'room_id', 'movie_id'];

}

<?php

namespace App\Models;

use App\Models\MovieShowDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovieSchedules extends Model
{
    use HasFactory;

    protected $fillable = ['show_date_id', 'show_date_time'];

    public function show_date_id(): HasOne
    {
        return $this->hasOne(MovieShowDates::class);
    }
}

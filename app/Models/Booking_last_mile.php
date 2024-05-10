<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking_last_mile extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Relations

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}

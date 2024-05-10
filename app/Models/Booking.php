<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Relations

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function park_place(): BelongsTo
    {
        return $this->belongsTo(Park_place::class);
    }

    public function bookingLastMile()
    {
        return $this->hasOne(Booking_last_mile::class)->withDefault();
    }
}

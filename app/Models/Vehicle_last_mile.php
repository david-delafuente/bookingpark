<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle_last_mile extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Relations

    public function parking(): BelongsTo
    {
        return $this->belongsTo(Parking::class);
    }

    public function bookings_last_mile(): HasMany
    {
        return $this->hasMany(Booking_last_mile::class);
    }
}

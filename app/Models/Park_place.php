<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Park_place extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Relations

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function parking(): BelongsTo
    {
        return $this->belongsTo(Parking::class);
    }
}

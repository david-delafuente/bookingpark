<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parking extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Realtions

    public function park_places(): HasMany
    {
        return $this->hasMany(Park_place::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function vehicles_last_mile(): HasMany
    {
        return $this->hasMany(Vehicle_last_mile::class);
    }
}

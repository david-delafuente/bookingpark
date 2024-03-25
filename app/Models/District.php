<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Realtions

    public function parkings(): HasMany
    {
        return $this->hasMany(Parking::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Membership extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Relations

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}

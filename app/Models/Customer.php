<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    protected $fillable = [
        'code',
        'name',
        'phone',
        'address',
        'province',
        'cities',
    ];

    public function vehicle(): HasOne
    {
        return $this->hasOne(Vehicle::class);
    }
}

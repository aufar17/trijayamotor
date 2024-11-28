<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    //
    protected $fillable = [
        'code',
        'name',
        'email',
        'phone',
        'address',
        'province',
        'cities',
        'bank',
        'bank_account',
    ];

    public function inventories(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }
}

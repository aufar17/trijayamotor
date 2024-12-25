<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inventory extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'stock',
        'sell',
        'location',
    ];


    public function histories(): HasMany
    {
        return $this->hasMany(InventorySupplier::class);
    }

    public function getSellRupiahAttribute($value)
    {
        return 'Rp ' . number_format($this->attributes['sell'], 0, ',', '.');
    }
    
}

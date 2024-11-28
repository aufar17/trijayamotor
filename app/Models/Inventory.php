<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'stock',
        'stock',
        'purchase',
        'sell',
        'location',
        'entry',
    ];


    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function getSellRupiahAttribute($value)
    {
        return 'Rp ' . number_format($this->attributes['sell'], 0, ',', '.');
    }
    public function getPurchaseRupiahAttribute($value)
    {
        return 'Rp ' . number_format($this->attributes['purchase'], 0, ',', '.');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionInventory extends Model
{
    protected $table = 'transaction_inventory';
    protected $fillable = [
        'transaction_id',
        'inventory_id',
        'qty'
    ];

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class, 'inventory_id', 'id');
    }
}

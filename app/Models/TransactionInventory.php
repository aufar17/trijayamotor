<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionInventory extends Model
{
    protected $table = 'transaction_inventories';
    protected $fillable = [
        'transaction_id',
        'inventory_id'
    ];
}

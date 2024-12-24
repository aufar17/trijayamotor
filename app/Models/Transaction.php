<?php

namespace App\Models;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaction extends Model
{
    protected $fillable = [
        'code',
        'vehicle_id',
        'date',
        'total_spareparts',
        'total_services',
        'total',
        'notes',

    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function transactionInventory(): HasMany
    {
        return $this->hasMany(TransactionInventory::class, 'transaction_id', 'id');
    }
    
    public function transactionService(): HasMany
    {
        return $this->hasMany(TransactionService::class, 'transaction_id', 'id');
    }

    public function getTotalAttribute($value)
    {
        return 'Rp ' . number_format($this->attributes['total'], 0, ',', '.');
    }

    public function getTotalSparepartsAttribute($value)
    {
        return 'Rp ' . number_format($this->attributes['total_spareparts'], 0, ',', '.');
    }

    public function getTotalServicesAttribute($value)
    {
        return 'Rp ' . number_format($this->attributes['total_services'], 0, ',', '.');
    }
}

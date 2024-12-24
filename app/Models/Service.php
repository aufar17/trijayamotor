<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = [
        'code',
        'name',
        'description',
        'price',
    ];

    public function getPriceServiceAttribute($value)
    {
        return 'Rp ' . number_format($this->attributes['price'], 0, ',', '.');
    }
}

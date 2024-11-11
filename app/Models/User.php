<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $fillable = [
        'username',
        'password',
        'role',
    ];

    public function setPasswordAttribute($value)
    {
        // Jika password diberikan, hash password sebelum menyimpannya
        $this->attributes['password'] = Hash::make($value);
    }
}

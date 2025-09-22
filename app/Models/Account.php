<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // <-- ganti Model ke Authenticatable
use Laravel\Sanctum\HasApiTokens;

class Account extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $table = 'accounts';

    protected $fillable = [
        'username',
        'email',
        'password',
        'role'
    ];

    // Kalau mau, bisa juga sembunyikan password & remember_token saat di-return JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];
}

<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;

class TimonShopUser extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'image_user',
    ];

    protected $guarded = [
        'remember_token'
    ];
}

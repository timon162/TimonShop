<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

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

    public function getAvatarAttribute()
    {
        return $this->image_user
            ?: 'https://cdn-icons-png.flaticon.com/256/3293/3293466.png';
    }
}

<?php

namespace App\Models;

use App\Models\TimonShopProduct;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TimonShopCategory extends Authenticatable
{
    protected $fillable = [
        'category_name',
        'category_image	'
    ];
}

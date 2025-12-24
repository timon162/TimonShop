<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;


class TimonShopSupplier extends Authenticatable
{
    protected $fillable = [
        'supplier_name',
        'supplier_image	'
    ];
}

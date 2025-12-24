<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\TimonShopImgDescriptionProduct;

class TimonShopProduct extends Authenticatable
{
    protected $fillable = [
        'product_code',
        'product_name',
        'category_id',
        'supplier_id',
        'product_price',
        'product_quantity',
        'product_image',
        'product_decription'
    ];

    public function imgDescription()
    {
        return $this->hasMany(TimonShopImgDescriptionProduct::class, 'product_id');
    }
}

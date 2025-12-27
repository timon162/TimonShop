<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TimonShopSupplier;
use App\Models\TimonShopCategory;
use App\Models\TimonShopImgDescriptionProduct;
use App\Models\TimonShopBasicOptionProduct;
use App\Models\TimonShopBuyOptionProduct;

class TimonShopProduct extends Model
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

    public function category()
    {
        return $this->belongsTo(TimonShopCategory::class, 'category_id');
    }

    public function supplier()
    {
        return $this->belongsTo(TimonShopSupplier::class, 'supplier_id');
    }

    public function imgDescription()
    {
        return $this->hasMany(TimonShopImgDescriptionProduct::class, 'product_id');
    }

    public function basicOption()
    {
        return $this->hasMany(TimonShopBasicOptionProduct::class, 'product_id');
    }

    public function buyOption()
    {
        return $this->hasMany(TimonShopBuyOptionProduct::class, 'product_id');
    }
}

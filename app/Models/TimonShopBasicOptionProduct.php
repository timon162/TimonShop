<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TimonShopProduct;

class TimonShopBasicOptionProduct extends Model
{
    protected $fillable = [
        'basic_option_name',
        'basic_option_description',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(TimonShopProduct::class, 'product_id');
    }
}

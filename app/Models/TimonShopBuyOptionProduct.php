<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TimonShopProduct;
use App\Models\TimonShopBills;

class TimonShopBuyOptionProduct extends Model
{
    protected $fillable = [
        'buy_option_name',
        'buy_option_description',
        'buy_option_price',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(TimonShopProduct::class, 'product_id');
    }

    public function bill()
    {
        return $this->hasMany(TimonShopBills::class, 'buy_option_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TimonShopUser;
use App\Models\TimonShopBuyOptionProduct;
use App\Models\TimonShopProduct;

class TimonShopOrders extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'buy_option_id ',
        'order_quantity',
        'order_price',
        'created_at',
    ];

    public function user()
    {
        return $this->belongsTo(TimonShopUser::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(TimonShopProduct::class, 'product_id');
    }

    public function buy_option()
    {
        return $this->belongsTo(TimonShopBuyOptionProduct::class, 'buy_option_id');
    }
}

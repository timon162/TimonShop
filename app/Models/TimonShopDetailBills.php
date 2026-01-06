<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TimonShopBills;
use App\Models\TimonShopBuyOptionProduct;
use App\Models\TimonShopProduct;

class TimonShopDetailBills extends Model
{
    protected $fillable = [
        'bill_id',
        'product_id',
        'buy_option_id ',
        'bill_quantity',
        'bill_price',
        'created_at',
    ];

    public function bill()
    {
        return $this->belongsTo(TimonShopBills::class, 'bill_id');
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

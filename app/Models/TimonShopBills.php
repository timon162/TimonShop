<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TimonShopUser;
use App\Models\TimonShopDetailBills;


class TimonShopBills extends Model
{
    protected $fillable = [
        'user_id',
        'total_price_bill',
        'created_at',
    ];

    public function user()
    {
        return $this->belongsTo(TimonShopUser::class, 'user_id');
    }

    public function detailBill()
    {
        return $this->hasMany(TimonShopDetailBills::class, 'bill_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TimonShopProduct;

class TimonShopSupplier extends Model
{
    protected $fillable = [
        'supplier_name',
        'supplier_image	'
    ];

    public function product()
    {
        return $this->hasMany(TimonShopProduct::class, 'supplier_id');
    }
}

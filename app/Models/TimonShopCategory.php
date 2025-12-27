<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TimonShopProduct;

class TimonShopCategory extends Model
{
    protected $fillable = [
        'category_name',
        'category_image	'
    ];

    public function product()
    {
        return $this->hasMany(TimonShopProduct::class, 'category_id');
    }
}

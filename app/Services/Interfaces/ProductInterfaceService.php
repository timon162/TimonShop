<?php

namespace App\Services\Interfaces;

use App\Models\TimonShopProduct;

interface ProductInterfaceService
{
    public function postProduct($data, $urlImgDecriptions): TimonShopProduct;
}

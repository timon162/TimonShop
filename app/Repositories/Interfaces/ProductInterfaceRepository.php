<?php

namespace App\Repositories\Interfaces;

use App\Models\TimonShopProduct;

interface ProductInterfaceRepository
{
    public function postProduct($data, $urlImgDecriptions): TimonShopProduct;
}

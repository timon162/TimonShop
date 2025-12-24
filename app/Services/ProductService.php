<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductInterfaceRepository;
use App\Services\Interfaces\ProductInterfaceService;
use App\Models\TimonShopProduct;

class ProductService implements ProductInterfaceService
{
    public function __construct(protected ProductInterfaceRepository $repoProduct) {}

    public function postProduct($data, $urlImgDecriptions): TimonShopProduct
    {
        $product = $this->repoProduct->postProduct($data, $urlImgDecriptions);
        return $product;
    }
}

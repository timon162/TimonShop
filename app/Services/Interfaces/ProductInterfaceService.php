<?php

namespace App\Services\Interfaces;

use App\Models\TimonShopProduct;
use Illuminate\Support\Collection;
use App\Results\DetailProductResult;
use App\Results\ProductResult;

interface ProductInterfaceService
{
    public function postProduct(array $data): TimonShopProduct;

    public function getProduct(): ProductResult;

    public function getProductById(int $id): TimonShopProduct;

    public function getImageDescriptionById(int $id): Collection;

    public function getBasicOptionById(int $id): Collection;

    public function getBuyOptionById(int $id): Collection;

    public function detailProduct(int $id): DetailProductResult;
}

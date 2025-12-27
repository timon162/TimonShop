<?php

namespace App\Repositories\Interfaces;

use App\Models\TimonShopProduct;
use Illuminate\Support\Collection;
use App\Models\TimonShopImgDescriptionProduct;

interface ProductInterfaceRepository
{
    public function postProduct(array $data, array $urlImgDecriptions): TimonShopProduct;

    public function getProduct(): Collection;

    public function getProductById(int $id): TimonShopProduct;

    public function getImageDescriptionById(int $id): Collection;

    public function getBasicOptionById(int $id): Collection;

    public function getBuyOptionById(int $id): Collection;
}

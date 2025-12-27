<?php

namespace App\Services\Interfaces;

use App\Models\TimonShopProduct;
use Illuminate\Support\Collection;

interface ProductInterfaceService
{
    public function postProduct(array $data, array $urlImgDecriptions): TimonShopProduct;

    public function getProduct(): Collection;

    public function getBill(): int;

    public function getProductById(int $id): TimonShopProduct;

    public function getImageDescriptionById(int $id): Collection;

    public function addToCart(int $id, array $cartSession): array;

    public function updateCart(array $request): array;

    public function getBasicOptionById(int $id): Collection;

    public function getBuyOptionById(int $id): Collection;
}

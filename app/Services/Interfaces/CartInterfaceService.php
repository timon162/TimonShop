<?php

namespace App\Services\Interfaces;

use App\Results\CartResult;
use App\Models\TimonShopBills;

interface CartInterfaceService
{
    public function getTotalPriceCart(): CartResult;

    public function addToCart(int $id): void;

    public function updateCart(array $idAndQuantityProduct): void;

    public function postBill(): TimonShopBills;
}

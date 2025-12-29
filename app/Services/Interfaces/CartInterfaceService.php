<?php

namespace App\Services\Interfaces;

use App\Results\CartResult;

interface CartInterfaceService
{
    public function getTotalPriceCart(array $cart): CartResult;

    public function addToCart(int $id, array $cartSession): CartResult;

    public function updateCart(array $idAndQuantityProduct): CartResult;
}

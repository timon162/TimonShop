<?php

namespace App\Results;

class CartResult
{
    public function __construct(
        public array $cartSession,
        public int $totalCart
    ) {}
}

<?php

namespace App\Results;

class ProductResult
{
    public array $data;

    public function __construct(array $category)
    {
        $this->data = [
            'product' => $category
        ];
    }
}

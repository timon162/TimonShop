<?php

namespace App\Results;

class CartResult
{
    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }
}

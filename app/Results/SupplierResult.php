<?php

namespace App\Results;

class SupplierResult
{
    public array $data;

    public function __construct(array $supplier)
    {
        $this->data = [
            'supplier' => $supplier
        ];
    }
}

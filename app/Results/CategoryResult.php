<?php

namespace App\Results;

class CategoryResult
{
    public array $data;

    public function __construct(array $category)
    {
        $this->data = [
            'category' => $category
        ];
    }
}

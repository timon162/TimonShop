<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;
use App\Results\BooleanResult;
use App\Results\CategoryResult;

interface CategoryInterfaceService
{
    public function postCategory(array $data): void;

    public function getCategory(): CategoryResult;

    public function deleteCategory(int $id): void;

    public function updateCategory(array $data): void;
}

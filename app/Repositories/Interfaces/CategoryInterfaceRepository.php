<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface CategoryInterfaceRepository
{
    public function postCategory(array $data): bool;

    public function getCategory(): Collection;

    public function deleteCategory(int $id): int;

    public function updateCategory(int $id, array $data): bool;
}

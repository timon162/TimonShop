<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface CategoryInterfaceRepository
{
    public function postCategory(array $data): bool;

    public function getCategory(): Collection;
}

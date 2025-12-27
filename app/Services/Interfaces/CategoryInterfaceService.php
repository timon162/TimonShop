<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;

interface CategoryInterfaceService
{
    public function postCategory(array $data): bool;

    public function getCategory(): Collection;
}

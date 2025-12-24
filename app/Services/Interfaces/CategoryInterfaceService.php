<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;

interface CategoryInterfaceService
{
    public function postCategory($data): int;

    public function getCategory(): Collection;
}

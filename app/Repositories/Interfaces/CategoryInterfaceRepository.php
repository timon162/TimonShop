<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface CategoryInterfaceRepository
{
    public function postCategory($data): int;

    public function getCategory(): Collection;
}

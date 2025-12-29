<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;
use App\Results\BooleanResult;

interface CategoryInterfaceService
{
    public function postCategory(array $data): void;

    public function getCategory(): Collection;
}

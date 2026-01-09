<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;
use App\Results\SupplierResult;

interface UserInterfaceService
{
    public function updateProfile(array $data): void;
}

<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;

interface SupplierInterfaceService
{
    public function postSupplier($data): int;
    public function getSupplier(): Collection;
}

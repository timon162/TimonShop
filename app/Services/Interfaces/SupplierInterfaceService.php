<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;

interface SupplierInterfaceService
{
    public function postSupplier(array $data): bool;
    public function getSupplier(): Collection;
}

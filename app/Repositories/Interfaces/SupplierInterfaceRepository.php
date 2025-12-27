<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface SupplierInterfaceRepository
{
    public function postSupplier($data): bool;

    public function getSupplier(): Collection;
}

<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface SupplierInterfaceRepository
{
    public function postSupplier($data): int;
    public function getSupplier(): Collection;
}

<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface SupplierInterfaceRepository
{
    public function postSupplier(array $data): bool;

    public function getSupplier(): Collection;

    public function deleteSupplier(int $id): int;

    public function updateSupplier(int $id, array $data): bool;
}

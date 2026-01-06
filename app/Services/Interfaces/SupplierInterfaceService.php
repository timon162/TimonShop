<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;
use App\Results\SupplierResult;

interface SupplierInterfaceService
{
    public function postSupplier(array $data): void;

    public function getSupplier(): SupplierResult;

    public function deleteSupplier(int $id): void;

    public function updateSupplier(array $data): void;
}

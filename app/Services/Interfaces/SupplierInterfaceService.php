<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;

interface SupplierInterfaceService
{
    public function postSupplier(array $data);
    public function getSupplier(): Collection;
}

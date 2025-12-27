<?php

namespace App\Services;

use App\Repositories\Interfaces\SupplierInterfaceRepository;
use App\Services\Interfaces\SupplierInterfaceService;
use Illuminate\Support\Collection;

class SupplierService implements SupplierInterfaceService
{

    public function __construct(protected SupplierInterfaceRepository $supplierRepo) {}

    public function postSupplier($data): bool
    {
        $response = $this->supplierRepo->postSupplier($data);
        return $response;
    }

    public function getSupplier(): Collection
    {
        $response = $this->supplierRepo->getSupplier();

        return $response;
    }
}

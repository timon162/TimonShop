<?php

namespace App\Services;

use App\Repositories\Interfaces\SupplierInterfaceRepository;
use App\Services\Interfaces\SupplierInterfaceService;
use Illuminate\Support\Collection;
use App\Exceptions\SupplierException;

class SupplierService implements SupplierInterfaceService
{

    public function __construct(protected SupplierInterfaceRepository $supplierRepo) {}

    public function postSupplier($data)
    {
        $response = $this->supplierRepo->postSupplier($data);
        if ($response == false) {
            throw new SupplierException('post supplier thất bại');
        }
        return $response;
    }

    public function getSupplier(): Collection
    {
        $response = $this->supplierRepo->getSupplier();
        if (!$response) {
            throw new SupplierException();
        }
        return $response;
    }
}

<?php

namespace App\Services;

use App\Repositories\Interfaces\SupplierInterfaceRepository;
use App\Services\Interfaces\SupplierInterfaceService;
use Illuminate\Support\Collection;
use App\Exceptions\SupplierException;

class SupplierService implements SupplierInterfaceService
{

    public function __construct(protected SupplierInterfaceRepository $supplierRepo) {}

    public function postSupplier($data): void
    {
        $requestData = [];

        foreach ($data['item_supplier'] as $items) {
            $urlCaterogy = null;
            $path = $items['file_img']->store('supplier', 'public');
            $urlCaterogy = asset('storage/' . $path);

            $requestData[] = [
                'supplier_name'   => $items['name'],
                'supplier_is_hot' => $items['check_hot'],
                'supplier_image'  => $urlCaterogy,
                'created_at'      => now(),
            ];
        }
        $response = $this->supplierRepo->postSupplier($requestData);
        if ($response == false) {
            throw new SupplierException('post supplier thất bại');
        }
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

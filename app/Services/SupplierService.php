<?php

namespace App\Services;

use App\Exceptions\NullException;
use App\Repositories\Interfaces\SupplierInterfaceRepository;
use App\Services\Interfaces\SupplierInterfaceService;
use Illuminate\Support\Collection;
use App\Exceptions\SupplierException;
use App\Results\SupplierResult;

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

    public function getSupplier(): SupplierResult
    {
        $response = $this->supplierRepo->getSupplier();
        if (!$response) {
            throw new SupplierException();
        }
        $supplier = $response->map(fn($items) => [
            'supplierId' => $items->id,
            'supplierName' => $items->supplier_name,
            'supplierImage' => $items->supplier_image,
        ])->toArray();
        return new SupplierResult($supplier);
    }

    public function deleteSupplier(int $id): void
    {
        $result = $this->supplierRepo->deleteSupplier($id);
        if ($result === 0) {
            throw new NullException('sản phẩm không tồn tại');
        }
    }
    public function updateSupplier(array $data): void
    {
        $id = $data['supplier_id'];

        $dataSupplier = ['supplier_name' => $data['supplier_name']];

        if (isset($data['supplier_img'])) {
            $path = $data['supplier_img']->store('supplier', 'public');
            $dataSupplier['supplier_image'] = asset('storage/' . $path);
        }

        $result = $this->supplierRepo->updateSupplier($id, $dataSupplier);
        if ($result === false) {
            throw new FalseException();
        }
    }
}

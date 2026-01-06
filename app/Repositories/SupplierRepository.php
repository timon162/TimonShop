<?php

namespace App\Repositories;

use App\Models\TimonShopSupplier;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\SupplierInterfaceRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;


class SupplierRepository implements SupplierInterfaceRepository
{
    public function postSupplier(array $data): bool
    {
        $supplier = DB::table('timon_shop_suppliers')->insert($data);
        return $supplier;
    }

    public function getSupplier(): Collection
    {
        $supplier = DB::table('timon_shop_suppliers')->get();
        return  $supplier;
    }

    public function deleteSupplier(int $id): int
    {
        $supplier = DB::table('timon_shop_suppliers')->where('id', $id)->delete();
        return $supplier;
    }

    public function updateSupplier(int $id, array $data): bool
    {
        $supplier = DB::table('timon_shop_suppliers')->where('id', $id)->update(Arr::only($data, [
            'supplier_image',
            'supplier_name',
        ]));
        return $supplier;
    }
}

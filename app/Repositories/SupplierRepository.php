<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\SupplierInterfaceRepository;
use Illuminate\Support\Collection;

class SupplierRepository implements SupplierInterfaceRepository
{
    public function postSupplier($data): int
    {
        $supplier = DB::table('timon_shop_suppliers')->insert($data);
        return $supplier;
    }

    public function getSupplier(): Collection
    {
        $supplier = DB::table('timon_shop_suppliers')->get();
        return  $supplier;
    }
}

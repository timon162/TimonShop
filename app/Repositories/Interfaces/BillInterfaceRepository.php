<?php

namespace App\Repositories\Interfaces;

use App\Models\TimonShopBills;
use Illuminate\Support\Collection;

interface BillInterfaceRepository
{
    public function getBill(): Collection;

    public function postBill(array $bill, array $detailBill): TimonShopBills;
}

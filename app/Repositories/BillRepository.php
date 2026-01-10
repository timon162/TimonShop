<?php

namespace App\Repositories;

use App\Models\TimonShopDetailBills;
use App\Repositories\Interfaces\BillInterfaceRepository;
use App\Models\TimonShopBills;
use Illuminate\Support\Collection;

class BillRepository implements BillInterfaceRepository
{

    public function getBill(): Collection
    {
        $bill = TimonShopBills::with('user', 'product', 'buy_option')->get();
        return $bill;
    }

    public function postBill(array $bill, array $detailBill): TimonShopBills
    {
        $bill = TimonShopBills::create($bill);

        foreach ($detailBill as $item) {
            $bill->detailBill()->create($item);
        }

        return $bill;
    }
}

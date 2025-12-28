<?php

namespace App\Repositories;

use App\Repositories\Interfaces\OrderInterfaceRepository;
use App\Models\TimonShopOrders;
use Illuminate\Support\Collection;

class OrderRepository implements OrderInterfaceRepository
{

    public function getOrder(): Collection
    {
        $order = TimonShopOrders::with('user', 'product', 'buy_option')->get();
        return $order;
    }
}

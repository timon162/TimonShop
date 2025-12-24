<?php

namespace App\Repositories;


use App\Repositories\Interfaces\ProductInterfaceRepository;
use Illuminate\Support\Facades\DB;
use App\Models\TimonShopProduct;


class ProductRepository implements ProductInterfaceRepository
{
    public function postProduct($data, $urlImgDecriptions): TimonShopProduct
    {
        $product = TimonShopProduct::create($data);
        foreach ($urlImgDecriptions as $items) {
            $product->imgDescription()->create([
                'image_url' => $items,
            ]);
        }
        return $product;
    }
}

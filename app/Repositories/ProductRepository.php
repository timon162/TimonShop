<?php

namespace App\Repositories;

use App\Models\TimonShopImgDescriptionProduct;
use App\Repositories\Interfaces\ProductInterfaceRepository;
use Illuminate\Support\Facades\DB;
use App\Models\TimonShopProduct;
use Illuminate\Support\Collection;
use App\Models\TimonShopBasicOptionProduct;
use App\Models\TimonShopBuyOptionProduct;

class ProductRepository implements ProductInterfaceRepository
{
    public function postProduct(array $data, array $urlImgDecriptions): TimonShopProduct
    {
        $product = TimonShopProduct::create($data);
        foreach ($urlImgDecriptions as $items) {
            $product->imgDescription()->create([
                'image_url' => $items,
            ]);
        }
        foreach ($data['basicOption'] as $items) {
            $product->basicOption()->create([
                'basic_option_name' => $items['name'],
                'basic_option_description' => $items['detail']
            ]);
        }
        foreach ($data['buyOption'] as $items) {
            $product->buyOption()->create([
                'buy_option_name' => $items['name'],
                'buy_option_description' => $items['detail'],
                'buy_option_price' => $items['price']
            ]);
        }
        return $product;
    }

    public function getProduct(): Collection
    {
        $product = TimonShopProduct::with(['category', 'supplier'])->get();
        return $product;
    }

    public function getImageDescriptionById(int $id): Collection
    {
        $imageDescription = TimonShopImgDescriptionProduct::with('product')->where('product_id', $id)->get();
        return $imageDescription;
    }

    public function getBasicOptionById(int $id): Collection
    {
        $basicOption = TimonShopBasicOptionProduct::with('product')->where('product_id', $id)->get();
        return $basicOption;
    }

    public function getBuyOptionById(int $id): Collection
    {
        $buyOption = TimonShopBuyOptionProduct::with('product')->where('product_id', $id)->get();
        return $buyOption;
    }

    public function getProductById($id): TimonShopProduct
    {
        $product = TimonShopProduct::with(['category', 'supplier'])->findOrFail($id);

        return $product;
    }
}

<?php

namespace App\Results;

use App\Models\TimonShopProduct;
use Illuminate\Support\Collection;

class DetailProductResult
{
    public array $data;

    public function __construct(TimonShopProduct $product, array $nameBuyOption, array $showOption, array $imageDescription, array $basicOption, array $buyOption)
    {
        $this->data = [
            'productImage' => $product->product_image,
            'productName' => $product->product_name,
            'productCode' => $product->product_code,
            'productId' => $product->id,
            'productPrice' => $product->product_price,
            'productQuantity' => $product->product_quantity,
            'productDecription' => $product->product_decription,
            'categoryName' => $product->category->category_name,
            'categoryImage' => $product->category->category_image,
            'supplierName' => $product->supplier->supplier_name,
            'supplierImage' => $product->supplier->supplier_image,
            'categoryId' => $product->category->id,
            'supplierId' => $product->supplier->id,
            'nameBuyOption' => $nameBuyOption,
            'showOption' => $showOption,
            'imageDescription' => $imageDescription,
            'basicOption' => $basicOption,
            'buyOption' => $buyOption,
        ];
    }
}

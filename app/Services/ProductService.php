<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductInterfaceRepository;
use App\Services\Interfaces\ProductInterfaceService;
use App\Models\TimonShopProduct;
use Illuminate\Support\Collection;
use App\Exceptions\ProductException;

class ProductService implements ProductInterfaceService
{
    public function __construct(protected ProductInterfaceRepository $repoProduct) {}

    public function postProduct(array $data): TimonShopProduct
    {
        $urlImgDecriptions = [];

        foreach ($data['imgDescription'] as $items) {
            $path = $items->store('img_decription_product', 'public');
            $urlImg = asset('storage/' . $path);
            $urlImgDecriptions[] = $urlImg;
        }

        if ($data['file_main_img_product']) {
            $path = $data['file_main_img_product']->store('supplier', 'public');
            $urlCaterogy = asset('storage/' . $path);
        }

        $postData = [
            'product_name' => $data['name_create_product'],
            'category_id' => $data['category_select'],
            'supplier_id' => $data['supplier_select'],
            'product_price' => $data['price_create_product'],
            'product_quantity' => $data['quantity_create_product'],
            'product_image' => $urlCaterogy,
            'product_code' => $data['code_create_product'],
            'product_decription' => $data['decription_create_product'],
            'basicOption' => $data['basicOptions'],
            'buyOption' => $data['buyOptions'],
            'created_at' => now(),
        ];

        $product = $this->repoProduct->postProduct($postData, $urlImgDecriptions);

        if (!$product) {
            throw new ProductException();
        }
        return $product;
    }

    public function getProductById(int $id): TimonShopProduct
    {
        $product = $this->repoProduct->getProductById($id);
        return $product;
    }

    public function getImageDescriptionById(int $id): Collection
    {
        $imageDescription = $this->repoProduct->getImageDescriptionById($id);
        return $imageDescription;
    }

    public function getProduct(): Collection
    {
        $product = $this->repoProduct->getProduct();
        return $product;
    }

    public function getBasicOptionById(int $id): Collection
    {
        $basicOption = $this->repoProduct->getBasicOptionById($id);
        return $basicOption;
    }

    public function getBuyOptionById(int $id): Collection
    {
        $buyOption = $this->repoProduct->getBuyOptionById($id);
        return $buyOption;
    }
}

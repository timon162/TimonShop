<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductInterfaceRepository;
use App\Services\Interfaces\ProductInterfaceService;
use App\Models\TimonShopProduct;
use Illuminate\Support\Collection;
use App\Exceptions\ProductException;
use App\Results\DetailProductResult;
use App\Results\ProductResult;
use Illuminate\Cache\RateLimiting\Limit;

use function PHPSTORM_META\map;

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

    public function deleteProduct(int $id): void
    {
        $result = $this->repoProduct->deleteProduct($id);
        if ($result === 0) {
            throw new FalseException();
        };
    }

    public function updateProduct(array $data): void
    {

        $urlCategory = null;
        $urlImgDecriptions = [];

        if (!empty($data['updateImgDescription'])) {
            foreach ($data['updateImgDescription'] as $items) {
                $path = $items->store('img_decription_product', 'public');
                $urlImg = asset('storage/' . $path);
                $urlImgDecriptions[] = $urlImg;
            }
        }

        if (!empty($data['oldImageDecription'])) {
            foreach ($data['oldImageDecription'] as $old) {
                $urlImgDecriptions[] = $old['image'];
            }
        }

        if (!empty($data['file_main_img_update_product'])) {
            $path = $data['file_main_img_update_product']->store('supplier', 'public');
            $urlCategory = asset('storage/' . $path);
        }

        $postData = [
            'product_id' => $data['product_id'],
            'product_name' => $data['name_update_product'],
            'category_id' => $data['update_category_select'],
            'supplier_id' => $data['update_supplier_select'],
            'product_price' => $data['price_update_product'],
            'product_quantity' => $data['quantity_update_product'],
            'product_image' => $urlCategory,
            'product_code' => $data['code_update_product'],
            'product_decription' => $data['decription_update_product'],
            'basicOption' => $data['updateBasicOptions'],
            'buyOption' => $data['updateBuyOptions'],
            'created_at' => now(),
        ];

        foreach ($postData as $key => $newPostData) {
            if (empty($newPostData)) {
                unset($postData[$key]);
            }
        }

        $product = $this->repoProduct->updateProduct($postData, $urlImgDecriptions);

        if (!$product) {
            throw new ProductException();
        }
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

    public function getProduct(): ProductResult
    {
        $response = $this->repoProduct->getProduct();
        $product = $response->map(fn($items) => [
            'productImage' => $items->product_image,
            'productName' => $items->product_name,
            'productCode' => $items->product_code,
            'productId' => $items->id,
            'productPrice' => $items->product_price,
            'productQuantity' => $items->product_quantity,
            'productDecription' => $items->product_decription,
            'categoryName' => $items->category->category_name,
            'categoryImage' => $items->category->category_image,
            'supplierName' => $items->supplier->supplier_name,
            'supplierImage' => $items->supplier->supplier_image,
        ])->toArray();
        return new ProductResult($product);
    }

    public function detailProduct(int $id): DetailProductResult
    {
        $product = $this->getProductById($id);
        $dataBasicOption = $this->getBasicOptionById($id);
        $dataBuyOption = $this->getBuyOptionById($id);
        $dataImageDescription = $this->getImageDescriptionById($id);
        $dataShowOption = $dataBasicOption->take(3);
        $showOption = $dataShowOption->toArray();

        $basicOption = $dataBasicOption->map(
            fn($items) => [
                'basicOptionName' => $items->basic_option_name,
                'basicOptionDescription' => $items->basic_option_description,
            ]
        )->toArray();

        $buyOption = $dataBuyOption->map(
            fn($items) => [
                'buyOptionName' => $items->buy_option_name,
                'buyOptionDescription' => $items->buy_option_description,
                'buyOptionPrice' => $items->buy_option_price,
            ]
        )->toArray();

        $nameBuyOption = $dataBuyOption->groupBy('buy_option_name')->map(
            fn($items) => $items->map(
                fn($i) => [
                    'buyOptionDescription' => $i->buy_option_description,
                ]
            )->toArray()
        )->toArray();

        $imageDescription = $dataImageDescription->map(
            fn($items) => [
                'imageUrl' => $items->image_url,
            ]
        )->toArray();

        return new DetailProductResult($product, $nameBuyOption, $showOption, $imageDescription, $basicOption, $buyOption);
    }
}

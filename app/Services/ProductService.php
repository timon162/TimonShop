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

    public function postProduct(array $data, array $urlImgDecriptions): TimonShopProduct
    {
        $product = $this->repoProduct->postProduct($data, $urlImgDecriptions);
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

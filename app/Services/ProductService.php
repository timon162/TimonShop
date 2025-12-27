<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductInterfaceRepository;
use App\Services\Interfaces\ProductInterfaceService;
use App\Models\TimonShopProduct;
use Illuminate\Support\Collection;

class ProductService implements ProductInterfaceService
{
    public function __construct(protected ProductInterfaceRepository $repoProduct) {}

    public function postProduct(array $data, array $urlImgDecriptions): TimonShopProduct
    {
        $product = $this->repoProduct->postProduct($data, $urlImgDecriptions);
        return $product;
    }

    public function getBill(): int
    {
        $cart = session('cart', []);
        $priceBill = 0;

        foreach ($cart as $item) {
            $priceBill += $item['total_price_product'];
        }

        return $priceBill;
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

    public function addToCart(int $id, array $cartSession): array
    {
        $product = $this->repoProduct->getProductById($id);
        if (isset($cartSession[$id])) {
            $totalQuantity = $cartSession[$id]['product_quantity'] += 1;
            $cartSession[$id]['total_price_product'] = $totalQuantity * $cartSession[$id]['product_price'];
        } else {
            $cartSession[$id] = [
                'product_id' => $product->id,
                'product_name'       => $product->product_name,
                'product_price'      => $product->product_price,
                'product_image'      => $product->product_image,
                'product_category'  => $product->category->category_name,
                'product_supplier'  => $product->supplier->supplier_name,
                'product_quantity'   => 1,
                'total_price_product'   => $product->product_price,
            ];
        }

        return $cartSession;
    }

    public function updateCart(array $request): array
    {
        $cart = session('cart', []);

        if (!isset($cart[$request['product_id']])) {
            return $cart;
        }
        $cart[$request['product_id']]['product_quantity'] = $request['quantity'];
        $cart[$request['product_id']]['total_price_product'] = $cart[$request['product_id']]['product_price'] * $request['quantity'];

        if ($request['quantity'] <= 0) {
            unset($cart[$request['product_id']]);
        }

        session(['cart' => $cart]);

        return $cart;
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

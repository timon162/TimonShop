<?php

namespace App\Services;

use App\Exceptions\ProductException;
use App\Results\CartResult;
use App\Services\Interfaces\CartInterfaceService;
use App\Repositories\Interfaces\ProductInterfaceRepository;

class CartService implements CartInterfaceService
{
    public function __construct(protected ProductInterfaceRepository $repoProduct) {}

    public function getTotalPriceCart(array $cartSession): CartResult
    {
        $priceTotalCart = 0;

        foreach ($cartSession as $item) {
            $priceTotalCart += $item['total_price_product'];
        }

        return new CartResult(
            cartSession: $cartSession,
            totalCart: $priceTotalCart,
        );
    }

    public function addToCart(int $id, array $cartSession): CartResult
    {
        $product = $this->repoProduct->getProductById($id);

        if (!$product) {
            throw new ProductException();
        }

        if (isset($cartSession[$id])) {
            $cartSession[$id]['product_quantity']++;
            $cartSession[$id]['total_price_product'] = $cartSession[$id]['product_quantity'] * $cartSession[$id]['product_price'];
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

        return $this->getTotalPriceCart($cartSession);
    }

    public function updateCart(array $idAndQuantityProduct): CartResult
    {
        $cart = session('cart', []);
        $productId = $idAndQuantityProduct['product_id'];

        if (!isset($cart[$productId])) {
            throw new ProductException();
        }
        $cart[$productId]['product_quantity'] = $idAndQuantityProduct['quantity'];
        $cart[$productId]['total_price_product'] = $cart[$productId]['product_price'] * $idAndQuantityProduct['quantity'];

        if ($idAndQuantityProduct['quantity'] <= 0) {
            unset($cart[$productId]);
        }

        session(['cart' => $cart]);

        return $this->getTotalPriceCart($cart);
    }
}

<?php

namespace App\Services;

use App\Exceptions\ProductException;
use App\Results\CartResult;
use App\Services\Interfaces\CartInterfaceService;
use App\Repositories\Interfaces\ProductInterfaceRepository;
use App\Repositories\Interfaces\BillInterfaceRepository;
use App\Exceptions\BillException;
use App\Exceptions\NullException;
use App\Models\TimonShopBills;

class CartService implements CartInterfaceService
{
    public function __construct(
        protected ProductInterfaceRepository $repoProduct,
        protected BillInterfaceRepository $billRepo
    ) {}

    public function setTotalCart(array $cartSession): CartResult
    {
        $priceTotalCart = 0;

        foreach ($cartSession as $item) {
            $priceTotalCart += $item['total_price_product'];
        }

        return new CartResult([
            'cart' => $cartSession,
            'totalCart' => $priceTotalCart,
        ]);
    }

    public function getTotalPriceCart(): CartResult
    {
        $cartSession = session('cart', []);
        return $this->setTotalCart($cartSession);
    }

    public function addToCart(int $id): void
    {
        $cartSession = session('cart', []);
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
        session(['cart' => $cartSession]);
    }

    public function updateCart(array $idAndQuantityProduct): void
    {
        $cartSession = session('cart', []);
        $productId = $idAndQuantityProduct['product_id'];

        if (!isset($cartSession[$productId])) {
            throw new ProductException();
        }
        $cartSession[$productId]['product_quantity'] = $idAndQuantityProduct['quantity'];
        $cartSession[$productId]['total_price_product'] = $cartSession[$productId]['product_price'] * $idAndQuantityProduct['quantity'];

        if ($idAndQuantityProduct['quantity'] <= 0) {
            unset($cartSession[$productId]);
        }

        session(['cart' => $cartSession]);
    }

    public function postBill(): TimonShopBills
    {
        $dataSessionCart = [];
        $cart = session('cart', []);
        $totalBill = 0;

        if (empty($cart)) {
            throw new NullException('chưa có sản phẩm');
        }
        foreach ($cart as $items) {

            $totalBill += $items['total_price_product'];

            $dataSessionCart[] = [
                'product_id' => $items['product_id'],
                'buy_option_id' => 5,
                'bill_quantity' =>  $items['product_quantity'],
                'bill_price' => $items['total_price_product'],
                'created_at' => now(),
            ];
        }

        $dataUser = [
            'user_id' => auth()->id(),
            'total_price_bill' => $totalBill,
            'created_at' => now(),
        ];

        $dataBill = $this->billRepo->postBill($dataUser, $dataSessionCart);

        if (!$dataBill) {
            throw new BillException();
        }

        session()->forget('cart');
        return  $dataBill;
    }
}

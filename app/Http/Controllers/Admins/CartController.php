<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCartRequest;
use Illuminate\Http\Request;
use App\Services\Interfaces\ProductInterfaceService;
use App\Http\Requests\ProductIdRequest;


class CartController extends Controller
{
    public function __construct(
        protected ProductInterfaceService $productService,
    ) {}

    public function viewCart()
    {
        $priceBill = $this->productService->getBill();
        return view('admins.content_admins.content_carts.cart_view', ['cart' => session('cart', []), 'priceBill' => $priceBill]);
    }

    public function addToCart(ProductIdRequest $id)
    {
        $cartSession = session('cart', []);
        $productId = $id->validated()['product_id'];

        $cart = $this->productService->addToCart($productId, $cartSession);

        if (!$cart) {
            return response()->json(['mess' => 'Chưa thêm dc vào giỏ hàng!']);
        }
        session(['cart' => $cart]);

        return response()->json(['mess' => 'Đã thêm vào giỏ hàng!']);
    }

    public function updateCart(ProductCartRequest $request)
    {

        $response = $this->productService->updateCart($request->validated());
        return $response;
    }

    public function deleteCart()
    {
        // $cart = session('cart', []);

        // unset($cart[$id]);

        // session(['cart' => $cart]);
        session()->forget('cart');
    }
}

<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCartRequest;
use App\Services\Interfaces\CartInterfaceService;
use App\Http\Requests\ProductIdRequest;
use Illuminate\Http\JsonResponse;
use App\Exceptions\ProductException;
use App\Results\CartResult;

class CartController extends Controller
{
    public function __construct(
        protected CartInterfaceService $carttService,
    ) {}

    public function viewCart()
    {
        $cartSession = session('cart', []);
        $cartResult = $this->carttService->getTotalPriceCart($cartSession);

        return view('admins.content_admins.content_carts.cart_view', [
            'cart' => $cartResult->cartSession,
            'totalCart' => $cartResult->totalCart,
        ]);
    }

    public function addToCart(ProductIdRequest $id): JsonResponse
    {
        try {
            $cart = session('cart', []);

            $product_id = $id->validated()['product_id'];

            $result = $this->carttService->addToCart($product_id, $cart);

            session(['cart' => $result->cartSession]);


            return response()->json(['success' => 'Add to cart'], 201);
        } catch (ProductException $error) {
            return response()->json(['error' => $error->getMessage()], 404);
        }
    }

    public function updateCart(ProductCartRequest $idAndQuantityProduct): JsonResponse
    {
        try {
            $this->carttService->updateCart($idAndQuantityProduct->validated());

            return response()->json(['success' => 'Add to cart'], 201);
        } catch (ProductException $error) {
            return response()->json(['error' => $error->getMessage()], 404);
        }
    }

    public function deleteCart()
    {
        session()->forget('cart');
    }
}

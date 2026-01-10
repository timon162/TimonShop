<?php

namespace App\Http\Controllers\Admins;

use App\Exceptions\BillException;
use App\Exceptions\NullException;
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
        $cartViewResult = $this->carttService->getTotalPriceCart()->data;

        return view('admins.content_admins.content_carts.cart_view', $cartViewResult);
    }

    public function userViewCart()
    {
        $cartViewResult = $this->carttService->getTotalPriceCart()->data;

        return view('users.content_users.content_carts.cart_view', $cartViewResult);
    }

    public function addToCart(ProductIdRequest $id): JsonResponse
    {
        $product_id = $id->validated()['product_id'];

        try {
            $this->carttService->addToCart($product_id);
            return response()->json(['success' => 'Add to cart'], 201);
        } catch (ProductException $error) {
            return response()->json(['error' => $error->getMessage()], 404);
        }
    }

    public function updateCart(ProductCartRequest $idAndQuantityProduct): JsonResponse
    {
        try {
            $this->carttService->updateCart($idAndQuantityProduct->validated());
            return response()->json(['success' => 'update cart'], 201);
        } catch (ProductException $error) {
            return response()->json(['error' => $error->getMessage()], 404);
        }
    }

    public function createBill()
    {
        try {
            $this->carttService->postBill();
            return response()->json(['success' => 'thanh toán thành công'], 201);
        } catch (BillException | NullException  $error) {
            return response()->json(['error' => $error->getMessage()], 404);
        }
    }

    public function deleteCart()
    {
        session()->forget('cart');
    }
}

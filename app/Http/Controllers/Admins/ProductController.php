<?php

namespace App\Http\Controllers\Admins;

use App\Exceptions\CategoryException;
use App\Exceptions\ProductException;
use App\Exceptions\SupplierException;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\SupplierRequest;
use App\Http\Requests\CreateProductRequest;
use App\Services\Interfaces\SupplierInterfaceService;
use App\Services\Interfaces\CategoryInterfaceService;
use App\Services\Interfaces\ProductInterfaceService;
use App\Http\Requests\ProductIdRequest;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct(
        protected CategoryInterfaceService $categoryService,
        protected SupplierInterfaceService $supplierService,
        protected ProductInterfaceService $productService,
    ) {}

    public function viewAddproduct()
    {
        $getSupplier = $this->supplierService->getSupplier();
        $getCategory = $this->categoryService->getCategory();
        return view(
            'admins.content_admins.content_add_products.main_add_product',
            ['dataSupplier' => $getSupplier, 'dataCategory' => $getCategory]
        );
    }

    public function viewInformationproduct()
    {
        $getproduct = $this->productService->getProduct();
        $getSupplier = $this->supplierService->getSupplier();
        $getCategory = $this->categoryService->getCategory();
        return view(
            'admins.content_admins.content_information_products.main_information_product',
            ['dataSupplier' => $getSupplier, 'dataCategory' => $getCategory, 'dataProduct' => $getproduct]
        );
    }

    public function postCategory(CategoryRequest $request)
    {
        $validated = $request->validated();
        try {

            $this->categoryService->postCategory($validated);

            return response()->json(['success' => 'Thêm thành công'], 201);
        } catch (CategoryException $error) {
            return response()->json(['error' => $error->getMessage()], 404);
        }
    }

    public function postSupplier(SupplierRequest $request)
    {
        $validated = $request->validated();

        try {
            $this->supplierService->postSupplier($validated);
            return response()->json(['success' => 'Thêm thành công'], 201);
        } catch (SupplierException $error) {
            return response()->json(['error' => $error->getMessage()], 404);
        }
    }

    public function postProduct(CreateProductRequest $request)
    {
        $validated = $request->validated();

        try {
            $product = $this->productService->postProduct($validated);
            return response()->json(['mess' => 'Thêm thành công', 'nameProduct' => $product['product_name']], 201);
        } catch (ProductException $error) {
            return response()->json($error->getMessage(), 401);
        }
    }

    public function viewDetailProduct(int $id)
    {

        $product = $this->productService->getProductById($id);
        $imageDescription = $this->productService->getImageDescriptionById($id);
        $basicOption = $this->productService->getBasicOptionById($id);
        $showOption = $basicOption->take(3);
        $buyOption = $this->productService->getBuyOptionById($id);
        $nameBuyOption = $buyOption->groupBy('buy_option_name');

        return view(
            'admins.content_admins.content_detail_products.detail_view',
            [
                'detailProduct' => $product,
                'imageDescription' => $imageDescription,
                'basicOption' => $basicOption,
                'showOption' => $showOption,
                'nameBuyOption' => $nameBuyOption,
            ]
        );
    }
}

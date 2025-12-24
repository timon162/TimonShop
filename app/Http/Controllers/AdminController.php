<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\SupplierRequest;
use App\Http\Requests\CreateProductRequest;
use App\Services\Interfaces\SupplierInterfaceService;
use App\Services\Interfaces\CategoryInterfaceService;
use App\Services\Interfaces\ProductInterfaceService;

class AdminController extends Controller
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
        $getSupplier = $this->supplierService->getSupplier();
        $getCategory = $this->categoryService->getCategory();
        return view(
            'admins.content_admins.content_information_products.main_information_product',
            ['dataSupplier' => $getSupplier, 'dataCategory' => $getCategory]
        );
    }

    public function postCategory(CategoryRequest $request)
    {
        $validated = $request->validated();
        $requestData = [];

        foreach ($validated['item_category'] as $items) {
            $urlCaterogy = null;
            $path = $items['file_img']->store('category', 'public');
            $urlCaterogy = asset('storage/' . $path);

            $requestData[] = [
                'category_name'   => $items['name'],
                'category_is_hot' => $items['check_hot'],
                'category_image'  => $urlCaterogy,
                'created_at'      => now(),
            ];
        }

        $responseCategory = $this->categoryService->postCategory($requestData);
        if (!$responseCategory) {
            return ['mess' => 'có vấn đề ở repo'];
        }
        return ['mess' => 'Thêm thành công'];
    }

    public function postSupplier(SupplierRequest $request)
    {
        $validated = $request->validated();
        $requestData = [];

        foreach ($validated['item_supplier'] as $items) {
            $urlCaterogy = null;
            $path = $items['file_img']->store('supplier', 'public');
            $urlCaterogy = asset('storage/' . $path);

            $requestData[] = [
                'supplier_name'   => $items['name'],
                'supplier_is_hot' => $items['check_hot'],
                'supplier_image'  => $urlCaterogy,
                'created_at'      => now(),
            ];
        }

        $responseSupplier = $this->supplierService->postSupplier($requestData);
        if (!$responseSupplier) {
            return ['mess' => 'có vấn đề ở repo'];
        }
        return ['mess' => 'Thêm thành công'];
    }

    public function postProduct(CreateProductRequest $request)
    {
        $validated = $request->validated();
        $urlImgDecriptions = [];

        foreach ($validated['imgDescription'] as $items) {
            $path = $items->store('img_decription_product', 'public');
            $urlImg = asset('storage/' . $path);
            $urlImgDecriptions[] = $urlImg;
        }

        if ($validated['file_main_img_product']) {
            $path = $validated['file_main_img_product']->store('supplier', 'public');
            $urlCaterogy = asset('storage/' . $path);
        }

        $postData = [
            'product_name' => $validated['name_create_product'],
            'category_id' => $validated['category_select'],
            'supplier_id' => $validated['supplier_select'],
            'product_price' => $validated['price_create_product'],
            'product_quantity' => $validated['quantity_create_product'],
            'product_image' => $urlCaterogy,
            'product_code' => $validated['code_create_product'],
            'product_decription' => $validated['decription_create_product'],
            'created_at' => now(),
        ];

        $product = $this->productService->postProduct($postData, $urlImgDecriptions);

        if (!$product) {
            return ['mess' => 'Thất bại'];
        }

        return ['mess' => 'Thêm thành công', 'nameProduct' => $product['product_name']];
    }
}

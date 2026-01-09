<?php

namespace App\Http\Controllers\Admins;

use App\Exceptions\CategoryException;
use App\Exceptions\FalseException;
use App\Exceptions\NullException;
use App\Exceptions\ProductException;
use App\Exceptions\SupplierException;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\SupplierRequest;
use App\Http\Requests\CreateProductRequest;
use App\Services\Interfaces\SupplierInterfaceService;
use App\Services\Interfaces\CategoryInterfaceService;
use App\Services\Interfaces\ProductInterfaceService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryIdRequest;
use App\Http\Requests\ProductIdRequest;
use App\Http\Requests\SupplierIdRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateSupplierRequest;

class ProductController extends Controller
{
    public function __construct(
        protected CategoryInterfaceService $categoryService,
        protected SupplierInterfaceService $supplierService,
        protected ProductInterfaceService $productService,
    ) {}

    public function viewAddproduct()
    {
        $dataSupplier = $this->supplierService->getSupplier()->data;
        $dataCategory = $this->categoryService->getCategory()->data;
        return view(
            'admins.content_admins.content_add_products.main_add_product',
            compact('dataSupplier', 'dataCategory')
        );
    }

    public function viewInformationproduct()
    {
        $dataProduct = $this->productService->getProduct()->data;
        $dataSupplier = $this->supplierService->getSupplier()->data;
        $dataCategory = $this->categoryService->getCategory()->data;
        return view(
            'admins.content_admins.content_information_products.main_information_product',
            compact('dataSupplier', 'dataCategory', 'dataProduct')
        );
    }

    public function viewDetailProduct(int $id)
    {
        $detailProduct = $this->productService->detailProduct($id)->data;

        return view(
            'admins.content_admins.content_detail_products.detail_view',
            compact('detailProduct')
        );
    }

    public function viewUpdateProduct(int $id)
    {
        $detailProduct = $this->productService->detailProduct($id)->data;
        $dataSupplier = $this->supplierService->getSupplier()->data;
        $dataCategory = $this->categoryService->getCategory()->data;

        return view('admins.content_admins.content_update_products.update_product', compact('detailProduct', 'dataSupplier', 'dataCategory'));
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

    public function deleteCategory(CategoryIdRequest $request)
    {
        $validated = $request->validated()['category_id'];
        try {
            $this->categoryService->deleteCategory($validated);
            return response()->json(['success' => 'Đã xóa'], 201);
        } catch (FalseException $error) {
            return response()->json(['error' => $error->getMessage()], 404);
        }
    }

    public function updateCategory(UpdateCategoryRequest $request)
    {
        $validated = $request->validated();
        try {
            $this->categoryService->updateCategory($validated);
            return response()->json(['success' => 'Cập nhật thành công'], 201);
        } catch (FalseException $error) {
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

    public function deleteSupplier(SupplierIdRequest $request)
    {
        $validated =  $request->validated()['supplier_id'];
        try {
            $this->supplierService->deleteSupplier($validated);
            return response()->json(['success' => 'Đã xóa'], 201);
        } catch (NullException $error) {
            return response()->json(['error' => $error->getMessage()], 404);
        }
    }

    public function updateSupplier(UpdateSupplierRequest $request)
    {
        $validated = $request->validated();
        try {
            $this->supplierService->updateSupplier($validated);
            return response()->json(['success' => 'cập nhật thành công'], 201);
        } catch (FalseException $error) {
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

    public function deleteProduct(ProductIdRequest $request)
    {
        $validated = $request->validated()['product_id'];

        try {
            $this->productService->deleteProduct($validated);
            return response()->json(['success' => 'Đã xóa'], 201);
        } catch (FalseException $error) {
            return response()->json(['error' => $error->getMessage()], 404);
        }
    }

    public function updateProduct(UpdateProductRequest $request)
    {
        $validated = $request->validated();

        try {
            $this->productService->updateProduct($validated);
            return response()->json(['mess' => 'Cập nhật thành công'], 201);
        } catch (ProductException $error) {
            return response()->json($error->getMessage(), 401);
        }
    }
}

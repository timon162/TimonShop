<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|int',
            'name_update_product' => 'required|string|min:6',
            'price_update_product' => 'required|numeric',
            'quantity_update_product' => 'required|numeric',
            'code_update_product' => 'required|string|min:6',
            'decription_update_product' => 'required|string|min:6',
            'file_main_img_update_product' => 'sometimes|file',
            'updateImgDescription' => 'sometimes|array',
            'updateImgDescription.*' => 'sometimes|file',
            'updateBasicOptions' => 'required|array',
            'updateBasicOptions.*.name' => 'required|string',
            'updateBasicOptions.*.detail' => 'required|string',
            'updateBuyOptions' => 'required|array',
            'updateBuyOptions.*.name' => 'required|string',
            'updateBuyOptions.*.detail' => 'required|string',
            'updateBuyOptions.*.price' => 'required|numeric',
            'update_category_select' => 'required|exists:timon_shop_categories,id',
            'update_supplier_select' => 'required|exists:timon_shop_suppliers,id',
            'oldImageDecription' => 'sometimes|array',
            'oldImageDecription.*.image' => 'sometimes|string',
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'product_id required',
            'product_id.int' => 'id product sai định dạng',

            'name_update_product.required' => 'name_update_product required',
            'name_update_product.string' => 'tên product sai định dạng',
            'name_update_product.min' => 'tên product quá nắng',

            'price_update_product.required' => 'price_update_product required',
            'price_update_product.numeric' => 'giá sai định dạng',

            'quantity_update_product.required' => 'quantity_update_product required',
            'quantity_update_product.numeric' => 'số lượng sai định dạng',

            'code_update_product.required' => 'code_update_product required',
            'code_update_product.string' => 'code product sai định dạng',
            'code_update_product.min' => 'code product quá ngắn',

            'decription_update_product.required' => 'decription_update_product required',
            'decription_update_product.string' => 'mô tả sai định dạng',
            'decription_update_product.min' => 'mô tả quá ngắn',

            'file_main_img_update_product.file' => 'file hình ảnh sai định dạng',

            'updateBasicOptions.required' => 'updateBasicOptions required',

            'updateImgDescription.*.file' => 'updateImgDescription file sai định dạng',

            'updateBasicOptions.*.name.required' => 'updateBasicOptions name required',
            'updateBasicOptions.*.name.string' => 'updateBasicOptions name sai định dạng',

            'updateBasicOptions.*.detail.required' => 'updateBasicOptions detail required',
            'updateBasicOptions.*.detail.string' => 'updateBasicOptions detail sai định dạng',

            'updateBuyOptions.required' => 'updateBuyOptions required',

            'updateBuyOptions.*.name.required' => 'updateBuyOptions name required',
            'updateBuyOptions.*.name.string' => 'updateBuyOptions name sai định dạng',

            'updateBuyOptions.*.detail.required' => 'updateBuyOptions detail required',
            'updateBuyOptions.*.detail.string' => 'updateBuyOptions detail sai định dạng',

            'updateBuyOptions.*.price.required' => 'updateBuyOptions price required',
            'updateBuyOptions.*.price.numeric' => 'updateBuyOptions price sai định dạng',

            'update_category_select.required' => 'category required',
            'update_category_select.exists' => 'category không có trong kho',

            'update_supplier_select.required' => 'supplier required',
            'update_supplier_select.exists' => 'supplier không có trong kho',

            'oldImageDecription.array' => 'oldImageDecription sai định dạng',
            'oldImageDecription.*.image.string' => 'oldImageDecription image sai định dạng',
        ];
    }
}

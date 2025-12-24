<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name_create_product' => 'required|string|min:6',
            'price_create_product' => 'required|numeric',
            'quantity_create_product' => 'required|numeric',
            'code_create_product' => 'required|string|min:6|unique:timon_shop_products,product_code',
            'decription_create_product' => 'required|string|min:6',
            'file_main_img_product' => 'required|file',
            'imgDescription' => 'required|array',
            'imgDescription.*' => 'required|file',
            'basicOptions' => 'required|array',
            'basicOptions.*.name' => 'required|string',
            'basicOptions.*.detail' => 'required|string',
            'buyOptions' => 'required|array',
            'buyOptions.*.name' => 'required|string',
            'buyOptions.*.detail' => 'required|string',
            'buyOptions.*.price' => 'required|numeric',
            'category_select' => 'required|exists:timon_shop_categories,id',
            'supplier_select' => 'required|exists:timon_shop_suppliers,id',
        ];
    }

    public function messages()
    {
        return [
            'name_create_product.required' => 'name_create_product required',
            'name_create_product.string' => 'tên product sai định dạng',
            'name_create_product.min' => 'tên product quá nắng',

            'price_create_product.required' => 'price_create_product required',
            'price_create_product.numeric' => 'giá sai định dạng',

            'quantity_create_product.required' => 'quantity_create_product required',
            'quantity_create_product.numeric' => 'số lượng sai định dạng',

            'code_create_product.required' => 'code_create_product required',
            'code_create_product.string' => 'code product sai định dạng',
            'code_create_product.unique' => 'code product đã tồn tại',
            'code_create_product.min' => 'code product quá ngắn',

            'decription_create_product.required' => 'decription_create_product required',
            'decription_create_product.string' => 'mô tả sai định dạng',
            'decription_create_product.min' => 'mô tả quá ngắn',

            'file_main_img_product.required' => 'file_main_img_product required',
            'file_main_img_product.file' => 'file hình ảnh sai định dạng',

            'basicOptions.required' => 'basicOptions required',

            'imgDescription.required' => 'imgDescription required',
            'imgDescription.*.required' => 'imgDescription name required',
            'imgDescription.*' => 'imgDescription file sai định dạng',

            'basicOptions.*.name.required' => 'basicOptions name required',
            'basicOptions.*.name.string' => 'basicOptions name sai định dạng',

            'basicOptions.*.detail.required' => 'basicOptions detail required',
            'basicOptions.*.detail.string' => 'basicOptions detail sai định dạng',

            'buyOptions.required' => 'buyOptions required',

            'buyOptions.*.name.required' => 'buyOptions name required',
            'buyOptions.*.name.string' => 'buyOptions name sai định dạng',

            'buyOptions.*.detail.required' => 'buyOptions detail required',
            'buyOptions.*.detail.string' => 'buyOptions detail sai định dạng',

            'buyOptions.*.price.required' => 'buyOptions price required',
            'buyOptions.*.price.numeric' => 'buyOptions price sai định dạng',

            'category_select.required' => 'category required',
            'category_select.exists' => 'category không có trong kho',

            'supplier_select.required' => 'supplier required',
            'supplier_select.exists' => 'supplier không có trong kho',
        ];
    }
}

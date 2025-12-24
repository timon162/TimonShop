<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'item_supplier' => 'required|array',
            'item_supplier.*.name' => 'required|string',
            'item_supplier.*.file_img' => 'required|file|image',
            'item_supplier.*.check_hot' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'item_supplier.*.name.required' => 'supplier_name required',
            'item_supplier.*.name.string'   => 'supplier_name sai định dạng',

            'item_supplier.*.file_img.required'   => 'supplier_image required',
            'item_supplier.*.file_img.file'    => 'supplier_image sai định dạng',
            'item_supplier.*.file_img.image'   => 'supplier_image phải là hình',

            'item_supplier.*.check_hot.required' => 'supplier_is_hot required',
            'item_supplier.*.check_hot.boolean'  => 'supplier_is_hot sai định dạng',
        ];
    }
}

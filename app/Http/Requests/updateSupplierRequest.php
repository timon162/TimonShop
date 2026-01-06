<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
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
            'supplier_id' => 'required|int',
            'supplier_name' => 'required|string',
            'supplier_img' => 'sometimes|file|image'
        ];
    }

    public function messages()
    {
        return [
            'supplier_id.required' => 'supplier_id required',
            'supplier_id.int'   => 'supplier_id sai định dạng',

            'supplier_name.required' => 'supplier_name required',
            'supplier_name.string'   => 'supplier_name sai định dạng',

            'supplier_img.file'    => 'supplier_image sai định dạng',
            'supplier_img.image'   => 'supplier_image phải là hình',
        ];
    }
}

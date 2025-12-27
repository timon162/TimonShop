<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCartRequest extends FormRequest
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
            'product_id' => 'required|integer',
            'quantity' => 'required|integer'
        ];
    }
    public function messages()
    {
        return [
            'product_id.required' => 'product_id required',
            'product_id.integer' => 'product_id sai định dạng',
            'quantity.required' => 'quantity required',
            'quantity.integer' => 'quantity sai định dạng',
        ];
    }
}

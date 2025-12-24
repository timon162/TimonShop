<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'item_category' => 'required|array',
            'item_category.*.name' => 'required|string',
            'item_category.*.file_img' => 'required|file|image',
            'item_category.*.check_hot' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'item_category.*.name.required' => 'category_name required',
            'item_category.*.name.string'   => 'category_name sai định dạng',

            'item_category.*.file_img.required'   => 'category_image required',
            'item_category.*.file_img.file'    => 'category_image sai định dạng',
            'item_category.*.file_img.image'   => 'category_image phải là hình',

            'item_category.*.check_hot.required' => 'category_is_hot required',
            'item_category.*.check_hot.boolean'  => 'category_is_hot sai định dạng',
        ];
    }
}

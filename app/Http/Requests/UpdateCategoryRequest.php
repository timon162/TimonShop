<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'category_id' => 'required|int',
            'category_name' => 'required|string',
            'category_img' => 'sometimes|file|image'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'category_id required',
            'category_id.int'   => 'category_id sai định dạng',

            'category_name.required' => 'category_name required',
            'category_name.string'   => 'category_name sai định dạng',

            'category_img.file'    => 'category_image sai định dạng',
            'category_img.image'   => 'category_image phải là hình',
        ];
    }
}

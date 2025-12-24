<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            "name" => 'nullable|string|min:6',
            'email' => [
                'nullable',
                'email',
                Rule::unique('timon_shop_users', 'email')->ignore(auth()->id()),
            ],
            "phone_number" => 'nullable|string|min:10|max:15',
            "image_user" => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            "name.string" => 'tên thay đổi sai định dạng',
            "name.min" => 'tên thay đổi quá ngắn',
            "email.email" => 'email thay đổi sai định dạng',
            "email.unique" => 'email thay đổi đã tồn tại',
            "phone_number.string" => 'số điện thoại thay đổi sai định dạng',
            "phone_number.min" => 'số điện thoại thay đổi quá ngắn',
        ];
    }
}

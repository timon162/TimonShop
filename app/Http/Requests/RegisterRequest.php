<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:timon_shop_users,email',
            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/'
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'chưa nhập name',
            'name.string' => 'name sai định dạng',
            'name.min' => 'name quá ngắn',
            'email.required' => 'chưa nhập email',
            'email.email' => 'email không đúng định dạng',
            'email.unique' => 'email đã tồn tại',
            'password.required' => 'chưa nhập Password',
            'password.string' => 'Password không đúng định dạng',
            'password.min' => 'Password quá ngắn',
            'password.confirmed' => 'Password chưa trùng khớp',
            'password.regex' => 'Password phải có chữ thường, chữ HOA, số và ký tự đặc biệt',
        ];
    }
}

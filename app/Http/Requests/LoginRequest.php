<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|string',
            'remember' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'chưa nhập email',
            'email.email' => 'email sai định dạng',
            'password.required' => 'chưa nhập password',
            'password.string' => 'password không đúng định dạng',
            'remember.boolean' => 'remember sai định dạng',
        ];
    }
}

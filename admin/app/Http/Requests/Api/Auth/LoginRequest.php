<?php

namespace App\Http\Requests\Api\Auth;

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
            'user_name' => 'required|string|min:6|max:50',
            'password' => 'required|string|min:6|max:30'
        ];
    }

    public function messages(): array
    {
        return [
            'user_name.required' => 'Tài khoản không được bỏ trống.',
            'user_name.max' => 'Tài khoản không được quá 50 kí tự.',
            'user_name.min' => 'Tài khoản không được ít hơn 6 kí tự.',
            'password.required' => 'Mật khẩu không được bỏ trống.',
            'password.max' => 'Mật khẩu không được quá 30 kí tự.',
            'password.min' => 'Mật khẩu không được ít hơn 650 kí tự.',
        ];
    }
}

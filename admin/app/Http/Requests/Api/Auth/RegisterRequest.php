<?php

namespace App\Http\Requests\Api\Auth;

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
            'user_name' => 'required|string|min:6|max:50|unique:users',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6|max:30',
        ];
    }

    public function messages(): array
    {
        return [
            'user_name.required' => 'Tài khoản không được bỏ trống.',
            'user_name.max' => 'Tài khoản không được quá 50 kí tự.',
            'user_name.min' => 'Tài khoản không được ít hơn 6 kí tự.',
            'user_name.unique' => 'Tài khoản đã tồn tại.',
            'email.required' => 'Email không được bỏ trống.',
            'email.max' => 'Email không được quá 100 kí tự.',
            'email.email' => 'Email phải đúng định dạng.',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Mật khẩu không được bỏ trống.',
            'password.max' => 'Mật khẩu không được quá 30 kí tự.',
            'password.min' => 'Mật khẩu không được ít hơn 650 kí tự.',
            'password.confirmed' => 'Mật khẩu xác nhập không đúng.',
        ];
    }
}

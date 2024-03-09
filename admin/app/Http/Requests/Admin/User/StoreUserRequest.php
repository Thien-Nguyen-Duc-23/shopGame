<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email:rfc,dns|unique:users',
            'password' => 'required|string|max:30|confirmed',
            'gender' => 'nullable',
            'date' => 'nullable|date',
            'address' => 'required|string|max:255',
            'number' => 'nullable|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Họ không được bỏ trống.',
            'first_name.max' => 'Họ không được lớn hơn 255 ký tự.',
            'last_name.required' => 'Tên không được bỏ trống.',
            'last_name.max' => 'Tên không được lớn hơn 255 ký tự.',
            'email.required' => 'Email không được bỏ trống.',
            'email.max' => 'Email không được quá 255 kí tự.',
            'email.email' => 'Email phải đúng định dạng.',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Mật khẩu không được bỏ trống.',
            'password.max' => 'Mật khẩu không được quá 30 kí tự.',
            'password.confirmed' => 'Mật khẩu xác nhập không đúng.',
            'address.required' => 'Địa chỉ không được bỏ trống.',
            'address.max' => 'Địa chỉ không được quá 255 kí tự.',
        ];
    }
}

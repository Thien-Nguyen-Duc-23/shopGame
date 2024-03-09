<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => 'required|string|max:255|email:rfc,dns|unique:users,email,'.$this->id,
            'password_old' => $this->password ? 'required_without:password|string|max:30' : 'nullable|string|max:30',
            'password' =>  $this->password_old ? 'required_without:password_old|string|max:30' : 'nullable|string|max:30',
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
            'password.required_without' => 'Mật khẩu mới không được bỏ trống.',
            'password.string' => 'Mật khẩu mới không được bỏ trống.',
            'password.max' => 'Mật khẩu mới không được quá 30 kí tự.',
            'password.confirmed' => 'Mật khẩu mới không đúng.',
            'password_old.required_without' => 'Mật khẩu cũ không được bỏ trống.',
            'password_old.max' => 'Mật khẩu cũ không được quá 30 kí tự.',
            'password_old.string' => 'Mật khẩu mới không được bỏ trống.',
            'address.required' => 'Địa chỉ không được bỏ trống.',
            'address.max' => 'Địa chỉ không được quá 255 kí tự.',
        ];
    }
}

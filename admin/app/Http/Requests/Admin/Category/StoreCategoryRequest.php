<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required',
            'uri' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên ngành hàng không được để trống',
            'name.string' => 'Tên ngành hàng phải là chuỗi',
            'name.max' => 'Tên ngành hàng không được vượt quá 255 ký tự',
            'description.required' => 'Mô tả ngắn không được để trống',
            'uri.max' => 'URI không được vượt quá 255 ký tự',
        ];
    }
}

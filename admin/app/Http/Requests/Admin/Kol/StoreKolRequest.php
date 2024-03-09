<?php

namespace App\Http\Requests\Admin\Kol;

use Illuminate\Foundation\Http\FormRequest;

class StoreKolRequest extends FormRequest
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
            'rate' => 'required|integer|max:100',
            'token' => 'required|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được bỏ trống.',
            'name.max' => 'Tên không được lớn hơn 255 ký tự.',
            'rate.required' => 'Chiết khấu không được bỏ trống.',
            'rate.max' => 'Chiết khấu không được lớn hơn 100',
            'token.required' => 'Token không được bỏ trống.',
            'token.max' => 'Token không được lớn hơn 255 ký tự.',
        ];
    }
}

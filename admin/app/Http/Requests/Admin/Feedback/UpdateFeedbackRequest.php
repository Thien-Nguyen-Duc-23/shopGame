<?php

namespace App\Http\Requests\Admin\Feedback;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeedbackRequest extends FormRequest
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
            'order_id' => 'required|integer|exists:orders,id',
            'library_id' => 'nullable|integer|exists:orders,id',
            'content' => 'required|max:3000',
            'admin_note' => 'nullable|max:3000',
            'stars' => 'nullable|integer|max:5',
            'status' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'order_id.required' => 'Đơn hành không được bỏ trống.',
            'order_id.exists' => 'Đơn hành phải tồn tại.',
            'library_id.exists' => 'Hình ảnh phải tồn tại.',
            'content.required' => 'Nội dung không được bỏ trống.',
            'content.max' => 'Nội dung không được quá 3000 ký tự.',
            'admin_note.max' => 'Lưu ý của admin không được quá 3000 ký tự.',
            'stars.max' => 'Không được quá 5 sao.',
            'status.required' => 'Trạng thái không được bỏ trống.'
        ];
    }
}

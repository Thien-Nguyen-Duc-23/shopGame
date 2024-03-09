<?php

namespace App\Http\Requests\Admin\Order;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'user_id' => 'required|integer|exists:users,id',
            'processor_id' => 'required|integer|exists:users,id',
            'status' => 'required|integer',
            'partner_rate' => 'nullable|integer',
            'banking_code' => 'nullable|string|max:255',
            'buyer_note' => 'nullable|string|max:255',
            'admin_note' => 'nullable|string|max:255',
            'product_id' => 'required|integer|exists:products,id',
            'unit_price' => 'required|integer|min:1',
            'quantity' => 'required|integer|min:1',
            'discouted' => 'nullable|integer',
            'total' => 'required|integer',
            'name' => 'nullable|array',
            'content' => 'nullable|array'
        ];
    }

    public function all($key = null)
    {
        $data = parent::all($key);
        $data['partner_rate'] = isset($data['partner_rate']) ? str_replace([',', '.'], ['', ''], $data['partner_rate']) : null;
        $data['unit_price'] = isset($data['unit_price']) ? str_replace([',', '.'], ['', ''], $data['unit_price']) : null;
        $data['discouted'] = isset($data['discouted']) ? str_replace([',', '.'], ['', ''], $data['discouted']) : null;
        $data['total'] = isset($data['total']) ? str_replace([',', '.'], ['', ''], $data['total']) : null;

        return $data;
    }

    public function messages(): array
    {
        return [
            'status.required' => 'Trạng thái không được bỏ trống.',
            'partner_rate.integer' => 'Số  tiền chiết khấu không hợp lệ.',
            'banking_code.max' => 'Mã ngân hàng không được quá 255 kí tự.',
            'buyer_note.max' => 'Lưu ý của khách hàng không được quá 255 kí tự.',
            'admin_note.max' => 'Lưu của của quản trị viên không được quá 255 kí tự.',
            'product_id.required' => 'Vui lòng chọn 1 sản phẩm.',
            'product_id.exists' => 'Sản phẩm không hợp lệ.',
            'unit_price.required' => 'Vui vòng nhập giá',
            'unit_price.integer' => 'Giá không hợp lệ.',
            'unit_price.min' => 'Giá phải lớn hơn 0',
            'discouted.integer' => 'Số  tiền giảm không hợp lệ.',
            'quantity.required' => 'Số  lượng là bắt buộc',
            'quantity.min' => 'Số lượng phải lớn hơn 0',
            'total.required' => 'Tổng tiền không được bỏ trống!',
            'processor_id.required' => 'Vui lòng chọn người tiếp nhận.',
            'processor_id.exists' => 'Người tiếp nhận không tồn tại.'
        ];
    }
}

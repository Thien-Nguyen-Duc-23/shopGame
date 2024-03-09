<?php

namespace App\Http\Requests\Admin\PromoCode;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePromoCodeRequest extends FormRequest
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
        $rule = [
            'name' => 'required|string|max:255',
            'type' => 'required',
            'user_ids' => 'sometimes|array',
            'product_group_ids' => 'sometimes|array',
            'product_ids' => 'sometimes|array',
            'order_min_value' => $this->order_max_value ? 'required|integer|lt:order_max_value' : 'required|integer',
            'order_max_value' => 'nullable|integer|gt:order_min_value',
            'expired_at' => 'required|after:start_at',
            'start_at' => 'required|after:today|before:expired_at'
        ];

        if ((int) $this->type == (int) \App\Enums\PromoCodeType::Percent_Type->value) {
            $rule['value'] = 'required|integer|max:100';
        } else {
            $rule['value'] = 'required|integer';
        }

        return $rule;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được bỏ trống.',
            'name.max' => 'Tên không được lớn hơn 255 ký tự.',
            'value.required' => 'Số tiền không được bỏ trống.',
            'value.integer' => 'Vui lòng nhập đúng định dạng',
            'value.max' => 'Phầm trăm phải ít hơn 100%',
            'order_min_value.required' => 'Số tiền tối thiểu không được bỏ trống.',
            'order_min_value.lt' => 'Số tiền phải nhỏ hơn số tiền tối đa.',
            'order_max_value.gt' => 'Số tiền phải lớn hơn số tiền tối thiểu.',
            'type.required' => "Loại giảm giá không được bỏ trống.",
            "expired_at.required" => "Ngày hết hạn là bắt buộc.",
            'expired_at.after' => "Ngày hết hạn phải lớn hơn ngày bắt đầu",
            'order_min_value.integer' => 'Vui lòng nhập đúng định dạng',
            'order_max_value.integer' => 'Vui lòng nhập đúng định dạng',
            "start_at.required" => "Ngày bắt đầu là bắt buộc.",
            'start_at.after' => "Ngày bắt đầu phải lớn hơn ngày hôm nay.",
            'start_at.before' => "Ngày bắt đầu phải bé hơn ngày kết thúc.",
        ];
    }

    public function all($key = null)
    {
        $data = parent::all($key);
        $data['value'] = str_replace([',', '.'], ['', ''], $data['value']);
        $data['order_min_value'] = str_replace([',', '.'], ['', ''], $data['order_min_value']);
        $data['order_max_value'] = str_replace([',', '.'], ['', ''], $data['order_max_value']);

        return $data;
    }
}

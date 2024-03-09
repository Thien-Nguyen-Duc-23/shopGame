<div class="text-danger mb-2 marginNote">
    <b class="payin-note">⁕Lưu ý:</b> Thông tin thanh toán được hiển thị trong trang nạp tiền vào tài khoản (Đơn vị tính: VNĐ)
</div>
<div class="form-group row">
    <label for="payment_amount_min" class="col-sm-3 text-right col-form-label">Số tiền nạp tối thiểu</label>
    <div class="col-sm-6">
        <input type="text" class="form-control inp-amount" id="payment_amount_min" name="payment_amount_min" placeholder="Số tiền nạp tối thiểu"
            value="{{ !empty($configPayment['payment_amount_min']) ? number_format($configPayment['payment_amount_min'],0,",",".") : old('payment_amount_min') }}">
    </div>
</div>
<div class="form-group row">
    <label for="payment_amount_max" class="col-sm-3 text-right col-form-label">Số tiền tối đa</label>
    <div class="col-sm-6">
        <input type="text" class="form-control inp-amount" id="payment_amount_max" name="payment_amount_max" placeholder="Số tiền tối đa"
            value="{{ !empty($configPayment['payment_amount_max']) ? number_format($configPayment['payment_amount_max'],0,",",".") : old('payment_amount_max') }}">
    </div>
</div>
<div class="add-info-pay m-4">
    @php
        $dem = 0;
    @endphp
    @if ( count($configPayment['list_config_payment']) )
        @foreach ($configPayment['list_config_payment'] as $key => $config_payment)
            @php
                $dem++;
            @endphp
            <div class="info-bank-config">
                <button type="button" class="close btnClose" data-toggle="tooltip" data-placement="top" title="Xóa cấu hình thanh toán">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="group-bank-config">
                    <div class="form-group row">
                        <label for="bank_type_{{ $config_payment->id }}" class="col-sm-3 text-right col-form-label">Chọn loại thanh toán</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="bank_type_{{ $config_payment->id }}" name="payment_bank_type[]">
                                <option value="">Chọn hình thức thanh toán</option>
                                @foreach ($config_bank as $key_bank => $bank)
                                    @php
                                        $selected = '';
                                        if ( $key_bank == $config_payment->setting ) {
                                            $selected = 'selected';
                                        }
                                    @endphp
                                    <option value="{{ $bank['code'] }}" {{ $selected }}>{{ $bank['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="account_name_{{ $config_payment->id }}" class="col-sm-3 text-right col-form-label">Tên tài khoản</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="account_name_{{ $config_payment->id }}" name="payment_account_name[]" placeholder="Tên tài khoản"
                                value="{{ !empty($config_payment->value) ? $config_payment->value : '' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="account_code_{{ $config_payment->id }}" class="col-sm-3 text-right col-form-label">Số tài khoản</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="account_code_{{ $config_payment->id }}" name="payment_account_code[]" placeholder="Số tài khoản"
                                value="{{ !empty($config_payment->content) ? $config_payment->content : '' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="account_active_{{ $config_payment->id }}" class="col-sm-3 text-right col-form-label">Bật</label>
                        <div class="col-sm-8 pt-2">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" class="custom-control-input"  value="1"
                                    id="account_active_{{ $config_payment->id }}" name="payment_account_note{{ $key }}"
                                    @if( !empty($config_payment->note) )
                                        checked
                                    @endif
                                >
                                <label for="account_active_{{ $config_payment->id }}"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
<div class="form-group row mb-2 mt-2">
    <div class="marginNote">
        <button class="btn btn-success btn-sm" type="button" id="add_info_pay" data-dem="{{ $dem }}"><i class="far fa-plus-square"></i> Thêm thông tin thanh toán</button>
    </div>
</div>

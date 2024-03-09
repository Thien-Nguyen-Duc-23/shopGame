@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Thêm mã giảm giá
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li aria-current="page" class="breadcrumb-item active">Mã giảm giá</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.promo_code.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">
                        Họ tên đầy đủ:
                        <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text" 
                        class="form-control @error('name') font-weight-normal border border-danger @enderror" 
                        id="name" 
                        name="name" 
                        placeholder="Vui lòng nhập họ tên đầy đủ" 
                        value="{{ old('name') }}" 
                        required
                    >
                    @error('name')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('name') }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">
                        Loại giảm giá
                        <span class="text-danger">*</span>
                    </label>
                    <div class="d-flex align-items-center gap-3">
                        <div class="form-check">
                            <input class="form-check-input type-promo-code" type="radio" name="type" value='{!! \App\Enums\PromoCodeType::Percent_Type->value !!}' @if(old('type')) checked @endif>
                            <label class="form-check-label" for="flexRadioDefault1">Phần trăm(%)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input type-promo-code" type="radio" name="type" value="{!! \App\Enums\PromoCodeType::Direct_Type->value !!}" @if(!old('type')) checked @endif>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Trực tiếp (VND)
                            </label>
                        </div>
                    </div>
                    @error('type')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('type') }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="rate" class="form-label">
                        Chiết khấu 
                        <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text" 
                        class="form-control inp-amount @error('value') font-weight-normal border border-danger @enderror"  
                        name="value" 
                        id="value-promo-code"
                        placeholder="Số tiền chiết khấu" 
                        value="{{ old('value') }}"
                        required
                    >
                    @error('value')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('value') }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="status" {{ old('status') ? 'checked' : '' }}>
                        <label class="form-check-label" for="flexSwitchCheckDefault1">Trạng thái</label>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex align-items-center gap-3 form-label">
                        <div class="form-check p-0">
                            <label for="name" class="form-label" style="margin: 1px 0px;">
                                Mã giảm giá
                                <span class="text-danger">*</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <button type="button" id="random-discount-code" class="btn btn-outline-dark btn-sm">Random</button>
                        </div>
                    </div>
                    <input 
                        class="form-control @error('discount_code') font-weight-normal border border-danger @enderror"
                        id="discount-code" 
                        name="discount_code" 
                        type="text" 
                        value="{{ old('discount_code') }}" 
                        required
                        maxlength="12"
                    >
                    @error('discount_code')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('discount_code') }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="multiple-select-field" class="form-label">Người dùng</label>
                    <select class="form-select" id="select-user-ids" data-placeholder="Vui lòng chọn người dùng" multiple name="user_ids[]">
                        @if (!empty($users))
                            @foreach ($users as $key => $userName) 
                                <option 
                                    value="{{ $key ?? null }}"
                                >
                                    {{ $userName }}
                                    {{ (collect(old('user_ids'))->contains($key)) ? 'selected':'' }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3">
                    <label for="multiple-select-field" class="form-label">Nhóm sản phẩm</label>
                    <select class="form-select" id="select-product-group-ids" data-placeholder="Vui lòng chọn nhóm sản phẩm" multiple name="product_group_ids[]">
                        @if (!empty($groupProducts))
                            @foreach ($groupProducts as $key => $groupProduct) 
                                <option 
                                    value="{{ $key ?? null }}" 
                                    {{ (collect(old('product_group_ids'))->contains($key)) ? 'selected':'' }}
                                >
                                    {{ $groupProduct }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3">
                    <label for="multiple-select-field" class="form-label">Sản phẩm</label>
                    <select class="form-select" id="select-product-ids" data-placeholder="Vui lòng chọn sản phẩm" multiple name="product_ids[]">
                        @if (!empty($products))
                            @foreach ($products as $key => $product) 
                                <option 
                                    value="{{ $key ?? null }}"
                                    {{ (collect(old('product_ids'))->contains($key)) ? 'selected':'' }}
                                >
                                    {{ $product }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3 row g-3">
                    <div class="col-12 col-lg-6">
                        <label class="form-label">
                            Ngày bắt đầu
                            <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="datetime-local" 
                            placeholder="Chọn ngày bắt đầu" 
                            id="promo-code-start-at" 
                            class="flatpickr-input date-time form-control @error('start_at') font-weight-normal border border-danger @enderror" 
                            name="start_at" 
                            value="{{ old('start_at') }}"
                        >
                            <p hidden class="mt-2 form-label text-danger font-weight-normal error-start-at"></p>
                            @error('start_at')
                                <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('start_at') }}</p>
                            @enderror
                    </div>
                    <div class="col-12 col-lg-6">
                        <label class="form-label">
                            Ngày kết thúc
                            <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="datetime-local" 
                            id="promo-code-expired-at" 
                            placeholder="Chọn ngày kết thúc" 
                            class="form-control date-time expired-at @error('expired_at') font-weight-normal border border-danger @enderror" 
                            name="expired_at" 
                            value="{{ old('expired_at') }}"
                        >
                            <p hidden class="mt-2 form-label text-danger font-weight-normal error-expired-at"></p>
                        @error('expired_at')
                            <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('expired_at') }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row g-3">
                    <div class="col-12 col-lg-6">
                        <label for="input1" class="form-label">
                            Đơn hàng tối thiểu
                            <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="order-min-value"
                            class="form-control inp-amount @error('order_min_value') font-weight-normal border border-danger @enderror" 
                            placeholder="Số tiền tối thiểu" 
                            name="order_min_value" 
                            value="{{ old('order_min_value') }}"
                            required
                        >
                        <p hidden class="mt-2 form-label text-danger font-weight-normal error-order-min-value"></p>
                        @error('order_min_value')
                            <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('order_min_value') }}</p>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6">
                        <label for="input1" class="form-label">Đơn hàng tối đa</label>
                        <input 
                            type="text" 
                            id="order-max-value"
                            class="form-control inp-amount @error('order_max_value') font-weight-normal border border-danger @enderror" 
                            placeholder="Số tiền tối đa" 
                            name="order_max_value" 
                            value="{{ old('order_max_value') }}"
                        >
                        <p hidden class="mt-2 form-label text-danger font-weight-normal error-order-max-value"></p>
                        @error('order_max_value')
                            <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('order_max_value') }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check form-check-info">
                        <input class="form-check-input" type="checkbox" {{ old('is_disposable') ? 'checked' : '' }} name="is_disposable">
                        <label class="form-check-label" for="flexCheckCheckedInfo">
                            Chỉ dùng 1 lần
                        </label> 
                    </div>
                </div>

                <div class="mb-3 form-group row">
                    <label class="form-label">Ảnh đại diện</label>
                    <div class="col-sm-6">
                        <div class="website-logo-container mb-2">
                            <h6 class="text-danger">Chưa có ảnh đại diện cho mã giảm giá.</h6>
                        </div>
                        <input type="hidden" name="website_logo" id="promo_code_logo" placeholder="Logo" class="form-control" value="">
                        <input type="hidden" name="library_id" id="library_id" placeholder="Logo" class="form-control" value="">
                        <button type="button" class="btn btn-outline-dark btn-sm btn-open-library btn-promo-code-logo"><i class="bx bx-cloud-upload mr-1"></i> Chọn ảnh đại diện</button>
                    </div>
                </div>

                <button class="btn btn-primary px-5 mt-2" type="submit">
                    <i class="bx bx-plus mr-1"></i>
                    Tạo mới
                </button>
            </form>
        </div>
    </div>
    
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/promoCode.js') }}"></script>
@endsection

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
            <form action="{{ route('admin.promo_code.update', $promoCode->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">
                        Tên mã giảm giá 
                        <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text" 
                        class="form-control @error('name') font-weight-normal border border-danger @enderror" 
                        id="name" 
                        name="name" 
                        placeholder="Vui lòng nhập tên mã giảm giá" 
                        value="{{ old('name', $promoCode->name) }}" 
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
                            <input class="form-check-input type-promo-code" type="radio" name="type" value='{!! \App\Enums\PromoCodeType::Percent_Type->value !!}' 
                            @if(old('type', $promoCode->type) == 1) checked @endif>
                            <label class="form-check-label" for="flexRadioDefault1">Phần trăm(%)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input type-promo-code" type="radio" name="type" value="{!! \App\Enums\PromoCodeType::Direct_Type->value !!}" 
                                @if(old('type', $promoCode->type) == 2) checked @endif
                            >
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
                        value="{{ $promoCode->value ? number_format($promoCode->value,0,",",".") : old('value') }}"
                        required
                    >
                    @error('value')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('value') }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="flexSwitchCheckDefault1">Trạng thái</label>
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            role="switch" 
                            id="flexSwitchCheckDefault1" 
                            name="status" 
                            {{ old('status') || $promoCode->status == 1 ? 'checked' : '' }}
                        >
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
                        value="{{ old('discount_code', $promoCode->discount_code) }}" 
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
                                <option value="{{ $key ?? null }}">{{ $userName }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3">
                    <label for="multiple-select-field" class="form-label">Nhóm sản phẩm</label>
                    <select class="form-select" id="select-product-group-ids" data-placeholder="Vui lòng chọn nhóm sản phẩm" multiple name="product_group_ids[]">
                        @if (!empty($groupProducts))
                            @foreach ($groupProducts as $key => $groupProduct) 
                                <option value="{{ $key ?? null }}">{{ $groupProduct }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3">
                    <label for="multiple-select-field" class="form-label">Sản phẩm</label>
                    <select class="form-select" id="select-product-ids" data-placeholder="Vui lòng chọn sản phẩm" multiple name="product_ids[]">
                        @if (!empty($products))
                            @foreach ($products as $key => $product) 
                                <option value="{{ $key ?? null }}">{{ $product }}</option>
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
                            value="{{ old('start_at', $promoCode->start_at) }}"
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
                            value="{{ old('expired_at', $promoCode->expired_at) }}"
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
                            class="form-control inp-amount @error('order_min_value') font-weight-normal border border-danger @enderror" 
                            placeholder="Số tiền tối thiểu" 
                            name="order_min_value" 
                            value="{{ $promoCode->order_min_value ? number_format($promoCode->order_min_value,0,",",".") : old('order_min_value') }}"
                            required
                        >
                        @error('order_min_value')
                            <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('order_min_value') }}</p>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6">
                        <label for="input1" class="form-label">Đơn hàng tối đa</label>
                        <input 
                            type="text" 
                            class="form-control inp-amount @error('order_max_value') font-weight-normal border border-danger @enderror" 
                            placeholder="Số tiền tối đa" 
                            name="order_max_value" 
                            value="{{ $promoCode->order_max_value ? number_format($promoCode->order_max_value,0,",",".") : old('order_min_value') }}"
                        >
                        @error('order_max_value')
                            <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('order_max_value') }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check form-check-info">
                        <input class="form-check-input" type="checkbox" {{ old('is_disposable', $promoCode->is_disposable) ? 'checked' : '' }} name="is_disposable">
                        <label class="form-check-label" for="flexCheckCheckedInfo">
                            Chỉ dùng 1 lần
                        </label> 
                    </div>
                </div>

                <div class="mb-3 form-group row">
                    <label class="form-label">Logo</label>
                    <div class="col-sm-6">
                        <div class="website-logo-container mb-2">
                            @if ( !empty($promoCode->library->link) )
                                <img class="config-image" style="max-height: 300px; max-width: 300px; margin-left: 10px;" src="{{ asset($promoCode->library->link)  }}" alt="{{ !empty($promoCode->library->title) ? $promoCode->library->title : null }}">
                            @else
                                <h6 class="text-danger">Chưa có Logo cho mã giảm giá.</h6>
                            @endif
                        </div>
                        <input type="hidden" name="library_id" id="library_id" placeholder="Logo" class="form-control" value="{{ old('library_id', $promoCode->library_id) }}">
                        <button type="button" class="btn btn-outline-dark btn-sm btn-open-library btn-promo-code-logo"><i class="bx bx-cloud-upload mr-1"></i> Chọn Logo</button>
                    </div>
                </div>

                <button class="btn btn-primary px-5 mt-2" type="submit">
                    <i class="bx bx-plus mr-1"></i>
                    Cập nhật
                </button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/promoCode.js') }}"></script>
    <script>
        var productGroupIds = {!! json_encode($promoCode->product_group_id_type_array, JSON_HEX_TAG) !!};
        var productIds = {!! json_encode($promoCode->product_id_type_array, JSON_HEX_TAG) !!};
        var userIds = {!! json_encode($promoCode->user_id_type_array, JSON_HEX_TAG) !!};
    </script>
@endsection

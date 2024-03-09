@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Thêm đơn hàng
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li aria-current="page" class="breadcrumb-item active">Đơn hàng</li>
@endsection
@section('content')
    <form action="{{ route('admin.order.store') }}" method="POST">
        @csrf
        <div class="card border-primary mb-3">
            <input hidden name="processor_id" value="{{ Auth::user()->id }}">
            <div class="card-header">
                Thông tin đơn hàng
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">
                        Người tiếp nhận:
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-select" id="select-processor-id" data-placeholder="Vui lòng chọn khách hàng" name="processor_id" required>
                        <option></option>
                        @if (!empty($admins))
                            @foreach ($admins as $adminId => $adminName) 
                                <option 
                                    value="{{ $adminId ?? null }}"
                                    {{ (collect(old('processor_id'))->contains($adminId)) ? 'selected':'' }}
                                >
                                    {{ $adminName }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3">
                    <label for="multiple-select-field" class="form-label">
                        Khách hàng
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-select" id="select-user-ids" data-placeholder="Vui lòng chọn khách hàng" name="user_id" required>
                        <option></option>
                        @if (!empty($users))
                            @foreach ($users as $key => $userName) 
                                <option 
                                    value="{{ $key ?? null }}"
                                    {{ (collect(old('user_id'))->contains($key)) ? 'selected':'' }}
                                >
                                    {{ $userName }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">
                        Trạng thái
                        <span class="text-danger">*</span>
                    </label>
                    <select name="status" class="form-select" id="status-order-select" data-placeholder="Vui lòng chọn trạng thái" required>
                        <option></option>
                        @foreach (\App\Enums\OrderStatus::ORDER_STATUS as $feedbackStatus => $feedbackName)
                            <option 
                                value="{{ $feedbackStatus }}"
                                {{ (collect(old('status'))->contains($feedbackStatus)) ? 'selected':'' }}
                            >
                                {{ $feedbackName }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('status') }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="rate" class="form-label">
                        Chiết khấu của đối tác
                    </label>
                    <input 
                        type="text" 
                        class="form-control inp-amount @error('partner_rate') font-weight-normal border border-danger @enderror"  
                        name="partner_rate" 
                        id="partner-rate-promo-code"
                        placeholder="Số tiền chiết khấu" 
                        value="{{ old('partner_rate') }}"
                    >
                    @error('partner_rate')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('partner_rate') }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">
                        Mã ngân hàng
                    </label>
                    <input 
                        type="text" 
                        class="form-control @error('banking_code') font-weight-normal border border-danger @enderror" 
                        id="banking-code" 
                        name="banking_code" 
                        placeholder="Vui lòng nhập mã ngân hàng" 
                        value="{{ old('banking_code') }}" 
                    >
                    @error('name')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('banking_code') }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">
                        Lưu ý của khách hàng
                    </label>
                    <input 
                        type="text" 
                        class="form-control @error('buyer_note') font-weight-normal border border-danger @enderror" 
                        id="buyer-note" 
                        name="buyer_note" 
                        placeholder="Vui lòng nhập mã ngân hàng" 
                        value="{{ old('buyer_note') }}" 
                    >
                    @error('name')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('buyer_note') }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">
                        Lưu ý của quản trị viên
                    </label>
                    <input 
                        type="text" 
                        class="form-control @error('admin_note') font-weight-normal border border-danger @enderror" 
                        id="admin-note" 
                        name="admin_note" 
                        placeholder="Vui lòng nhập mã ngân hàng" 
                        value="{{ old('admin_note') }}" 
                    >
                    @error('name')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('admin_note') }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Thông tin sản phẩm
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="multiple-select-field" class="form-label">
                        Sản phẩm
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-select" id="select-product-id" data-placeholder="Vui lòng chọn sản phẩm" name="product_id" required>
                        <option></option>
                        @if (!empty($products))
                            @foreach ($products as $key => $productsName) 
                                <option 
                                    value="{{ $key ?? null }}"
                                    {{ old('product_id') ? 'selected':'' }}
                                >
                                    {{ $productsName }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-3 row g-3">
                    <div class="col-12 col-lg-4">
                        <label for="input1" class="form-label">
                            Giá bán 
                            <span hidden id="is_sale">(đang sale)</span>
                            <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="unit-price"
                            class="form-control inp-amount @error('unit_price') font-weight-normal border border-danger @enderror" 
                            placeholder="Giá bán của sản phẩm" 
                            name="unit_price" 
                            value="{{ old('unit_price') }}"
                            required
                        >
                        <p hidden class="mt-2 form-label text-danger font-weight-normal error-order-min-value"></p>
                        @error('unit_price')
                            <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('unit_price') }}</p>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-4">
                        <label for="input1" class="form-label">
                            Số lượng
                            <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="number" 
                            id="quantity"
                            class="form-control inp-amount @error('quantity') font-weight-normal border border-danger @enderror" 
                            placeholder="Số lượng sản phẩm" 
                            name="quantity" 
                            min=1
                            value="{{ old('quantity') }}"
                            required
                        >
                        <p hidden class="mt-2 form-label text-danger font-weight-normal error-order-max-value"></p>
                        @error('quantity')
                            <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('quantity') }}</p>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-4">
                        <label for="input1" class="form-label">
                            Số tiền được giảm (VND)
                        </label>
                        <input 
                            type="text" 
                            id="discounted"
                            class="form-control inp-amount @error('discouted') font-weight-normal border border-danger @enderror" 
                            placeholder="Số tiền được giảm" 
                            name="discouted" 
                            value="{{ old('discouted') }}"
                        >
                        <p hidden class="mt-2 form-label text-danger font-weight-normal error-order-max-value"></p>
                        @error('discouted')
                            <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('discouted') }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">
                        Tổng tiền
                        <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text" 
                        class="form-control @error('total') font-weight-normal border border-danger @enderror" 
                        id="total" 
                        placeholder="" 
                        value="{{ old('total') }}" 
                        disabled
                    >
                    <input hidden name="total" value="" id="total-temp">
                    @error('total')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('total') }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Yêu cầu thêm
            </div>
            <div class="card-body">
                <table class="table mb-3" id='table-order-infor'>
                    <thead>
                        <tr>
                            <th scope="col">Tên</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name='name[]' placeholder='Vui lòng nhập tên' class="form-control"/></td>
                            <td><input type="text" name='content[]' placeholder='Vui lòng nhập nội dung' class="form-control"/></td>
                            <td><button onClick="$(this).parent().parent().remove();" type="button" class="btn btn-outline-danger"><i class="bx bx-trash" style="margin-left: 5px;"></i></button></td>
                        </tr>

                        <tr id="add-item" class="not-print">
                            <td colspan="6">
                                <button type="button" id="add-order-infor-button" class="btn btn-outline-primary">Thêm</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <button class="btn btn-primary px-5 mt-2" type="submit">
            <i class="bx bx-plus mr-1"></i>
            Tạo mới
        </button>
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/order.js') }}"></script>
@endsection

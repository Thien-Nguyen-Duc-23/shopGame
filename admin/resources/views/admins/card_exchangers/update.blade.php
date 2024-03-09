@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Chỉnh sửa cổng đổi thẻ
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li aria-current="page" class="breadcrumb-item active">Nhóm cổng đổi thẻ</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.card-exchanger.update', $card_exchanger->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="name">Tên cổng đổi thẻ <span class="text-danger">*</span></label>
                    <input class="form-control" id="name" name="name" type="text" value="{{ $card_exchanger->name }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="send_url">Địa chỉ gửi</label>
                    <input class="form-control" id="send_url" name="send_url" type="text" value="{{ $card_exchanger->send_url }}">
                    @error('send_url')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="get_rate_url">Địa chỉ lấy tỉ lệ <span class="text-danger">*</span></label>
                    <input class="form-control" id="get_rate_url" name="get_rate_url" type="text" value="{{ $card_exchanger->get_rate_url }}">
                    @error('get_rate_url')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="partner_id">Mã đối tác <span class="text-danger">*</span></label>
                    <input class="form-control" id="partner_id" name="partner_id" type="text" value="{{ $card_exchanger->partner_id }}">
                    @error('partner_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="status">Trạng thái</label>
                    <div class="form-check form-switch">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            role="switch" 
                            id="status"
                            name="status" 
                            {{ old('status') || $card_exchanger->status == 1 ? 'checked' : '' }}
                        >
                    </div>
                </div>

                <button class="btn btn-primary px-5 mt-2" type="submit">Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/cardExchanger.js') }}"></script>
@endsection

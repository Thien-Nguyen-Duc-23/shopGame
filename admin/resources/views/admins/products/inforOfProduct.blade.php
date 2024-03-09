@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Thông tin của sản phẩm
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li aria-current="page" class="breadcrumb-item active">Nhóm sản phẩm</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="category-avatar">Hình ảnh</label>
                <div class="category-avatar-img mb-2">
                    @if (!empty($product->library->link))
                        <img src="{{ asset($product->library->link) }}" alt="Image" alt="" width="150"
                            height="150">
                    @else
                        <span class="text-danger">{{ 'Chưa có hình ảnh' }}</span>
                    @endif
                </div>
                <input type="hidden" id="product-avatar" name="product-avatar" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input class="form-control" id="name" name="name" type="text" value="{{ $product->name }}"
                    disabled>
            </div>
            <div class="form-group">
                <label for="rate">Giá</label>
                <input class="form-control" id="pricing" name="pricing" type="number" value="{{ $product->pricing }}"
                    disabled>
            </div>
            <div class="form-group">
                <label for="rate">Giá sale</label>
                <input class="form-control" id="sale_pricing" name="sale_pricing" type="number"
                    value="{{ $product->sale_pricing }}" disabled>
            </div>
            <div class="form-group">
                <label for="rate">Giá card</label>
                <input class="form-control" id="card_pricing" name="card_pricing" type="number"
                    value="{{ $product->card_pricing }}" disabled>
            </div>
            <div class="form-group">
                <label for="category-status">Trạng thái</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="product-status" name="product-hidden"
                        value="" @if ($product->hidden == 0) checked @endif>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- <script src="{{ asset('js/admin/category.js') }}"></script> --}}
@endsection

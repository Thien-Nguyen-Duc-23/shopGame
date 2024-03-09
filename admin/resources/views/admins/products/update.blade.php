@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Chỉnh sửa sản phẩm
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li aria-current="page" class="breadcrumb-item active">Chỉnh sửa sản phẩm</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.product.update', $product->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="category-avatar">Ảnh đại diện</label>
                    <div class="category-avatar-img mb-2">
                        @php
                            $product->is_avatar = !empty($product->library->link) ? true : false;
                        @endphp
                        @if ($product->is_avatar)
                            <input type="hidden" name="old_avatar" value="{{ $product->library_id }}">
                            <img src="{{ asset($product->library->link) }}" alt="Image" alt="" width="150"
                                height="150">
                        @else
                            {{ '' }}
                        @endif
                    </div>
                    <input type="hidden" id="product-avatar" name="product-avatar" class="form-control" value="">
                    <button type="button" class="btn btn-outline-dark btn-sm btn-open-library btn-product-avatar">
                        <i class="bx bx-cloud-upload mr-1"></i> Chọn ảnh đại diện
                    </button>
                </div>

                <div class="form-group">
                    <label for="name">Tên danh mục</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Chọn danh mục</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Sản phẩm</label>
                    <input class="form-control" id="name" name="name" type="text" value="{{ $product->name }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Mô tả</label>
                    <input class="form-control" id="name" name="description" type="text"
                        value="{{ $product->description }}">
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Giá</label>
                    <input class="form-control pricing-input" id="pricing" name="pricing" type="text"
                        value="{{ $product->pricing }}">
                    @error('pricing')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Giá sale</label>
                    <input class="form-control pricing-input" id="sale_pricing" name="sale_pricing" type="text"
                        value="{{ $product->sale_pricing }}">
                    @error('sale_pricing')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Giá card</label>
                    <input class="form-control pricing-input" id="card_pricing" name="card_pricing" type="text"
                        value="{{ $product->card_pricing }}">
                    @error('card_pricing')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category-status">Trạng thái</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="product-status"
                            name="product-hidden" @if ($product->hidden == 0) checked @endif>
                    </div>
                </div>

                <button class="btn btn-primary px-5 mt-2" type="submit"><i class="bx bx-plus mr-1"></i>Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/product.js') }}"></script>
@endsection

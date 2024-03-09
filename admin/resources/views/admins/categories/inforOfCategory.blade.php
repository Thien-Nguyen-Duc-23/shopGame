@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Thông tin của danh mục sản phẩm
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li aria-current="page" class="breadcrumb-item active">Nhóm danh mục sản phẩm</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="category-avatar">Hình ảnh</label>
                <div class="category-avatar-img mb-2">
                    @if (!empty($category->library->link))
                        <img src="{{ asset($category->library->link) }}" alt="Image" alt="" width="150"
                            height="150">
                    @else
                        {{ '' }}
                    @endif
                </div>
                <input type="hidden" id="category-avatar" name="category-avatar" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input class="form-control" id="name" name="name" type="text" value="{{ $category->name }}"
                    disabled>
            </div>
            <div class="form-group">
                <label for="rate">Mô tả</label>
                <input class="form-control" id="rate" name="description" type="text"
                    value="{{ $category->description }}" disabled>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- <script src="{{ asset('js/admin/category.js') }}"></script> --}}
@endsection

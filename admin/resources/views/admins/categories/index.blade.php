@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Quản lý danh mục sản phẩm
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Danh mục sản phẩm</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary px-5">Tạo mới</a>
                </div>
                <div class="col-md-9">
                    <input type="text" id="searchInput" name="searchInput" class="form-control" placeholder="Tìm kiếm...">
                </div>
            </div>

            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Số lượng sản phẩm</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/category.js') }}"></script>
@endsection

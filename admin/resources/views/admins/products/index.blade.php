@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Quản lý sản phẩm
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary px-5"><i
                            class="bx bx-user mr-1"></i>Tạo
                        mới</a>
                </div>

                <div class="col-md-9">
                    <input type="text" id="searchInput" name="searchInput" class="form-control"
                        placeholder="Tìm kiếm...">
                </div>

            </div>

            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Giá sale</th>
                        <th scope="col">Giá card</th>
                        <th scope="col">Trạng thái</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/product.js') }}"></script>
@endsection

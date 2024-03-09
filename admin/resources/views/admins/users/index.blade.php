@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Quản lý khách hàng
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Khách hàng</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary px-5"><i class="bx bx-user mr-1"></i>Tạo mới</a>
                </div>
                <div class="col-md-9">
                    <input type="text" id="searchInput" name="searchInput" class="form-control"
                        placeholder="Tìm kiếm...">
                </div>
            </div>
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col">Tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nhóm người dùng</th>
                        <th scope="col">Số dư tài khoản</th>
                        <th scope="col">Số tiền đã nạp</th>
                        <th scope="col">Nguồn tạo</th>
                        <th scope="col">Lần cuối đăng nhập</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>

    {{-- MODAL --}}
    
    <div class="modal fade" id="modal-delete-user" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="delete-user"></div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="btn-submit-delete">Xác nhận</button>
                    <button type="button" class="btn btn-danger" id="btn-finish-delete" data-bs-dismiss="modal">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
    {{-- ./MODAL --}}
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/user.js') }}"></script>
@endsection

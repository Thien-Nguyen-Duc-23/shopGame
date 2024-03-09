@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
   Quản lí đơn hàng
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nhóm đơn hàng</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="button-create-kol m-10">
                <a href="{{ route('admin.order.create') }}" class="btn btn-primary px-5"></i>Tạo mới</a>
            </div>
            <table class="table mb-0" id='table-order-index'>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Người tiếp nhận</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
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

    <div class="modal fade" id="modal-delete-order" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="delete-order"></div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="btn-submit-delete">Xác nhận</button>
                    <button type="button" class="btn btn-danger" id="btn-finish-delete" data-bs-dismiss="modal">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/order.js')  }}"></script>
@endsection

@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Quản lý các bên cổng đổi thẻ
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Các bên cổng đổi thẻ</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('admin.card-exchanger.create') }}" class="btn btn-primary px-5">Tạo mới</a>

            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col">Tên cổng đổi thẻ</th>
                        <th scope="col">Địa chỉ gửi</th>
                        <th scope="col">Địa chỉ lấy tỉ lệ</th>
                        <th scope="col">Mã đối tác</th>
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
    <div class="modal fade" id="modal-page" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="notication"></div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="btn-submit">Xác nhận</button>
                    <button type="button" class="btn btn-danger" id="btn-finish" data-bs-dismiss="modal">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
    {{-- ./MODAL --}}
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/cardExchanger.js') }}"></script>
@endsection

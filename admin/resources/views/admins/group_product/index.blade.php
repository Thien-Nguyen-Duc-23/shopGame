@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Nhóm sản phẩm
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nhóm sản phẩm</li>
@endsection
@section('content')
    <div class="title mb-3">
        <div class="title-body">
            <div class="row">
                <!-- button tạo -->
                <div class="col-md-4">
                    <button class="btn btn-primary" id="createGroup">Tạo nhóm sản phẩm</button>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th width="15%">Ảnh đại diện</th>
                        <th width="15%">Tên</th>
                        <th width="55%">Mô tả</th>
                        <th width="15%"></th>
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
    <script src="{{ asset('/js/admin/group_product.js') }}?token={{ time() }}"></script>
@endsection

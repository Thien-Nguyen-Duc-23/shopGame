@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Quản lý hoạt động đăng nhập
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nhóm hoạt động đăng nhập</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            {{-- <div class="row mb-3">
                <div class="col-md-9">
                    <input type="text" id="searchInput" name="searchInput" class="form-control" placeholder="Tìm kiếm...">
                </div>
            </div> --}}

            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col">Người dùng</th>
                        <th scope="col">Hoạt động</th>
                        <th scope="col">Model</th>
                        <th scope="col">Quản trị</th>
                        <th scope="col">Chức năng</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/log_activity.js') }}"></script>
@endsection

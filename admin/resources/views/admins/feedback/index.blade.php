@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
   Quản lí feedback
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
     <li class="breadcrumb-item active" aria-current="page">Nhóm feedback</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="button-create-kol m-10">
                <a href="{{ route('admin.feedback.create') }}" class="btn btn-primary px-5"><i class="bx bx-user mr-1"></i>Tạo mới</a>
            </div>
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col">Thông tin đơn hàng</th>
                        <th scope="col">Image</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Admin ghi chú</th>
                        <th scope="col">Stars</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/feedback.js')  }}"></script>
@endsection

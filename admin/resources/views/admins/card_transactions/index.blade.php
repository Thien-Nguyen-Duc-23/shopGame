@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Quản lý những giao dịch đổi thẻ
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nhóm giao dịch đổi thẻ</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Nhà cung cấp thẻ</th>
                        <th scope="col">Serial</th>
                        <th scope="col">Code</th>
                        <th scope="col">Giá trị</th>
                        <th scope="col">Giá trị thực</th>
                        <th scope="col">Thực nhận</th>
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
    <script src="{{ asset('js/admin/cardTransaction.js') }}"></script>
@endsection

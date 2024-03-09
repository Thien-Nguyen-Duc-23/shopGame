@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Quản lý tỉ lệ chiết khấu bên cổng đổi thẻ
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tỉ lệ chiết khấu Các bên cổng đổi thẻ</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col">Tên cổng đổi thẻ</th>
                        <th scope="col">Tỉ lệ chiết khấu</th>
                        <th scope="col">Tên nhà cung cấp thẻ</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/cardExchangerRate.js') }}"></script>
@endsection

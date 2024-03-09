@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Quản lý phương thức thanh toán
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nhóm phương thức thanh toán</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table mb-0">
                {{-- <a href="{{ route('admin.payment.create') }}" class="btn btn-primary px-5"><i class="bx bx-user mr-1"></i>Tạo
                    mới</a> --}}

                <thead>
                    <tr>
                        <th scope="col">Tên khách tiếp thị liên kết</th>
                        <th scope="col">Tỉ lệ chiết khấu</th>
                        <th scope="col">Token</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/referPartner.js') }}"></script>
@endsection

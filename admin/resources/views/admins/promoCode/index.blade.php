@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
   Quản lí mã giảm giá
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
     <li class="breadcrumb-item active" aria-current="page">Mã giảm giá</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="button-create-kol m-10">
                <a href="{{ route('admin.promo_code.create') }}" class="btn btn-primary px-5"><i class="bx bx-user mr-1"></i>Tạo mới</a>
            </div>
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col">Tên giảm giá</th>
                        <th scope="col">Chiết khấu</th>
                        <th scope="col">Đơn hàng tối thiểu</th>
                        <th scope="col">Đơn hàng tối đa</th>
                        <th scope="col">Ngày hết hạn</th>
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
    <script src="{{ asset('js/admin/promoCode.js')  }}"></script>
@endsection

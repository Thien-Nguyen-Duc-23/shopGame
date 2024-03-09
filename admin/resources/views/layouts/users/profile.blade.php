@extends('layouts.app')
@section('content')
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Hồ sơ của bạn</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="" class="btn btn-sm btn-menu-item">Lịch sử nạp thẻ</a>
                            </li>
                            <li class="list-group-item">
                                <a href="" class="btn btn-sm btn-menu-item">Lịch sử chuyển khoản</a>
                            </li>
                            <li class="list-group-item">
                                <a href="" class="btn btn-sm btn-menu-item">Đơn hàng chờ</a>
                            </li>
                            <li class="list-group-item">
                                <a href="" class="btn btn-sm btn-menu-item">Lịch sử đơn mua</a>
                            </li>
                            <li class="list-group-item">
                                <a href="" class="btn btn-sm btn-menu-item">Trang cá nhân</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        @yield('main-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Chi tiết khách hàng
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li aria-current="page" class="breadcrumb-item active">Khách hàng</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{ asset($user->userDetail->avatar) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110" height="110">
                        <div class="mt-3">
                            <h4>{{ $user->first_name }} {{ $user->last_name }}</h4>
                            <a href={{ route('admin.user.edit', $user->id) }} class="btn btn-primary">Chỉnh sửa</a>
                        </div>
                    </div>
                    <hr class="my-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Số dư tài khoản</h6>
                            <span class="text-secondary">{{ !empty($user->credit->credit) ? number_format($user->credit->credit,0,",",".") : 0 }} VNĐ</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Số tiền đã nạp</h6>
                            <span class="text-secondary">{{ !empty($user->credit->total) ? number_format($user->credit->total,0,",",".") : 0 }} VNĐ</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Họ và tên</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <p class="mb-0">{{ $user->first_name }} {{ $user->last_name }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <p class="mb-0">{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Chức vụ</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <p class="mb-0">{{ \App\Enums\UserRole::ROLE[$user->role ?? 3] ?? "Khách hàng"}}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Giới tính</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <p class="mb-0">{{ \App\Enums\UserGender::GENDER[$user->userDetail->gender ?? 3] ?? "Khác"}}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Ngày sinh</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <p class="mb-0">{{ !empty($user->userDetail->date) ? date('d-m-Y', strtotime($user->userDetail->date)) : '' }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Địa chỉ</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <p class="mb-0">{{ !empty($user->userDetail->address) ? $user->userDetail->address : null }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Thông tin nhóm</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            @if (empty($kolPartners) && empty($hirePartners) && empty($referPartners))
                                <h6 class="text-danger mb-0">Chưa thuộc nhóm nào.</h6>
                            @else
                                @if (!empty($kolPartners))
                                    @foreach ($kolPartners as $kolPartnerId => $kolPartnerName)
                                        <a href="{{ route('admin.kol.list_user_of_kol', $kolPartnerId) }}" class="mb-0 form-label">{{ $kolPartnerName }}</a>
                                    @endforeach
                                @endif

                                @if (!empty($hirePartners))
                                    @foreach ($hirePartners as $hirePartnerId => $hirePartnerName)
                                        <a href="{{ route('admin.product.infor.of.hirepartner', $hirePartnerId) }}" class="mb-0 form-label">{{ $hirePartnerName }}</a>
                                    @endforeach
                                @endif

                                @if (!empty($referPartners))
                                    @foreach ($referPartners as $referPartnerId => $referPartnerName)
                                        <a href="{{ route('admin.product.infor.of.referpartner', $referPartnerId) }}" class="form-label mb-0">{{ $referPartnerName }}</a>
                                    @endforeach
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Ngày tạo</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <p class="mb-0">{{ !empty($user->created_at) ? date('d-m-Y', strtotime($user->created_at)) : '' }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Lần cuối đăng nhập</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <p class="mb-0">{{ !empty($user->last_login) ? date('d-m-Y', strtotime($user->last_login)) : '' }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Người tạo</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <p class="mb-0">{{ !empty($user->socialAccount->first()->provider) ? $user->socialAccount->first()->provider : $user->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="d-flex align-items-center mb-3">Thông tin đơn hàng</h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Tổng số lượng đơn hàng</h6>
                                    <span class="text-secondary">{{ !empty($user->orders) ? $user->orders->count() : 0 }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Số đơn hàng thành công</h6>
                                    <span class="text-secondary">{{ !empty($user->orders->where('status', \App\Enums\OrderStatus::Success->value)->count()) ? $user->orders->where('status', \App\Enums\OrderStatus::Success->value)->count() : 0 }}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Số đơn chờ giao hàng</h6>
                                    <span class="text-secondary">{{ !empty($user->orders->where('status', \App\Enums\OrderStatus::Processing->value)->count()) ? $user->orders->where('status', \App\Enums\OrderStatus::Processing->value)->count() : 0 }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Số đơn thất bại</h6>
                                    <span class="text-secondary">{{ !empty($user->orders->where('status', \App\Enums\OrderStatus::Canceled->value)->count()) ? $user->orders->where('status', \App\Enums\OrderStatus::Canceled->value)->count() : 0 }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Số đơn đã hoàn tiền</h6>
                                    <span class="text-secondary">{{ !empty($user->orders->where('status', \App\Enums\OrderStatus::Refunded->value)->count()) ? $user->orders->where('status', \App\Enums\OrderStatus::Refunded->value)->count() : 0 }}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Đơn hàng tạo gần nhất</h6>
                                    <span class="text-secondary">{{ !empty($user->orders->first()) ? $user->orders->first()->created_at : '' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="d-flex align-items-center mb-3">Thông tin thanh toán</h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Tổng số lượng thanh toán</h6>
                                    <span class="text-secondary">{{ !empty($user->payments) ? $user->payments->count() : 0 }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Đã thanh toán</h6>
                                    <span class="text-secondary">{{ !empty($user->payments->where('status', \App\Enums\PaymentStatus::Paid->value)->count()) ? $user->orders->where('status', \App\Enums\PaymentStatus::Paid->value)->count() : 0 }}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Chưa thanh toán</h6>
                                    <span class="text-secondary">{{ !empty($user->payments->where('status', \App\Enums\PaymentStatus::Unpaid->value)->count()) ? $user->orders->where('status', \App\Enums\PaymentStatus::Unpaid->value)->count() : 0 }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Chưa giải quyết</h6>
                                    <span class="text-secondary">{{ !empty($user->payments->where('status', \App\Enums\PaymentStatus::Pending->value)->count()) ? $user->orders->where('status', \App\Enums\PaymentStatus::Pending->value)->count() : 0 }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Thanh toán gần nhất</h6>
                                    <span class="text-secondary">{{ !empty($user->payments->first()) ? $user->payments->first()->created_at : '' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection

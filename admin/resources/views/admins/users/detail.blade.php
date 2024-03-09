@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Sửa khách hàng 
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li aria-current="page" class="breadcrumb-item active">Khách hàng</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="mb-3 row g-3">
                <div class="col-12 col-lg-6">
                    <label for="input1" class="form-label">
                        Họ
                    </label>
                    <input 
                        type="text" 
                        id="first_name"
                        class="form-control inp-amount" 
                        placeholder="Nhập họ" 
                        name="first_name" 
                        value="{{ old('first_name', $user->first_name) }}"
                        disabled
                    >
                </div>
                <div class="col-12 col-lg-6">
                    <label for="input1" class="form-label">
                        Tên
                    </label>
                    <input 
                        type="text" 
                        id="last_name"
                        class="form-control inp-amount" 
                        placeholder="Nhập tên" 
                        name="last_name" 
                        value="{{ old('last_name', $user->last_name) }}"
                        disabled
                    >
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">
                    Email:
                    <span class="text-danger">*</span>
                </label>
                <input 
                    type="text" 
                    class="form-control @error('email') font-weight-normal border border-danger @enderror" 
                    id="email" 
                    name="email" 
                    placeholder="Vui lòng nhập email" 
                    value="{{ old('email', $user->email) }}" 
                    disabled
                >
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">
                    Chức vụ:
                    <span class="text-danger">*</span>
                </label>
                <select name ="role" class="form-select" id="role-select-clear-field" data-placeholder="Vui lòng chọn chức vụ" disabled>
                    <option></option>
                    @foreach (\App\Enums\UserRole::ROLE as $roleKey => $userRole)
                        <option 
                            value="{{ $roleKey }}"
                            {{ (collect(old('role'))->contains($roleKey)) ? 'selected':'' }}
                        >
                            {{ $userRole }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 row g-3">
                <div class="col-12 col-lg-6">
                    <label for="name" class="form-label">
                        Giới tính
                    </label>
                    <select name ="gender" class="form-select" id="gender-select-clear-field" data-placeholder="Vui lòng chọn giới tính" disabled>
                        <option></option>
                        @foreach (\App\Enums\UserGender::GENDER as $userGenderId => $userGenderName)
                            <option 
                                value="{{ $userGenderId }}"
                                {{ (collect(old('gender'))->contains($userGenderId)) ? 'selected':'' }}
                            >
                                {{ $userGenderName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-lg-6">
                    <label for="input1" class="form-label">
                        Ngày sinh
                    </label>
                    <input
                        disabled
                        type="text" 
                        id="date-birthday"
                        class="form-control" 
                        placeholder="Nhập ngày sinh" 
                        name="date" 
                        value="{{ !empty($user->userDetail->date) ? date('d-m-Y', strtotime($user->userDetail->date)) : '' }}"
                    >
                </div>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">
                    Địa chỉ:
                    <span class="text-danger">*</span>
                </label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="address" 
                    name="address" 
                    placeholder="Vui lòng nhập địa chỉ" 
                    value="{{ !empty($user->userDetail->address) ? $user->userDetail->address : null }}"
                    disabled
                >
            </div>

            <div class="mb-3 form-group row">
                <label class="form-label">Ảnh đại diện</label>
                <div class="col-sm-6">
                    <div class="website-logo-container mb-2">
                        @if ( !empty($user->userDetail->avatar) )
                            <img class="config-image" style="max-height: 300px; max-width: 300px; margin-left: 10px;" src="{{ asset($user->userDetail->avatar) }}">
                        @else
                            <h6 class="text-danger">Chưa có ảnh đại diện.</h6>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="token" class="form-label">Thông tin nhóm</label>
                <div class="col-sm-6">
                    @if (empty($kolPartners) && empty($hirePartners) && empty($referPartners))
                        <h6 class="text-danger">Chưa thuộc nhóm nào.</h6>
                    @else
                        @if (!empty($kolPartners))
                            @foreach ($kolPartners as $kolPartnerId => $kolPartnerName)
                                <a href="{{ route('admin.kol.list_user_of_kol', $kolPartnerId) }}" class="form-label">{{ $kolPartnerName }}</a>
                            @endforeach
                        @endif

                        @if (!empty($hirePartners))
                            @foreach ($hirePartners as $hirePartnerId => $hirePartnerName)
                                <a href="{{ route('admin.product.infor.of.hirepartner', $hirePartnerId) }}" class="form-label">{{ $hirePartnerName }}</a>
                            @endforeach
                        @endif

                        @if (!empty($referPartners))
                            @foreach ($referPartners as $referPartnerId => $referPartnerName)
                                <a href="{{ route('admin.product.infor.of.referpartner', $referPartnerId) }}" class="form-label">{{ $referPartnerName }}</a>
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>

            <div class="mb-3 row g-3">
                <div class="col-12 col-lg-6">
                    <label for="input1" class="form-label">
                        Số dư tài khoản
                    </label>
                    <input 
                        type="text" 
                        class="form-control inp-amount" 
                        disabled
                        value={{ !empty($user->credit->credits) ? number_format($user->credit->credits,0,",",".") : '' }}
                    >
                </div>
                <div class="col-12 col-lg-6">
                    <label for="input1" class="form-label">
                        Số tiền đã nạp
                    </label>
                    <input 
                        type="text" 
                        class="form-control inp-amount" 
                        disabled
                        value={{ !empty($user->credit->total) ? number_format($user->credit->credits,0,",",".") : '' }}
                    >
                </div>
            </div>

            <div class="mb-3 row g-3">
                <div class="col-12 col-lg-6">
                    <label for="input1" class="form-label">
                        Ngày tạo
                    </label>
                    <input 
                        type="text" 
                        class="form-control inp-amount" 
                        disabled
                        value="{{ !empty($user->created_at) ? date('d-m-Y', strtotime($user->created_at)) : '' }}"
                    >
                </div>
                <div class="col-12 col-lg-6">
                    <label for="input1" class="form-label">
                        Lần cuối đăng nhập
                    </label>
                    <input 
                        type="text" 
                        class="form-control inp-amount" 
                        disabled
                        value="{{ !empty($user->last_login) ? date('d-m-Y', strtotime($user->last_login)) : '' }}"
                    >
                </div>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">
                    Nguồn tạo:
                    <span class="text-danger">*</span>
                </label>
                <input 
                    type="text" 
                    class="form-control" 
                    value="{{ !empty($user->socialAccount->first()->provider) ? $user->socialAccount->first()->provider : $user->email }}" 
                    disabled
                >
            </div>

            <a href="{{ route('admin.user') }}" class="btn btn-primary px-5 mt-2">
                Quay lại
            </a>
        </div>
    </div>
    @php
        $gender = !empty($user->userDetail->gender) ? $user->userDetail->gender : 3;
        $userRole = !empty($user->role) ? $user->role : 3;
    @endphp
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/user.js') }}"></script>
    <script>
        var gender = {!! $gender !!};
        var userRole = {!! json_encode($userRole) !!};
    </script>
@endsection

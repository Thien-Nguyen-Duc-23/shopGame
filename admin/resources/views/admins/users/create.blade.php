@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Thêm khách hàng 
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li aria-current="page" class="breadcrumb-item active">Khách hàng</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                <div class="mb-3 row g-3">
                    <div class="col-12 col-lg-6">
                        <label for="input1" class="form-label">
                            Họ
                            <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="first_name"
                            class="form-control inp-amount @error('first_name') font-weight-normal border border-danger @enderror" 
                            placeholder="Nhập họ" 
                            name="first_name" 
                            value="{{ old('first_name') }}"
                            required
                        >
                        @error('first_name')
                            <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('first_name') }}</p>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6">
                        <label for="input1" class="form-label">
                            Tên
                            <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="last_name"
                            class="form-control inp-amount @error('last_name') font-weight-normal border border-danger @enderror" 
                            placeholder="Nhập tên" 
                            name="last_name" 
                            value="{{ old('last_name') }}"
                            required
                        >
                        @error('last_name')
                            <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('last_name') }}</p>
                        @enderror
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
                        value="{{ old('email') }}" 
                        required
                    >
                    @error('email')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('email') }}</p>
                    @enderror
                </div>

                <div class="mb-3 row g-3">
                    <div class="col-12 col-lg-6">
                        <label for="name" class="form-label">
                            Mật khẩu
                            <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="password" 
                            class="form-control @error('password') font-weight-normal border border-danger @enderror" 
                            id="password" 
                            name="password" 
                            placeholder="Vui lòng nhập mật khẩu" 
                            value="{{ old('password') }}" 
                            required
                        >
                        @error('password')
                            <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('password') }}</p>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6">
                        <label for="name" class="form-label">
                            Nhập lại mật khẩu
                            <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="password" 
                            class="form-control @error('password_confirmation') font-weight-normal border border-danger @enderror" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            placeholder="Vui lòng nhập lại mật khẩu" 
                            value="{{ old('password_confirmation') }}" 
                            required
                        >
                        @error('password')
                            <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('password') }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">
                        Chức vụ:
                        <span class="text-danger">*</span>
                    </label>
                    <select name ="role" class="form-select" id="role-select-clear-field" data-placeholder="Vui lòng chọn chức vụ">
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
                    @error('role')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('role') }}</p>
                    @enderror
                </div>

                <div class="mb-3 row g-3">
                    <div class="col-12 col-lg-6">
                        <label for="name" class="form-label">
                            Giới tính
                        </label>
                        <select name ="gender" class="form-select" id="gender-select-clear-field" data-placeholder="Vui lòng chọn giới tính">
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
                        @error('gender')
                            <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('gender') }}</p>
                        @enderror
                    </div>

                    <div class="col-12 col-lg-6">
                        <label for="input1" class="form-label">
                            Ngày sinh
                        </label>
                        <input
                            type="text" 
                            id="date-birthday"
                            class="form-control @error('date') font-weight-normal border border-danger @enderror" 
                            placeholder="Nhập ngày sinh" 
                            name="date" 
                            value="{{ old('date') }}"
                        >
                        @error('date')
                            <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('date') }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">
                        Địa chỉ:
                        <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text" 
                        class="form-control @error('address') font-weight-normal border border-danger @enderror" 
                        id="address" 
                        name="address" 
                        placeholder="Vui lòng nhập địa chỉ" 
                        value="{{ old('address') }}" 
                        required
                    >
                    @error('address')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('address') }}</p>
                    @enderror
                </div>
                <div class="mb-3 form-group row">
                    <label class="form-label">Ảnh đại diện</label>
                    <div class="col-sm-6">
                        <div class="website-logo-container mb-2">
                            <h6 class="text-danger">Chưa có ảnh đại diện.</h6>
                        </div>
                        <input type="hidden" name="website_logo" id="user_logo" placeholder="Logo" class="form-control" value="">
                        <input type="hidden" name="avatar" id="library_id" placeholder="Logo" class="form-control" value="">
                        <button type="button" class="btn btn-outline-dark btn-sm btn-open-library btn-user-logo"><i class="bx bx-cloud-upload mr-1"></i> Chọn ảnh đại diện</button>
                    </div>
                </div>

                <button class="btn btn-primary px-5 mt-2" type="submit">
                    <i class="bx bx-plus mr-1"></i>
                    Tạo mới
                </button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/user.js') }}"></script>
    <script>
        var userRole = 'customer';
    </script>
@endsection

@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Thêm nhóm cày thuê
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li aria-current="page" class="breadcrumb-item active">Nhóm cày thuê</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.hire.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Tên nhóm cày thuê</label>
                    <input class="form-control" id="name" name="name" type="text">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rate">Tỉ lệ chiết khấu</label>
                    <input class="form-control" id="rate" name="rate" type="number">
                    @error('rate')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="multiple-select-field" class="col-form-label">Người dùng </label>
                    <select class="form-select" id="select-user-ids" data-placeholder="Vui lòng chọn người dùng" multiple
                        name="user_ids[]">
                        @if (!empty($users))
                            @foreach ($users as $user)
                                <option value="{{ $user->id ?? null }}">
                                    {{ $user->first_name . ' ' . $user->last_name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div id="temp-form"></div> --}}
                <button class="btn btn-primary px-5 mt-2" type="submit"><i class="bx bx-plus mr-1"></i>Tạo mới</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/hirePartner.js') }}"></script>
@endsection

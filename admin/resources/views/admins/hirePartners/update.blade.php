@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Chỉnh sửa nhóm cày thuê
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li aria-current="page" class="breadcrumb-item active">Nhóm cày thuê</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.hire.update', $hirePartner->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Tên nhóm</label>
                    <input class="form-control" id="name" name="name" type="text"
                        value="{{ $hirePartner->name }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rate">Chiết khấu</label>
                    <input class="form-control" id="rate" name="rate" type="number"
                        value="{{ $hirePartner->rate }}">
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
                                <option value="{{ $user->id ?? null }}"
                                    {{ collect($hirePartner->user_ids)->contains($user->id) ? 'selected' : '' }}>
                                    {{ $user->first_name . ' ' . $user->last_name }}
                                </option>
                            @endforeach
                        @endif
                    </select>

                    <input type="hidden" id="hireUserIds" value="{{ $hirePartner->user_ids }}">
                </div> --}}

                <button class="btn btn-primary px-5 mt-2" type="submit"><i class="bx bx-plus mr-1"></i>Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/hirePartner.js') }}"></script>
@endsection

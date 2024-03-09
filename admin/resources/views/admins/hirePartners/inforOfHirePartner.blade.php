@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Thông tin của nhóm cày thuê
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li aria-current="page" class="breadcrumb-item active">Nhóm cày thuê</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên nhóm cày thuê</label>
                <input class="form-control" id="name" name="name" type="text" value="{{ $hirePartner->name }}"
                    disabled>
            </div>
            <div class="form-group">
                <label for="rate">Tỉ lệ chiết khấu</label>
                <input class="form-control" id="rate" name="rate" type="number" value="{{ $hirePartner->rate }}"
                    disabled>
            </div>
            <div class="form-group">
                <label for="rate"></label>Token</label>
                <input class="form-control" id="token" name="token" type="text" value="{{ $hirePartner->token }}"
                    disabled>
            </div>

            <div class="mb-3">
                <label for="token" class="form-label">Thông tin người dùng</label>

                <div class="card">
                    <div class="card-body">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->full_name }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- <script src="{{ asset('js/admin/category.js') }}"></script> --}}
@endsection

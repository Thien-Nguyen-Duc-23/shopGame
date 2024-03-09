@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Thêm đối tác giới thiệu
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li aria-current="page" class="breadcrumb-item active">Nhóm đối tác giới thiệu</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.refer.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Tên khách tiếp thị liên kết</label>
                    <input class="form-control" id="name" name="name" type="text">
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="rate">Tỉ lệ chiết khấu</label>
                    <input class="form-control" id="rate" name="rate" type="number">
                </div>
                @error('rate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <button class="btn btn-primary px-5 mt-2" type="submit"><i class="bx bx-plus mr-1"></i>Tạo mới</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/category.js') }}"></script>
@endsection

@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Thêm nhóm KOL
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li aria-current="page" class="breadcrumb-item active">Nhóm KOL</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.kol.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Tên kol</label>
                    <input 
                        type="text" 
                        class="form-control @error('name') font-weight-normal border border-danger @enderror" 
                        id="name" 
                        name="name" 
                        placeholder="Vui lòng nhập tên kol" 
                        value="{{ old('name') }}" 
                        required
                    >
                    @error('name')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('name') }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="rate" class="form-label">Chiết khấu</label>
                    <input 
                        class="form-control @error('rate') font-weight-normal border border-danger @enderror"
                        id="rate" 
                        name="rate" 
                        type="number" 
                        value="{{ old('rate') }}" 
                        required
                    >
                    @error('rate')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('rate') }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="token" class="form-label">Token</label>
                    <input 
                        type="text" 
                        class="form-control @error('token') font-weight-normal border border-danger @enderror" 
                        id="token" 
                        name="token" 
                        placeholder="Vui lòng nhập token" 
                        value="{{ old('token') }}" 
                        required
                    >
                    @error('rate')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('token') }}</p>
                    @enderror
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
    <script src="{{ asset('js/admin/hirePartner.js') }}"></script>
@endsection

@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Thông tin Kol
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li aria-current="page" class="breadcrumb-item active">Nhóm KOL</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Tên kol</label>
                <input 
                    type="text" 
                    class="form-control @error('name') font-weight-normal border border-danger @enderror" 
                    id="name" 
                    name="name" 
                    placeholder="Vui lòng nhập tên kol" 
                    value="{{ old('name', $kolPartner->name) }}" 
                    required
                    disabled
                >
            </div>
            <div class="mb-3">
                <label for="rate" class="form-label">Chiết khấu</label>
                <input 
                    class="form-control @error('rate') font-weight-normal border border-danger @enderror"
                    id="rate" 
                    name="rate" 
                    type="number" 
                    value="{{ old('rate', $kolPartner->rate) }}" 
                    required
                    disabled
                >
            </div>
            <div class="mb-3">
                <label for="token" class="form-label">Token</label>
                <input 
                    type="text" 
                    class="form-control @error('token') font-weight-normal border border-danger @enderror"
                    id="token" 
                    name="token" 
                    placeholder="Vui lòng nhập token" 
                    value="{{ $kolPartner->token ? url()->current() .'?token='.$kolPartner->token : null }}" 
                    required
                    disabled
                >
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
                                @foreach ($userIds as $userId)
                                    <tr>
                                        <th scope="row">{{$userId->id}}</th>
                                        <td>{{$userId->full_name}}</td>
                                        <td>{{$userId->email}}</td>
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
    {{--  <script src="{{ asset('js/admin/hirePartner.js') }}"></script>  --}}
@endsection

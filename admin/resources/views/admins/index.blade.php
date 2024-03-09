@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Trang chủ
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    {{-- <li class="breadcrumb-item active" aria-current="page">Elements</li> --}}
@endsection
@section('content')
Đã đến index
@endsection
@section('scripts')
@endsection
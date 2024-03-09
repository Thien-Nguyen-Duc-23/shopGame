@extends('layouts.admins.admin.app')
@section('style')
    <style>
        .carousel {
            width:95%;
            margin:0px auto;
        }
        .slick-slide {
            margin:10px;
        }
        .slick-slide img {
            width:100%;
            height: 700px;
            border: 2px solid #fff;
        }
    </style>
@endsection
@section('title')
    Xem trước slider
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.slider.index') }}">Slider</a></li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="carousel">
                @foreach ($sliders as $slider)
                    <div><img src="{{ !empty($slider->library->link) ? $slider->library->link : '' }}"></div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/js/admin/slider.js') }}?token={{ time() }}"></script>
@endsection

@extends('layouts.app')

@section('content')
    <section class="top-section py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-8 col-sm-12">
                    <div class="carousel">
                        @foreach ($sliders as $slider)
                            <img src="{{ !empty($slider->library->link) ? $slider->library->link : '' }}" width="100%" />
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="bg-white list-top">
                        <ul class="nav nav-tabs d-flex" id="myTab" role="tablist" style="font-size: 14px;">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active fw-semibold text-dark link-danger" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">TOP NẠP <br class="d-block d-md-none"> T.03</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fw-semibold text-dark link-danger" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">TOP <br class="d-block d-md-none"> NGÀY</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fw-semibold text-dark link-danger" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">PHẦN <br class="d-block d-md-none"> THƯỞNG</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0" style="font-size: 14px;">
                                <div class="container">

                                    <div class="row mt-2">
                                        <div class="col-7 col-sm d-flex">
                                            <div class="position-relative">
                                                <i class="bx top-card-of-month-i bxs-shield"></i>
                                                <span class="top-card-of-month-bx-span">1</span>
                                            </div>
                                            <span class="top-card-of-month-span">One of three columns</span>
                                        </div>
                                        <div class="col-5">
                                            <span class="w-100 d-block fw-bold text-white btn-color-red rounded-3 text-center mx-auto p-1">3,000,000<small> đ </small></span>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-7 col-sm d-flex">
                                            <div class="position-relative">
                                                <i class="bx top-card-of-month-i bxs-shield"></i>
                                                <span class="top-card-of-month-bx-span">1</span>
                                            </div>
                                            <span class="top-card-of-month-span">One of three columns</span>
                                        </div>
                                        <div class="col-5">
                                            <span class="w-100 d-block fw-bold text-white btn-color-red rounded-3 text-center mx-auto p-1">3,000,000<small> đ </small></span>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-7 col-sm d-flex">
                                            <div class="position-relative">
                                                <i class="bx top-card-of-month-i bxs-shield"></i>
                                                <span class="top-card-of-month-bx-span">1</span>
                                            </div>
                                            <span class="top-card-of-month-span">One of three columns</span>
                                        </div>
                                        <div class="col-5">
                                            <span class="w-100 d-block fw-bold text-white btn-color-red rounded-3 text-center mx-auto p-1">3,000,000<small> đ </small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">wfewwefwe</div>
                            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                <div class="overflow-auto px-1 m-3" style="max-height: 260px;">
                                    <div class="relative">
                                        <p style="text-align:center"><strong><span style="color:#e67e22">🎁QUÀ ĐUA TOP THÁNG CỰC HẤP DẪN🎁</span><br>
                                        Top 1</strong>: 200.000 đ hoặc Acc Roblox<br>
                                        <strong>Top 2</strong>: 150.000 đ<br>
                                        <strong>Top 3</strong>: 100.000 đ<br>
                                        <strong>Top 4</strong>: 50.000 đ<br>
                                        &nbsp;</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (!$categories->isEmpty())
                @foreach ($categories as $category)
                    @if (!$category->children->isEmpty() || !$category->products->isEmpty())
                        <div class="list-cat mb-4">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="bg-white py-2">
                                        <span class="text-uppercase fs-5 fw-bolder text-danger px-2">{{ $category->name }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="list-cat-inner p-2">
                                <div class="row">
                                    @if (!$category->children->isEmpty()) 
                                        @foreach ($category->children as $children)
                                            <div class="col-6 col-md-3 item height-272-px">
                                                <a href="{{ route('client.product.list', [
                                                        'uri_parent' => $category->uri, 
                                                        'uri_children' => $children->uri
                                                    ]) }}"
                                                    class="bg-white p-2 d-block"
                                                >
                                                    <div class="h-50 w-100">
                                                        <img class="w-100 height-147-px" src="{{ !empty($children->library->link) ? $children->library->link : 'https://khoroblox.vn/upload/product/35ff6031cff9fd2fb0304ebd8dd2be8b.gif' }}">
                                                    </div>
                                                    <div class="m-1 text-dark">
                                                        <span class="fw-bold text-uppercase" style="font-size: 13px;">{{ $children->name }}</span>
                                                        <p style="font-size: 12px;">{{ $children->description }}</p>
                                                        <div class="right-2 left-2 mt-2">
                                                            <button class="bbXLrA">Đang Giảm Giá 30-50%</button>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @else if (!$category->products->isEmpty())
                                        @foreach ($category->products as $product)
                                            <div class="col-6 col-md-3 item height-272-px">
                                                <a href="{{ route('client.product.list', [
                                                        'uri_category' => $category->uri, 
                                                        'uri_product' => $product->uri
                                                    ]) }}"
                                                    class="bg-white p-2 d-block"
                                                >
                                                    <div class="h-50 w-100">
                                                        <img class="w-100 height-147-px" src="{{ !empty($product->library->link) ? $product->library->link : 'https://khoroblox.vn/upload/product/35ff6031cff9fd2fb0304ebd8dd2be8b.gif' }}">
                                                    </div>
                                                    <div class="m-1 text-dark">
                                                        <span class="fw-bold text-uppercase" style="font-size: 13px;">{{ $product->name }}</span>
                                                        <p style="font-size: 12px;">{{ $product->description }}</p>
                                                        <div class="right-2 left-2 mt-2">
                                                            <button class="bbXLrA">Đang Giảm Giá 30-50%</button>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </section>
@endsection

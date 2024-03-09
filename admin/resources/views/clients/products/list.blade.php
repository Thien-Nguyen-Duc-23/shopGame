@extends('layouts.app')

@section('content')
    <section class="top-section-2 detail-page py-5">
        <div class="container">
            <div class="row">
                <div>
                    <span>DANH MỤC/</span> 
                    <span class="text-danger fw-bold text-uppercase">{{ $category->parent->name ?? null }}</span>
                </div>
                <div class="m-2">
                    <span class="text-danger fw-bold font-size-14px text-uppercase">{{ $category->name ?? null }}</span> <br>
                    {{ $category->description }}
                </div>
            </div>
            <div class="row mt-3">
                <div class="row">
                    <span class="fw-bold font-size-14px">BỘ LỌC TÌM KIẾM</span>
                </div>
                <form action="{{ route('client.product.list', [$category->parent->uri, $category->uri]) }}" method="GET" id="form-search-list-product">
                    <div class="row mt-1">
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="ID - ví dụ: 1759383" name="keywords" id="keywords-form-search-list-product" value="{{ old('keywords', request('keywords')) }}">
                            </div>
                            <div class="col-3">
                                <select class="form-select" id="select-price" data-placeholder="-- Giá tiền --" name="pricing">
                                    <option value="" selected>-- Giá tiền --</option>
                                    @foreach (\App\Constants::SELECT_PRICE_PRODUCT as $key => $priceProduct)
                                        <option value="{{ $key }}" {{ request('pricing') ? (request('pricing') == $key ? "selected" : "") : "" }} >{{ $priceProduct }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-danger text-center w-100">
                                    <i class="bx bxs-filter-alt" style="top: 2px;"></i>
                                    <span>Lọc</span>
                                </button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-dark text-center w-100" id="reset-form-search-list-product">
                                    <span>Xóa lọc</span>
                                </button>
                            </div>
                    </div>
                </form>
            </div>

            <div class="row mt-3">
                @if ($products->isNotEmpty())
                    @foreach ($products as $product)
                        <div class="col-3 mb-3 list-price-item-data">
                            <a href="{{ route('client.product.detail', [
                                    'uri_category' => $product->category->uri ?? '', 
                                    'uri_product' => $product->uri ?? ''
                                ]) }}"
                                class="list-price-item-a"
                            >
                                <div style="height: 260px;">
                                    <span class="bbXLrA position-absolute m-2">MS {{ $product->id }}</span>
                                    <span>
                                        <img class="w-100 height-160-px" src="{{ !empty($product->library->link) ? $product->library->link : 'https://khoroblox.vn/upload/product/35ff6031cff9fd2fb0304ebd8dd2be8b.gif' }}">
                                    </span>
                                    <div class="mt-2 text-dark align-self-center text-center d-flex justify-content-center border-bottom">
                                        <span>{{ $product->name }}</span>
                                    </div>
                                    <div class="text-dark ps-1">
                                        {{ $product->description }}
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <div class="text-center">
                                        @if ($product->sale_pricing) 
                                            <span class="text-decoration-line-through text-dark"><small>{{ $product->sale_pricing ? number_format($product->sale_pricing,0,",",",") : 0 }}đ</small></span>
                                            <span style="color:#00CC66">➨</span>
                                            <span class="text-danger">{{ $product->pricing ? number_format($product->pricing,0,",",",") : 0 }}<small>đ</small></span>
                                        @else
                                            <span class="text-danger">{{ $product->pricing ? number_format($product->pricing,0,",",",") : 0 }}<small>đ</small></span>
                                        @endif
                                    </div>
                                    <div>
                                        <button class="btn btn-danger text-center w-100">Xem chi tiết</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <div class="py-5 h-100 text-center fw-bold">
                        Không tìm thấy dữ liệu hoặc đã được bán hết. Vui lòng liên hệ Fanpage ở dưới để được bổ sung, Xin cám ơn!
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

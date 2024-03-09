@extends('layouts.app')

@section('content')
    <section class="top-section-2 detail-page py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="h-20 py-2">
                        <img src="https://khoroblox.vn/upload/product/762c134c9d93ab26983261fc87103f90.png" class="img-fluid">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="bg-danger text-white rounded">
                        <div class="py-2 ms-3">
                            <h5 class="">Mã số {{ $product->id }}</h5>
                            <span class="font-size-13px">{{ $product->category->name ?? "" }}</span>
                        </div>
                    </div>

                    <div class="py-2 rounded">
                        <div class="bg-color-red-100 text-danger ">
                            <div class="row">
                                <div class="col-4">
                                    <div class="ps-3 font-weight-700">
                                        <small class="font-size-11px">THẺ CÀO</small> <br>
                                        <span class="fs-4">{{ $product->card_pricing ? number_format($product->card_pricing,0,",",",") : 0 }}đ</span>
                                    </div>
                                </div>
                                <div class="col-4 mt-2 align-self-center text-center d-flex justify-content-center">
                                    <small class="">hoặc</small>
                                </div>

                                <div class="col-4">
                                    <div class="ps-3 font-weight-700">
                                        <small class="font-size-11px">ATM/MOMO chỉ cần</small> <br>
                                        <span class="fs-4">{{ $product->pricing ? number_format($product->pricing,0,",",",") : 0 }}đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-3 border ps-3">
                            {{ $product->description }}
                            Tộc [V4]: Human [Full Gear] <br>
                            Tộc [V4]: Human [Full Gear] <br>
                            Tộc [V4]: Human [Full Gear]
                        </div>
                        <div class="mt-3">
                            <button class="w-100 bg-danger text-white border-0 height-50-px" data-bs-toggle="modal" data-bs-target="#modalOrderProcess" id="btn-order-now">MUA NGAY</button>
                            {{--  <button class="w-100 bg-danger text-white border-0 height-50-px">MUA NGAY</button>  --}}
                        </div>
                    </div>
                </div>
            </div>

            @if (!$listProductSamePrice->isEmpty())
                <div class="list-price-item">
                    <div class="mx-auto py-2 m-1">
                        <span class="text-uppercase fs-5 fw-bolder text-danger">Tài khoản đồng giá</span>
                    </div>
                    <div class="row">
                        @foreach ($listProductSamePrice as $productSamePrice)
                            <div class="col-6 col-md-3 p-1 height-272-px">
                                <a href="{{ route('client.product.detail', [
                                        'uri_category' => $productSamePrice->category->uri ?? '', 
                                        'uri_product' => $productSamePrice->uri ?? ''
                                    ]) }}"
                                    class="list-price-item-a"
                                >
                                    <div class="height-160-px w-100">
                                        <img class="h-100 w-100" src="{{ !empty($productSamePrice->library->link) ? $productSamePrice->library->link : '' }}">
                                    </div>
                                    <div class="m-1 text-dark">
                                        <span class="fw-bold text-uppercase" style="font-size: 13px;">{{ $productSamePrice->name }}</span>
                                        <p style="font-size: 12px;">{{ $productSamePrice->description }}</p>
                                        <div class="right-2 position-absolute left-2 mt-2">
                                            <button class="bbXLrA">Đang Giảm Giá 30-50%</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modalOrderProcess" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <div class="align-self-center text-center d-flex justify-content-center w-100 flex-wrap">
                        <h5 class="modal-title w-100">Xác nhận mua hàng</h5> </br>
                        <p class="w-100 m-0 code"> #{{ $product->id }} </p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="relative-2 id-error-form-server" hidden></div>
                    <div class="pt-3">
                        <div class="line">
                            {{ $product->description }}
                        </div>
                        <div class="line">
                            {{ $product->description }}
                        </div>
                        <div class="line">
                            {{ $product->description }}
                        </div>
                        <div class="mt-3 mtLine">
                            <label class="form-label">Mã giảm giá</label>
                            <input @if (auth()->check()) id="promo-your-code-id" @endif type="text" class="form-control promo-your-code-class" placeholder="Mã giảm giá" name="keywords" value="">
                            <div class="relative" id="error-promo-your-code-id" hidden>Mã giảm giá này không tìm tại trên hệ thống</div>
                        </div>
                        @if (auth()->check())
                            <div class="mt-3 p-1">
                                <div class="row price1">
                                    <div class="col-6 number1">Số dư của bạn</div>
                                    <div class="col-6 vnd">0đ</div>
                                </div>
                                <div class="row price2">
                                    <div class="col-6 number2">Giá của sản phẩm</div>
                                    <div class="col-6 sale2">
                                        {{ $product->current_price ?? 0 }}
                                        đ
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="mt-3 mtLine mb-2">
                                <span class="text-uppercase">Vui lòng đăng nhập để mua tài khoản.</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer blockBtn">
                    @if (auth()->check())
                        <button type="button" class="btn btn-primary col-7 font-weight-500" id="submit-order-client" data-quantity="1" data-product-id="{{ $product->id }}">Xác nhận mua</button>
                    @else
                        <button type="button" class="btn btn-primary col-7 text-uppercase font-weight-500 login-form-process" id="">Đăng nhập</button>
                    @endif
                    <button type="button" class="btn btn-secondary col-4" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Modal Success-->
    <div class="modal fade" id="modalOrderSuccess" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <div class="align-self-center text-center d-flex justify-content-center w-100 flex-wrap">
                        <h5 class="modal-title w-100">Đặt hàng thành công</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pt-3">
                        <div class="line">
                            Đơn hàng của bạn đã đặt thành công!
                        </div>
                    </div>
                </div>
                <div class="modal-footer blockBtn-2">
                    <button type="button" class="btn btn-secondary col-4" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Success -->
@endsection

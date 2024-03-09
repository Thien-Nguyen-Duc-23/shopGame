@extends('layouts.app')

@section('content')
    <section class="top-section-2 detail-page py-4">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <div class="row ">
                        <div class="col-3 align-self-center">
                            <img class="w-100 rounded-circle border" src="https://khoroblox.vn/assets/images/unknown-avatar.jpg">
                        </div>
                        <div class="col-9 font-size-14px p-0 ">
                            <p class="text-sm-start m-0">
                                <b>ID:</b> 46684 
                            </p>
                            <p class="text-sm-start m-0">
                                <b>Số dư:</b>
                                <span class="text-danger fw-bold">0 đ</span>
                            </p>
                            <p class="text-sm-start m-0">
                                <b>Robux:</b>
                                <span class="text-danger fw-bold">0</span>
                            </p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <span class="" style="top: -2px;">
                                <i class="tw-text-lg bx bxs-user"></i>
                            </span>
                            <span class="tw-ml-10 tw-block font-weight-size-600">Tài khoản </span>
                        </div>
                        <div class="col-12">
                            <div class="ps">
                                <ul style="list-style: none;font-size: 15px;font-weight: 500;">
                                    <a class="my-1 d-block color-inherit text-decoration-none">Thông tin chung</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Hạng thành viên</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Đổi mật khẩu</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Dùng giftcode</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Giới thiệu</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Tài liệu API</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Thông tin chung</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Hạng thành viên</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <span class="" style="top: -2px;">
                                <i class="tw-text-lg bx bxs-game"></i>
                            </span>
                            <span class="tw-ml-10 tw-block fw-medium">Trò chơi </span>
                        </div>
                        <div class="col-12">
                            <div class="ps">
                                <ul style="list-style: none;font-size: 15px;font-weight: 500;">
                                    <a class="my-1 d-block color-inherit text-decoration-none">Rút vật phẩm</a>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <span class="" style="top: -2px;">
                                <i class="tw-text-lg bx bxs-wallet-alt"></i>
                            </span>
                            <span class="tw-ml-10 tw-block fw-medium {{ route('client.user.recharge') ? 'color-btn-239' : '' }}">Nạp tiền </span>
                        </div>
                        <div class="col-12">
                            <div class="ps">
                                <ul style="list-style: none;font-size: 15px;font-weight: 500;">
                                    <a class="my-1 d-block color-inherit text-decoration-none {{ route('client.user.recharge') ? 'color-btn-239' : '' }}">Nạp thẻ cào (tự động)</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Nạp qua ATM/MOMO</a>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <span class="" style="top: -2px;">
                                <i class="tw-text-lg bx bxs-notepad"></i>
                            </span>
                            <span class="tw-ml-10 tw-block fw-medium">Lịch sử</span>
                        </div>
                        <div class="col-12">
                            <div class="ps">
                                <ul style="list-style: none;font-size: 15px;font-weight: 500;">
                                    <a class="my-1 d-block color-inherit text-decoration-none">Lịch sử chơi game</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Lịch sử mua nick</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Lịch sử mua vật phẩm</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Lịch sử chuyển khoản</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Lịch sử cày thuê</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Lịch sử mua robux</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 rounded background-color-245">
                    <div class="container my-3">
                        <div class="row">
                            <div>
                            <p class="font-weight-600 font-size-18px my-0">Nạp Thẻ Cào</p>
                            <p class="font-size-14px color-btn-239 my-0 font-weight-500">Tự động 24/7 - Nhập sai mệnh giá sẽ mất thẻ.</p>
                            </div>
                        </div>
                        <div class="row" style="max-width: 28rem;">
                            <div class="col-12 mt-3">
                                <p class="fw-bold color-btn-239">NẠP THẺ LỖI, VUI LÒNG LIÊN HỆ FANPAGE HỖ TRỢ.</p>
                            </div>
                            <div class="col-12">
                                <p class="font-size-14px">Nhà mạng <span class="fw-bold">(Ưu tiên Viettel, Vinaphone)</span></p>
                            </div>
                            <div class="row">
                                <div class="col-4 relative">
                                    <input type="radio" name="type" value="Vinaphone" class="input-absolute vn">
                                    <div class="branch" style="position: relative; border: 2px solid red; border-radius: 5px; padding: 7px;">
                                        <img src="https://khoroblox.vn/upload/card/viettel.png" alt="" style="max-width: 100%;">
                                    </div>

                                </div>
                                <div class="col-4 relative">
                                    <input type="radio" name="type" value="Vinaphone2" class="input-absolute vn">
                                    <div class="branch" style="position: relative; border: 2px solid red; border-radius: 5px; padding: 7px;">
                                        <img src="https://khoroblox.vn/upload/card/viettel.png" alt="" style="max-width: 100%;">
                                    </div>
                                </div>
                                
                                <div class="col-4 branch" style="position: relative; border: 2px solid red; border-radius: 5px; padding: 7px;">
                                    <input type="radio" name="type" value="ddd" class="input-absolute vn">
                                    <img src="https://khoroblox.vn/upload/card/viettel.png" alt="" style="max-width: 100%;">
                                </div>
                                <div class="col-4">
                                    2 of 3
                                </div>
                                <div class="col-4">
                                    3 of 3
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

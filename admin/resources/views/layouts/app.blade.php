<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ !empty($configSystem['website_title']) ? $configSystem['website_title'] : 'Cloudzone Dev' }}</title>
    <!-- Fonts -->
    <link href="//fonts.bunny.net" rel="dns-prefetch">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- Bootstrap css --}}
    <link href="{{ asset('bootstrap5/css/bootstrap.min.css') }}" rel="stylesheet">
    {{--  <link rel="stylesheet" href="{{ asset('bootstrap5/css/bootstrap.min.css') }}">  --}}
    {{-- Font Awesome 5  --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    {{-- Custom style --}}
    <link rel="stylesheet" href="{{ asset('css/client.css') }}?token={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" href="{{ asset('libraries/admin/css/slick/slick.css') }}" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" href="{{ asset('libraries/admin/css/slick/slick-theme.css') }}" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('libraries/admin/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libraries/admin/css/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <!-- Scripts -->
    <script src="{{ asset('libraries/admin/js/jquery.min.js') }}"></script>
</head>

<body>
    <div id="app">
        <main>
            @include('layouts/users/includes/header')
            @yield('content')
        </main>
        <div class="loading-overlay">
            <span class="fas fa-spinner fa-3x fa-spin"></span>
        </div>

        <!-- Modal Login-->
        <div class="modal fade" id="modal-client-login" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="align-self-center text-center d-flex justify-content-center w-100 flex-wrap">
                            <img clas="modal-title m-auto height-65-px" src="https://khoroblox.vn/upload/setting/0426812b8306bca5f49feb450356825b.png" style="height: 65px;">
                            <h5 class="modal-title w-100 text-uppercase color-title-login">Đăng nhập tài khoản</h5>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="lh-lg btn btn-primary w-100" data-bs-dismiss="modal">Facebook</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="lh-lg btn btn-secondary w-100 bg-btn-google-login" data-bs-dismiss="modal">Google</button>
                            </div>
                        </div>
                        <div class="mt-2 mb-2">
                            <div class="relative-2 id-error-form-server" hidden></div>
                            <div class="relative-3 id-error-form-success" hidden></div>
                        </div>
                        <div class="mt-2 mb-2">
                            <label for="exampleInputEmail1" class="form-label lable-form-login">Tài khoản <span class="text-danger">*</span></label>
                            <input type="text" class="form-control boder-form-login id-form-user-name" required>
                            <div class="relative-2 id-error-form-user-name" hidden></div>
                        </div>
                        <div class="mt-2 mb-2">
                            <label for="exampleInputEmail1" class="form-label lable-form-login">Mật khẩu <span class="text-danger">*</span></label>
                            <input type="password" class="form-control boder-form-login id-form-password" required>
                            <div class="relative-2 id-error-form-password" hidden></div>
                        </div>

                        <div class="mt-3 mb-2">
                            <label for="exampleInputEmail1" class="form-label lable-form-login float-end font-size-14px">Quên mật khẩu?</label>
                        </div>
                        <div class="mt-4 mb-2">
                            <button type="button" class="lh-lg w-100 btn btn-primary text-uppercase background-color-239 fst-500 font-weight-500" id="client-submit-login">Đăng nhập</button>
                        </div>
                        <div class="mt-3 mb-2">
                            <button type="button" class="lh-lg w-100 btn btn-light border border-1 text-uppercase background-color-white font-weight-500" id="id-btn-client-register">Tạo tài khoản</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Login -->

        <!-- Modal Register-->
        <div class="modal fade" id="modal-client-register" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="align-self-center text-center d-flex justify-content-center w-100 flex-wrap">
                            <img clas="modal-title m-auto height-65-px" src="https://khoroblox.vn/upload/setting/0426812b8306bca5f49feb450356825b.png" style="height: 65px;">
                            <h5 class="modal-title w-100 text-uppercase color-title-login">Đăng ký tài khoản</h5>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="lh-lg btn btn-primary w-100" data-bs-dismiss="modal">Facebook</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="lh-lg btn btn-secondary w-100 bg-btn-google-login" data-bs-dismiss="modal">Google</button>
                            </div>
                        </div>
                        <div class="mt-2 mb-2">
                            <div class="relative-2 id-error-form-server" hidden></div>
                            <div class="relative-3 id-error-form-success" hidden></div>
                        </div>
                        <div class="mt-4 mb-2">
                            <label for="exampleInputEmail1" class="form-label lable-form-login">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control boder-form-login" id="id-form-input-email" required>
                            <div class="relative-2 id-error-form-email" hidden></div>
                        </div>
                        <div class="mt-2 mb-2">
                            <label for="exampleInputEmail1" class="form-label lable-form-login">Tài khoản <span class="text-danger">*</span></label>
                            <input type="text" class="form-control boder-form-login" id="id-form-user-name" required>
                            <div class="relative-2 id-error-form-user-name" hidden></div>
                        </div>
                        <div class="mt-2 mb-2">
                            <label for="exampleInputEmail1" class="form-label lable-form-login">Mật khẩu <span class="text-danger">*</span></label>
                            <input type="password" class="form-control boder-form-login" id="id-form-password" required>
                            <div class="relative-2 id-error-form-password" hidden></div>
                        </div>
                        <div class="mt-2 mb-2">
                            <label for="exampleInputEmail1" class="form-label lable-form-login">Xác nhận mật khầu <span class="text-danger">*</span></label>
                            <input type="password" class="form-control boder-form-login" id="id-form-password-confirmation" required>
                            <div class="relative-2 id-error-form-password-confirmation" hidden></div>
                        </div>
                        <div class="mt-4 mb-2">
                            <button type="button" class="lh-lg w-100 btn btn-primary text-uppercase background-color-239 fst-500 font-weight-500" id="client-submit-register">Đăng ký</button>
                        </div>
                        <div class="mt-3 mb-2">
                            <button type="button" class="lh-lg w-100 btn btn-light border border-1 text-uppercase background-color-white font-weight-500 login-form-process">Đăng nhập</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Register -->

        <!-- Modal chanrge bank-->
        <div class="modal fade" id="modal-chanrge-money" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white fs-bold justify-content-center">
                        <span class="fs-5">NẠP TIỀN - CHUYỂN KHOẢN QUA</span>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="payments">
                            <div class="row payments-lists">
                                <div class="col-4">
                                    <button class="btn py-2" type="button" id="showModalBank">
                                        <img src="images/payments/bank.png" class="img-fluid my-1 me-2">
                                        <span>ATM</span>
                                    </button>
                                </div>
                                <div class="col-4">
                                    <button class="btn py-2" type="button" id="showModalMomo">
                                        <img src="images/payments/momo.png" class="img-fluid my-1 me-2">
                                        <span>MOMO</span>
                                    </button>
                                </div>
                                <div class="col-4">
                                    <button class="btn py-2" type="button" id="showModalZalo">
                                        <img src="images/payments/zalopay.jpeg" class="img-fluid my-1 me-2">
                                        <span>ZALOPAY</span>
                                    </button>
                                </div>
                            </div>

                            <div class="row payments-info mt-4">
                                <div class="col-12">
                                    <p><span><i class="bx bx-caret-right"></i></span> Hệ thống nạp <b class="text-danger fw-bold">ATM/MOMO tự động 24/24</b>, Nạp 100k nhận 110k tiền shop</p>
                                    <p><span><i class="bx bx-caret-right"></i></span><b> Lưu ý: </b> Chuyển tiền nhanh 24/7 để tránh bị treo, chậm tiền! Nếu gửi đúng stk và nội dung mà 30p không nhận được tiền hoặc chuyển ghi sai nội dung vui lòng liên hệ page để được hỗ trợ.</p>
                                </div>
                            </div>

                            <div class="row mt-4 payments-convert">
                                <div class="col-12">
                                    <span class="form-label text-danger fw-bold">QUY ĐỔI TIỀN NẠP ATM/MOMO</span>
                                    <div class="row align-items-center mt-2">
                                        <div class="col-5 form-group relative">
                                            <label class="form-label">Số tiền bạn chuyển</label>
                                            <input type="number" name="code" placeholder="ví dụ: 100000" class="form-control fs-bold" oninput="changeAmount($(this).val())" id="amount_send">
                                        </div>
                                        <div class="col-2 text-center">
                                            <i class="bx bx-transfer-alt tw-text-gray-600 tw-text-lg"></i>
                                        </div>
                                        <div class="col-5 form-group relative">
                                            <label class="form-label">Tiền nhận trên shop</label>
                                            <input type="text" readonly="readonly" name="code" placeholder="110000" class="form-control text-danger fs-bold" id="amount_real">
                                        </div>
                                    </div>
                                    <div class="row payments-convert_format">
                                        <div class="col-12">
                                            <span class="fs-bold">
                                                <i class="tw-relative tw-font-bold bx bx-subdirectory-right" style="top: 1px;"></i>
                                                <span id="amount_Format">0&nbsp;₫</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal chanrge money -->

        <!-- Modal bank-->
        <div class="modal fade" id="bankModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bank-transfer">
                    <div class="modal-header bg-gray">
                        <img src="images/payments/bank.png" class="img-fluid me-2" alt="bank">
                        <span class="fs-5">CHUYỂN QUA NGÂN HÀNG</span>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row bank-transfer_name py-2">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-9">
                                        <p><strong>THÔNG TIN TÀI KHOẢN NGÂN HÀNG</strong></p>
                                        <p>
                                            <strong>NGÂN HÀNG : </strong><span style="color: rgb(230, 76, 76);"><strong>MB Bank</strong></span>
                                        </p>
                                        <p>
                                            <strong>SỐ TÀI KHOẢN : </strong><span style="color: rgb(230, 76, 76);"><strong><b style="color:#ee4d2d;">10009122004</b></strong></span>
                                        </p>
                                        <p>
                                            <strong>CHỦ TÀI KHOẢN : </strong><span style="color: rgb(230, 76, 76);"><strong><b style="color:#ee4d2d;">Nguyễn Trung Thành</b></strong></span>
                                        </p>
                                        <button onclick="copy('10009122004')" class="mt-2 btn btn-secondary py-1">
                                            Copy số tài khoản
                                        </button>
                                    </div>
                                    <div class="col-3">
                                        <img src="https://apiqr.web2m.com/api/generate/MB/10009122004/Thanh?amount=&amp;memo=naptien+46684&amp;is_mask=0&amp;bg=" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row bank-transfer_content my-3">
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-between py-1 px-2 border box-content bank">
                                    <span class="fs-5 fw-bold">naptien 46684</span>
                                    <button onclick="copy('naptien 46684')" class="btn py-1">
                                        COPY NỘI DUNG
                                    </button>
                                </div>
                            </div>

                            <div class="col-12 mt-2">
                                <p> <i class="tw-ml-3 bx bxs-upvote"></i> Khi chuyển khoản qua Ngân hàng (ATM) bạn cần ghi nội dung
                                <b class="text-danger fw-bold">naptien 46684</b>
                                bên trên.</p>
                            </div>
                            <div class="col-12">
                                <p class="text-danger">
                                    <i>Lưu ý: Sau khi chuyển khoản xong, hãy chờ "vài phút" rồi ấn <span class="fw-bold">"Xác nhận. Tôi đã chuyển"</span>. </i>
                                </p>
                            </div>
                            <div class="col-12">
                                <a href="https://www.messenger.com/t/105683485063866" class="p-1 bg-danger color-white confirm">
                                    Xác nhận. Tôi đã chuyển
                                </a>
                            </div>
                            <div class="col-12">
                                <p class="text-danger">
                                    <i> Các giao dịch chuyển sai "Nội dung chuyển khoản" sẽ không được xử lý tự động. Hãy liên hệ Fanpage để được hỗ trợ.</i>
                                </p>
                            </div>
                            <div class="col-12">
                                <div class="border-bottom"></div>
                            </div>
                            <div class="col-12 pt-2">
                                <p>Hướng dẫn nạp tiền qua Ngân hàng</p>
                                <button type="button" class="btn btn-success">Click xem video hướng dẫn</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal bank -->

        <!-- Modal momo-->
        <div class="modal fade" id="momoModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bank-transfer">
                    <div class="modal-header bg-gray">
                        <img src="images/payments/momo.png" class="img-fluid me-2" alt="bank">
                        <span class="fs-5">CHUYỂN KHOẢN QUA MOMO</span>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row bank-transfer_name py-2">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-9">
                                        <p><strong class="text-pink">THÔNG TIN VÍ MOMO</strong></p>
                                        <p><strong class="text-pink">CHỦ TÀI KHOẢN: <b style="color:#ee4d2d;">Nguyễn Trung Thành</b></strong></p>
                                        <p><strong class="text-pink">VÍ MOMO: <b style="color:#ee4d2d;">0393917099</b></strong></p>
                                        <button onclick="copy('0393917099')" class="mt-2 btn btn-secondary py-1">
                                            Copy số tài khoản ví Momo
                                        </button>
                                    </div>
                                    <div class="col-3">
                                        <img src="https://momosv3.apimienphi.com/api/QRCode?phone=0393917099&note=naptien+46684" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row bank-transfer_content my-3">
                            <div class="col-12">
                                <p>Nội dung <b class="text-danger">ghi chú</b> khi chuyển:</p>
                                <div class="d-flex align-items-center justify-content-between py-1 px-2 border box-content momo">
                                    <span class="fs-5 fw-bold">naptien 46684</span>
                                    <button onclick="copy('naptien 46684')" class="btn py-1">
                                        COPY NỘI DUNG
                                    </button>
                                </div>
                            </div>

                            <div class="col-12 mt-2">
                                <p> <i class="tw-ml-3 bx bxs-upvote"></i> Khi chuyển khoản qua ví Momo bạn cần ghi nội dung
                                <b class="text-danger fw-bold">naptien 46684</b>
                                bên trên.</p>
                            </div>
                            <div class="col-12">
                                <p class="text-danger">
                                    <i>Lưu ý: Sau khi chuyển khoản xong, hãy chờ "vài phút" rồi ấn <span class="fw-bold">"Xác nhận. Tôi đã chuyển"</span>. </i>
                                </p>
                            </div>
                            <div class="col-12">
                                <p class="text-danger">
                                    <i> Các giao dịch chuyển sai "Nội dung chuyển khoản" sẽ không được xử lý tự động. Hãy liên hệ Fanpage để được hỗ trợ.</i>
                                </p>
                            </div>
                            <div class="col-12">
                                <div class="border-bottom"></div>
                            </div>
                            <div class="col-12 pt-2">
                                <p>Hướng dẫn nạp tiền qua Ví Momo</p>
                                <button type="button" class="btn btn-success">Click xem video hướng dẫn</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal momo -->

         <!-- Modal zalo-->
         <div class="modal fade" id="modalZalo" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bank-transfer">
                    <div class="modal-header bg-gray">
                        <img src="images/payments/zalopay.jpeg" class="img-fluid me-2" alt="zalo">
                        <span class="fs-5">CHUYỂN KHOẢN QUA ZALOPAY</span>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row bank-transfer_name py-2">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-9">
                                        <p><strong>THÔNG TIN VÍ ZALOPAY</strong></p>
                                        <p><strong>CHỦ TÀI KHOẢN: <b style="color:#ee4d2d;">Nguyễn Trung Thành</b></strong></p>
                                        <p><strong>VÍ MOMO: <b style="color:#ee4d2d;">0393917099</b></strong></p>
                                        <button onclick="copy('0393917099')" class="mt-2 btn btn-secondary py-1">
                                            Copy số tài khoản ví ZaloPay
                                        </button>
                                    </div>
                                    <div class="col-3">
                                        <img src="https://momosv3.apimienphi.com/api/QRCode?phone=0393917099&note=naptien+46684" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row bank-transfer_content my-3">
                            <div class="col-12">
                                <p>Nội dung <b class="text-danger">ghi chú</b> khi chuyển:</p>
                                <div class="d-flex align-items-center justify-content-between py-1 px-2 border box-content zalo">
                                    <span class="fs-5 fw-bold">naptien 46684</span>
                                    <button onclick="copy('naptien 46684')" class="btn py-1">
                                        COPY NỘI DUNG
                                    </button>
                                </div>
                            </div>

                            <div class="col-12 mt-2">
                                <p> <i class="tw-ml-3 bx bxs-upvote"></i> Khi chuyển khoản qua ví ZaloPay bạn cần ghi nội dung
                                <b class="text-danger fw-bold">naptien 46684</b>
                                bên trên.</p>
                            </div>
                            <div class="col-12">
                                <p class="text-danger">
                                    <i>Lưu ý: Sau khi chuyển khoản xong, hãy chờ "vài phút" rồi ấn <span class="fw-bold">"Xác nhận. Tôi đã chuyển"</span>. </i>
                                </p>
                            </div>
                            <div class="col-12">
                                <p class="text-danger">
                                    <i> Các giao dịch chuyển sai "Nội dung chuyển khoản" sẽ không được xử lý tự động. Hãy liên hệ Fanpage để được hỗ trợ.</i>
                                </p>
                            </div>
                            <div class="col-12">
                                <div class="border-bottom"></div>
                            </div>
                            <div class="col-12 pt-2">
                                <p>Hướng dẫn nạp tiền qua ZaloPay</p>
                                <button type="button" class="btn btn-success">Click xem video hướng dẫn</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal zalo -->

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="{{ asset('libraries/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('bootstrap5/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('libraries/admin/js/slick.min.js') }}"></script>
    <script src="{{ asset('/js/user/home.js') }}?token={{ time() }}"></script>

    <script>
        /**
         * Handle Change amount
         */
        function changeAmount(amount) {
            var real_amount = 0, cur_amount = 0;
            real_amount = Math.floor(amount * 1.10); // 10%
            real_amount = real_amount.toLocaleString("vi-VN", {style : 'currency', currency : 'VND'});
            cur_amount =  Math.floor(amount).toLocaleString("vi-VN", {style : 'currency', currency : 'VND'});
            $("#amount_real").val(real_amount);
            $("#amount_Format").text(cur_amount);
        }

        /**
         * Handle copy
         */
        function copy(iduser){
            navigator.clipboard.writeText(iduser).then(function() {
            alert('Copy thành công');
            }, function(err) {
            console.error('Lá»—i copy: ', err); // bao loi
            });
        }
    </script>
</body>
<footer class="bg-dark text-light">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-6">
                <p>
                    <img src="https://khoroblox.vn/upload/setting/0426812b8306bca5f49feb450356825b.png" width="250px"
                        alt="">
                </p>
                <h5>KHOROBLOX.VN | SHOP BÁN ACC UY TÍN - CHẤT LƯỢNG - GIÁ RẺ</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Delete User</a></li>
                    <li><a href="#">DMCA.com Protection Status</a></li>
                </ul>
            </div>
            <hr>
            <p class="text-center">KHOROBLOX.VN - HỆ THỐNG BÁN ACC TỰ ĐỘNG - ĐẢM BẢO UY TÍN VÀ CHẤT LƯỢNG.</p>
            <p class="text-center">&copy; Vận hành bởi WonJunSeong, All Rights Reserved.</p>
        </div>
    </div>
</footer>

</html>

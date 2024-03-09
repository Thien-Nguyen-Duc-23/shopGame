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

        <!-- Modal chanrge money-->
        <div class="modal fade" id="modal-chanrge-money" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">NẠP TIỀN - CHUYỂN KHOẢN QUA</div>
                    <div class="modal-body">
                        <div class="row payments">
                            <div class="col-4">
                                <button class="btn py-2" type="button">
                                    <img src="images/payments/bank.png" class="img-fluid my-1 me-2">
                                    <span>ATM</span>
                                </button>
                            </div>
                            <div class="col-4">
                                <button class="btn py-2" type="button">
                                    <img src="images/payments/momo.png" class="img-fluid my-1 me-2">
                                    <span>ATM</span>
                                </button>
                            </div>
                            <div class="col-4">
                                <button class="btn py-2" type="button">
                                    <img src="images/payments/zalopay.jpeg" class="img-fluid my-1 me-2">
                                    <span>ATM</span>
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="">
                                    <p><span><i class="bx bx-caret-right"></i></span> Hệ thống nạp <b class="tw-text-red-600">ATM/MOMO tự động 24/24</b>, Nạp 100k nhận 110k tiền shop</p>
                                    <p><span><i class="bx bx-caret-right"></i></span><b> Lưu ý: </b> Chuyển tiền nhanh 24/7 để tránh bị treo, chậm tiền! Nếu gửi đúng stk và nội dung mà 30p không nhận được tiền hoặc chuyển ghi sai nội dung vui lòng liên hệ page để được hỗ trợ.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal chanrge money -->

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="{{ asset('libraries/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('bootstrap5/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('libraries/admin/js/slick.min.js') }}"></script>
    <script src="{{ asset('/js/user/home.js') }}?token={{ time() }}"></script>
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

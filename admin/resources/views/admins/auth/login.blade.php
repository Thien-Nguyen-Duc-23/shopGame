@extends('layouts.admins.admin.auth')
@section('content')
    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
        <div class="col mx-auto">
            <div class="mb-4 text-center">
                <img src="{{ asset("images/logo-default.png") }}" width="180" alt="" />
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="text-center">
                            <h3 class="">Đăng nhập</h3>
                            {{--<p>Don't have an account yet? <a href="authentication-signup.html">Sign up here</a></p>--}}
                        </div>
                        {{--<div class="d-grid">
                            <a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
                            <img class="me-2" src="assets/images/icons/search.svg" width="16" alt="Image Description">
                            <span>Sign in with Google</span></span>
                            </a> <a href="javascript:;" class="btn btn-facebook"><i class="bx bxl-facebook"></i>Sign in with Facebook</a>
                        </div>
                        <div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH EMAIL</span>
                            <hr/>
                        </div>--}}
                        <div>
                            @if ($errors->any())
                                <div class="alert alert-danger" style="margin-top:20px">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session("error"))
                                <div class="bg-danger">
                                    <p>{{session("error")}}</p>
                                </div>
                            @endif
                            @if(session("fails"))
                                <div class="bg-danger">
                                    <p>{{session("fails")}}</p>
                                </div>
                            @endif
                        </div>
                        <div class="form-body">
                            <form class="row g-3" action="{{ route("checkLogin") }}" id="form-login" method="post">
                                @csrf
                                <div class="col-12">
                                    <label for="inputEmailAddress" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="inputEmailAddress" placeholder="Email Address">
                                    <div id="notication-email"></div>
                                </div>
                                <div class="col-12">
                                    <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" value="" placeholder="Enter Password">
                                        <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                    </div>
                                    <div id="notication-password"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="remember">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-md-6 text-end">
                                    {{--<a href="">Quên mật khẩu ?</a>--}}
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Đăng nhập</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!--Password show & hide js -->
    <script>
        $(document).ready(function () {

            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") === "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") === "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });

            $('#form-login').on('submit', function (e) {
                // e.preventDefault();
                var email = $('#inputEmailAddress').val();
                var password = $('#inputChoosePassword').val();
                $('#notication-email').text('');
                $('#notication-password').text('');

                $('#inputEmailAddress').removeClass('is-invalid');
                $('#inputChoosePassword').removeClass('is-invalid');

                if ( email.length )
                {
                    if ( !validateEmail( email ) ) {
                        $('#inputEmailAddress').addClass('is-invalid');
                        $('#notication-email').html('<span class="text-danger">Email không đúng định dạng</span>');
                        return false;
                    }
                }
                else {
                    $('#notication-email').html('<span class="text-danger">Email không được để trống</span>');
                    $('#inputEmailAddress').addClass('is-invalid');
                    return false;
                }

                if (!password.length)
                {
                    $('#notication-password').html('<span class="text-danger">Mật khẩu không được để trống</span>');
                    $('#inputChoosePassword').addClass('is-invalid');
                    return false;
                }

                return true;

            });

            function validateEmail(email) {
                // Biểu thức chính quy để kiểm tra định dạng email
                var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return regex.test(email);
            }

        });
    </script>
@endsection

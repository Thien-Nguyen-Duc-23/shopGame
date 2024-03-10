$(document).ready(function () {
    let overlay = document.getElementsByClassName('loading-overlay')[0]

    $('.carousel').slick({
        arrows: true,
        dots: true,
        centerMode: true,
        autoplay: true,
        autoplaySpeed: 1000,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });

    $("#select-price").select2({
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    });


    $(document).on('click', '#reset-form-search-list-product', function (e) {
        e.preventDefault();
        $("#keywords-form-search-list-product").val("");
        $("#select-price").val("").trigger('change')
    });

    $(document).on('click', '#id-btn-client-register', function (e) {
        e.preventDefault();
        $('#modalOrderProcess').modal('hide');
        $('#modal-client-login').modal('hide');
        $('#modal-client-register').modal('show');
    });

    $(document).on('click', '#submit-order-client', function (e) {
        e.preventDefault();
        var _token = $('meta[name="csrf-token"]').attr('content');
        var productId = $(this).attr('data-product-id');
        var quantity = $(this).attr('data-quantity');
        var promoYourCodeId = $('#promo-your-code-id').val();

        $.ajax({
            url: '/client/order',
            type: 'post',
            data: {product_id: productId, quantity: quantity, promoCode: promoYourCodeId, _token: _token},
            dataType: 'json',
            beforeSend : function(arr, $form, options){
                overlay.classList.toggle('is-active')
            },
            success: function (data) {
                overlay.classList.toggle('is-active')
                if (!data.status) {
                    // $('#error-promo-your-code-id').removeAttr('hidden')
                    // $('#error-promo-your-code-id').text(data.message)

                    $('.id-error-form-server').removeAttr('hidden');
                    $('.id-error-form-server').text(data.message);
                } else {
                    $('#modalOrderSuccess').modal('show');
                    $('#modalOrderProcess').modal('toggle');
                }
            },
            error: function (e) {
                console.log(e);
                $('.id-error-form-server').removeAttr('hidden');
                $('.id-error-form-server').text('Truy vấn đế máy chủ thất bại!');
            }
        });
    });

    $(document).on('change', '#promo-your-code-id', function (e) {
        var promoYourCodeId = $(this).val();
        $.ajax({
            url: '/promo-code/check/'+ promoYourCodeId,
            type: 'get',
            success: function (data) {
                if (!data.status) {
                    $('#error-promo-your-code-id').removeAttr('hidden')
                    $('#error-promo-your-code-id').text(data.message)
                }
            },
            error: function (e) {
                if (!data.status) {
                    $('#error-promo-your-code-id').removeAttr('hidden')
                    $('#error-promo-your-code-id').text('Truy vấn đến máy chủ thất bại!')
                }
            }
        });
        setTimeout(function() {
            $("#error-promo-your-code-id").attr("hidden", true);
        }, 7000 ); // 5 secs

    });
    
    $(document).on('click', '#btn-order-now', function (e) {
        $('.promo-your-code-class').val("");
    });

    $(document).on('click', '.login-form-process', function (e) {
        e.preventDefault();
        $('#modalOrderProcess').modal('hide');
        $('#modal-client-register').modal('hide');
        $('#modal-client-login').modal('show');
    });

    $(document).on('click', '.recharge-form-process', function (e) {
        e.preventDefault();
        $('#modal-chanrge-money').modal('show');
    });

    $(document).on('click', '#showModalBank', function (e) {
        e.preventDefault();
        $('#bankModal').modal('show');
    });

    $(document).on('click', '#showModalMomo', function (e) {
        e.preventDefault();
        $('#momoModal').modal('show');
    });

    $(document).on('click', '#showModalZalo', function (e) {
        e.preventDefault();
        $('#modalZalo').modal('show');
    });

    $(document).on('click', '#client-submit-login', function (e) {
        e.preventDefault();
        var userName = $('.id-form-user-name').val();
        var password = $('.id-form-password').val();
        var _token = $('meta[name="csrf-token"]').attr('content');

        var validateUserNameResult = validateUserName(userName);
        var validatePasswordResult = validatePassword(password);

        if (validateUserNameResult && validatePasswordResult) {
            $.ajax({
                url: '/login',
                type: 'post',
                data: {user_name: userName, password: password, _token: _token},
                dataType: 'json',
                beforeSend : function(arr, $form, options){
                    overlay.classList.toggle('is-active')
                },
                success: function (data) {
                    overlay.classList.toggle('is-active')
                    if (!data.status) {
                        $('.id-error-form-server').removeAttr('hidden')
                        $('.id-error-form-server').text(data.message)
                    } else {
                        $('.id-error-form-success').removeAttr('hidden');
                        $('.id-error-form-success').text(data.message);
                        // window.location.href = data.data
                        setTimeout(function() {
                            window.location.href = data.data
                        }, 2000 ); // 3 secs
                    }
                },
                error: function (e) {
                    overlay.classList.toggle('is-active')
                    if (e.responseJSON.message != 'undefined') {
                        $('.id-error-form-server').removeAttr('hidden');
                        $('.id-error-form-server').text(e.responseJSON.message);
                    } else {
                        $('.id-error-form-server').removeAttr('hidden');
                        $('.id-error-form-server').text('Truy vấn đế máy chủ thất bại!');
                    }
                }
            });
        }

        setTimeout(function() {
            $(".id-error-form-server").attr("hidden", true);
            $(".id-error-form-success").attr("hidden", true);
            $(".id-error-form-email").attr("hidden", true);
            $('.id-error-form-user-name').attr("hidden", true);
            $(".id-error-form-password-confirmation").attr("hidden", true);
            $(".id-error-form-password").attr("hidden", true);
        }, 7000 ); // 5 secs
    });

    $(document).on('click', '#client-submit-register', function (e) {
        e.preventDefault();
        var email = $('#id-form-input-email').val();
        var userName = $('#id-form-user-name').val();
        var password = $('#id-form-password').val();
        var passwordConfirmation = $('#id-form-password-confirmation').val();
        var _token = $('meta[name="csrf-token"]').attr('content');

        var validateEmailResult = validateEmail(email);
        var validateUserNameResult = validateUserName(userName);
        var validatePasswordResult = validatePassword(password);
        var validatePasswordConfirmationResult = validatePasswordConfirmation(password, passwordConfirmation);

        if (validateEmailResult && validateUserNameResult && validatePasswordResult && validatePasswordConfirmationResult) {
            $.ajax({
                url: '/register',
                type: 'post',
                data: {email: email, user_name: userName, password: password, password_confirmation: passwordConfirmation, _token: _token},
                dataType: 'json',
                beforeSend : function(arr, $form, options){
                    overlay.classList.toggle('is-active')
                },
                success: function (data) {
                    overlay.classList.toggle('is-active')
                    if (!data.status) {
                        $('.id-error-form-server').removeAttr('hidden')
                        $('.id-error-form-server').text(data.message)
                    } else {
                        $('.id-error-form-success').removeAttr('hidden');
                        $('.id-error-form-success').text(data.message);

                        setTimeout(function() {
                            window.location.href = data.data
                        }, 2000 ); // 3 secs
                    }
                },
                error: function (e) {
                    overlay.classList.toggle('is-active')
                    if (e.responseJSON.message != 'undefined') {
                        $('.id-error-form-server').removeAttr('hidden');
                        $('.id-error-form-server').text(e.responseJSON.message);
                    } else {
                        $('.id-error-form-server').removeAttr('hidden');
                        $('.id-error-form-server').text('Truy vấn đế máy chủ thất bại!');
                    }
                }
            });
        }

        setTimeout(function() {
            $(".id-error-form-server").attr("hidden", true);
            $(".id-error-form-success").attr("hidden", true);
            $(".id-error-form-email").attr("hidden", true);
            $('.id-error-form-user-name').attr("hidden", true);
            $(".id-error-form-password-confirmation").attr("hidden", true);
            $(".id-error-form-password").attr("hidden", true);
        }, 7000 ); // 5 secs
    });

    $('#btnHideMenu').click(function() {
        $('.sidebar').hide()
        $('#btnShowMenu').show()
    })

    $('#btnShowMenu').click(function() {
        $('.sidebar').show()
        $(this).hide()
    })

    function validateEmail(email)
    {
        if (!email) {
            $('.id-error-form-email').removeAttr('hidden');
            $('.id-error-form-email').text('Email không được bỏ trống!');

            return false;
        } else if (email.length > 100) {
            $('.id-error-form-email').removeAttr('hidden');
            $('.id-error-form-email').text('Email không được lớn hơn 100 kí tự!');

            return false;
        }
         else if (!isValidEmailAddress(email)) {
            $('.id-error-form-email').removeAttr('hidden');
            $('.id-error-form-email').text('Email không đúng định dạng!');
            return false;
        }

        return true;
    }

    function validateUserName(userName)
    {
        if (!userName) {
            $('.id-error-form-user-name').removeAttr('hidden');
            $('.id-error-form-user-name').text('Tài khoản không được bỏ trống!');

            return false;
        } else if (userName.length > 50) {
            $('.id-error-form-user-name').removeAttr('hidden');
            $('.id-error-form-user-name').text('Tài khoản không được lớn hơn 50 kí tự!');

            return false;
        }
        return true;
    }

    function validatePassword(password, passwordConfirmation)
    {
        var isTrue = true;
        if (!password) {
            $('.id-error-form-password').removeAttr('hidden');
            $('.id-error-form-password').text('Mật khẩu không được bỏ trống!');
            isTrue = false;
        } else if (password.length > 30) {
            $('.id-error-form-password').removeAttr('hidden');
            $('.id-error-form-password').text('Mật khẩu không được lớn hơn 30 kí tự!');
            isTrue = false;
        } else if (password.length < 6) {
            $('.id-error-form-password').removeAttr('hidden');
            $('.id-error-form-password').text('Mật khẩu phải ít nhất 6 kí tự!');
            isTrue = false;
        }

        return isTrue;
    }

    function validatePasswordConfirmation(password, passwordConfirmation)
    {
        var isTrue = true;
        if (!passwordConfirmation) {
            $('.id-error-form-password-confirmation').removeAttr('hidden');
            $('.id-error-form-password-confirmation').text('Mật khẩu xác nhận không được bỏ trống!');
            isTrue = false;
        } else if (passwordConfirmation.length > 30) {
            $('.id-error-form-password-confirmation').removeAttr('hidden');
            $('.id-error-form-password-confirmation').text('Mật khẩu xác nhận không được quá 30 kí tự!');
            isTrue = false;
        } else if (passwordConfirmation.length < 6) {
            $('.id-error-form-password-confirmation').removeAttr('hidden');
            $('.id-error-form-password-confirmation').text('Mật khẩu phải ít nhất 6 kí tự!');
            isTrue = false;
        } else if (password && passwordConfirmation && passwordConfirmation != password) {
            $('.id-error-form-password-confirmation').removeAttr('hidden');
            $('.id-error-form-password-confirmation').text('Mật khẩu và xác nhận không chính xác!');
            isTrue = false;
        }

        return isTrue;
    }

    function isValidEmailAddress(emailAddress) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
    };
});
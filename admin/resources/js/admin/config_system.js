$(document).ready(function() {

    $('.btn-system-logo').on('click', function () {
        $('#btn-confirm').attr("data-type", 'logo').text('Xác nhận');
        $('#modal-library .modal-title').text('Thiết lập Logo');
    });

    $('.btn-system-logo-white').on('click', function () {
        $('#btn-confirm').attr("data-type", 'logo-white').text('Xác nhận');
        $('#modal-library .modal-title').text('Thiết lập Logo trắng');
    });

    $('.btn-system-favicon').on('click', function () {
        $('#btn-confirm').attr("data-type", 'favicon').text('Xác nhận');
        $('#modal-library .modal-title').text('Thiết lập Favicon');
    });

    $('#btn-confirm').on('click', function () {
        var type = $(this).attr('data-type');
        var link = $('#libraryImage').attr('data-link');
        if ( typeof(link) !== 'undefined')
        {
            switch (type) {
                case "logo":
                    $('.website-logo-container').html('<img class="config-image" src="'+ link +'" alt="Logo" width="160" height="160">');
                    $('#website_logo').val(link);
                    break;
                case "logo-white":
                    $('.website-logo-white-container').html('<img class="config-image" id="img-w" src="'+ link +'" alt="Logo" width="160" height="160">');
                    $('#website_logo_w').val(link);
                    break;
                case "favicon":
                    $('.website-favicon-container').html('<img class="config-image" src="'+ link +'" alt="Logo" width="160" height="160">');
                    $('#website_favicon').val(link);
                    break;
                default:
                    alert("Hành động không tồn tại");
                    break;
            }
            $('#modal-library').modal('hide');
        }
        else {
            alert("Vui lòng chọn hình ảnh trước khi xác nhận");
        }
    });

    $(document).on('click', '.show_password', function () {
        $('#password').attr('type', 'text');
        $('.show_password i').removeClass('fa-eye');
        $('.show_password i').addClass('fa-eye-slash');
        $(this).addClass('hidden_password');
        $(this).removeClass('show_password');
    });

    $(document).on('click', '.hidden_password', function () {
        $('#password').attr('type', 'password');
        $('.hidden_password i').addClass('fa-eye');
        $('.hidden_password i').removeClass('fa-eye-slash');
        $(this).removeClass('hidden_password');
        $(this).addClass('show_password');
    });

    $('.inp-amount').on('change', function () {
        var amount = $(this).val();
        amount = amount.replaceAll('.', '');
        amount = amount.replaceAll(',', '');
        amount = addCommas(amount);
        $(this).val(amount);
    });

    function addCommas(nStr)
    {
        nStr += '';
        var x = nStr.split('.');
        var x1 = x[0];
        var x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }

    $('#btnSendMail').on('click', function () {
        var email_to = $('#email_to').val();
        // console.log(email_to);
        if (email_to) {
            var data = {
                smtp_email: $('#email_from').val(),
                smtp_password: $('#password').val(),
                smtp_drive: $('#mailDrive').val(),
                smtp_host: $('#mailHost').val(),
                smtp_port: $('#smtpPort').val(),
                smtp_ssl: $('#smtpSSLType').val(),
                sender_name: $('#sender_name').val(),
                sender_email: $('#sender_email').val(),
                email_to: email_to,
                _token: $('meta[name="csrf-token"]').attr('content')
            };
            // console.log(data);
            $.ajax({
                url: '/admin/config-system/send-mail-test',
                type: 'post',
                data: data,
                dataType: 'json',
                beforeSend: function(){
                    var html = '<div class="text-center" style="position: absolute;width: 101%;top: -6px;background: #0000004f;height: 146px;right: -2px;"><div class="vong-xoay" style="top: 41px;right: 60px;"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
                    $('#btnSendMail').attr('disabled', true);
                    $('#notication-send-mail').html(html);
                },
                success: function (data) {
                    // console.log(data);
                    if (data.error == 0) {
                        alertifyNote( 0, data.message );
                        $('#notication-send-mail').html('');
                        $('#btnSendMail').attr('disabled', false);
                    } else {
                        alertifyNote( 1, data.message );
                        $('#btnSendMail').attr('disabled', false);
                        $('#notication-send-mail').html('');
                    }
                },
                error: function (e) {
                    console.log(e);
                    $('#notication-send-mail').html('');
                    $('#btnSendMail').attr('disabled', false);
                    alertifyNote( 1, 'Truy vấn thất bại!' );
                }
            });
        } else {
            alert('Trường gửi đến email không được để trống');
        }
    });

    $('.btn-check-connect-telegram').on('click', function () {
        var telegram_url = $('#telegram_url').val();
        var telegram_token = $('#telegram_token').val();
        var telegram_chat_id = $('#telegram_chat_id').val();
        if (!telegram_url.length)
        {
            alertifyNote( 1, 'URL không được để trống!' );
            return false;
        }
        if (!telegram_token.length)
        {
            alertifyNote( 1, 'TOKEN không được để trống!' );
            return false;
        }
        if (!telegram_chat_id.length)
        {
            alertifyNote( 1, 'Chat ID không được để trống!' );
            return false;
        }

        $.ajax({
            url: '/admin/config-system/send-telegram-test',
            data: {telegram_url: telegram_url, telegram_token: telegram_token, telegram_chat_id: telegram_chat_id},
            dataType: 'json',
            beforeSend: function(){
                $('.btn-check-connect-telegram').attr('disabled', true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>  Đang kết nối...');
            },
            success: function (data) {
                // console.log(data);
                if (data.error == 0) {
                    alertifyNote( 0, data.message );
                } else {
                    alertifyNote( 1, data.message );
                }
                $('.btn-check-connect-telegram').attr('disabled', false).text("Kiểm tra");
            },
            error: function (e) {
                console.log(e);
                $('#notication-send-mail').html('');
                $('.btn-check-connect-telegram').attr('disabled', false);
                alertifyNote( 1, 'Truy vấn thất bại!' );
            }
        });

    });

    // function alertifyNote(error, message) {
    //     if (error)
    //     {
    //         Lobibox.notify('error', {
    //             pauseDelayOnHover: true,
    //             size: 'mini',
    //             rounded: true,
    //             delayIndicator: false,
    //             icon: 'bx bx-x-circle',
    //             continueDelayOnInactiveTab: false,
    //             position: 'top right',
    //             msg: message
    //         });
    //     }
    //     else {
    //         Lobibox.notify('success', {
    //             pauseDelayOnHover: true,
    //             size: 'mini',
    //             rounded: true,
    //             icon: 'bx bx-check-circle',
    //             delayIndicator: false,
    //             continueDelayOnInactiveTab: false,
    //             position: 'top right',
    //             msg: message
    //         });
    //     }
    // }

});

<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Cloudzone Customer System</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
</head>
<body style="width: 100%;margin: auto;">
<div class="send-mail" style="width: 90%;border: 1px solid #ddd;padding-top: 25px;padding-bottom: 10px;">
    {{-- <div class="mail-logo" style="text-align: center;border-bottom: 1px solid #ddd;padding-bottom: 30px;">
        <img src="https://portal.cloudzone.vn/images/logo-cloudzone-mail.png" alt="logo-mail" width="200px">
    </div> --}}
    <div class="mail-content" style="font-size: 16px;font-family: Arial,sans-serif;padding-top: 35px;padding-bottom:35px;margin: 10px 10%;">
        <!-- Nội dung mail tạo tài khoản -->
        {!! $content !!}
        <!-- kết thúc mail tạo tài khoản -->
    </div>
</div>
<div class="mail-footer" style="width: 90%;border: 1px solid #ddd;background: #f2f2f2;">
    <div style="padding: 15px 4% 10px;text-align: center;font-size: 13px;font-family: roboto;">
        <b>Công ty TNHH MTV Công nghệ Đại Việt Số</b><br>
        Địa chỉ: 257 Lê Duẩn , Đà Nẵng. <br>
        Văn phòng: 67 Nguyễn Thị Định, Đà Nẵng. <br>
        Điện thoại: 08 8888 0043 - Website: <a href="https://cloudzone.vn ">https://cloudzone.vn </a><br>
        <a href="https://www.facebook.com/cloudzone.vn">Fanpage</a>
        - <a href="https://zalo.me/g/liaejk375">Zalo</a>
        - <a href="https://t.me/+ywvikGRyfctlOWQ1">Telegram</a>
        <div style="clear:both;"></div>
    </div>
</div>
</body>
</html>

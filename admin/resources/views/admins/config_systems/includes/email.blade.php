<div class="form-group row">
    <label for="email" class="col-sm-3 text-right col-form-label">Email</label>
    <div class="col-sm-6">
        <input type="email" class="form-control" id="email_from" name="email" placeholder="Email"
        value="{{ !empty($configSmtpMail['smtp_email']) ? $configSmtpMail['smtp_email'] : old('email') }}" required>
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-sm-3 text-right col-form-label">Mật khẩu</label>
    <div class="col-sm-6">
        <div class="input-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu"
            value="{{ !empty($configSmtpMail['smtp_password']) ? $configSmtpMail['smtp_password'] : old('password') }}"  required>
            <div class="input-group-append show_password">
                <span class="input-group-text">
                    <i class="bx bx-show-alt"></i>
                </span>
            </div>
        </div>
        <div class="text-danger">
            <b>⁕Lưu ý:</b> Nếu dùng tài khoản gmail thì nên sử dụng mật khẩu ứng dụng của tài khoản email
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="mailDrive" class="col-sm-3 text-right col-form-label">SMTP Driver</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="mailDrive" name="mailDrive" placeholder="SMTP DRIVER"
        value="{{ !empty($configSmtpMail['smtp_drive']) ? $configSmtpMail['smtp_drive'] : old('mailDrive') }}"  required>
    </div>
</div>
<div class="form-group row">
    <label for="mailHost" class="col-sm-3 text-right col-form-label">SMTP Host</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="mailHost" name="mailHost" placeholder="SMTP Host"
        value="{{ !empty($configSmtpMail['smtp_host']) ? $configSmtpMail['smtp_host'] : old('mailHost') }}" required>
    </div>
</div>
<div class="form-group row">
    <label for="smtpPort" class="col-sm-3 text-right col-form-label">SMTP Port</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="smtpPort" name="smtpPort" placeholder="SMTP Port"
        value="{{ !empty($configSmtpMail['smtp_port']) ? $configSmtpMail['smtp_port'] : old('smtpPort') }}" required>
    </div>
</div>
<div class="form-group row">
    <label for="smtpSSLType" class="col-sm-3 text-right col-form-label">SMTP SSL Type</label>
    <div class="col-sm-6">
        <select name="smtpSSLType" id="smtpSSLType" class="form-control">
            @if ( !empty($configSmtpMail['smtp_ssl']) )
                <option value="">None</option>
                <option value="ssl" @if($configSmtpMail['smtp_ssl'] == 'ssl') selected @endif>SSL</option>
                <option value="tsl" @if($configSmtpMail['smtp_ssl'] == 'tsl') selected @endif>TSL</option>
            @else
                <option value="">None</option>
                <option value="ssl" @if(old('smtpSSLType') == 'ssl') selected @endif>SSL</option>
                <option value="tsl" @if(old('smtpSSLType') == 'ssl') selected @endif>TSL</option>
            @endif
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="sender_name" class="col-sm-3 text-right col-form-label">Tên người gửi</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="sender_name" name="sender_name" placeholder="Tên người gửi"
        value="{{ !empty($configSmtpMail['sender_name']) ? $configSmtpMail['sender_name'] : old('sender_name') }}" required>
    </div>
</div>
<div class="form-group row">
    <label for="sender_email" class="col-sm-3 text-right col-form-label">Email gửi</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="sender_email" name="sender_email" placeholder="Email gửi"
        value="{{ !empty($configSmtpMail['sender_email']) ? $configSmtpMail['sender_email'] : old('sender_email') }}" required>
    </div>
</div>
<div class="form-group row">
    <label for="setting_email_signature" class="col-sm-3 text-right col-form-label">Chữ ký Email</label>
    <div class="col-sm-6">
        @if (!empty($configSmtpMail['email_signature']))
            <div class="text-success check_email_signature">
                Đã thiết lập chữ ký email
            </div>
        @else
            <div class="text-danger check_email_signature">
                Chưa thiết lập chữ ký email
            </div>
        @endif
        <div class="">
            <textarea name="email_signature" id="email_signature" class="hidden"></textarea>
            <button type="button" id="setting_email_signature" class="btn btn-default" data-check='0'>
                @if (!empty($configSmtpMail['email_signature']))
                    Chỉnh sửa chữ ký
                @else
                    Thiết lập chữ ký
                @endif
            </button>
        </div>
    </div>
</div>
<div class="m-4 row">
    <div class="col-md-9 choose-product" id="send-mail-test">
        <h5 class="pl-2">Kiểm tra liên kết mail</h5>
        <div class="form-group row">
            <label for="email_send" class="col-sm-2 text-right col-form-label">Gửi đến email</label>
            <div class="col-sm-6 p-0">
                <input type="text" class="form-control" id="email_to" placeholder="Gửi đến email">
            </div>
            <div class="col-sm-2 p-0">
                <button type="button" id="btnSendMail" class="btn btn-danger">Kiểm tra</button>
            </div>
        </div>
        <div id="notication-send-mail">

        </div>
    </div>
</div>

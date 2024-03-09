<div class="form-group row">
    <label for="website_company" class="col-sm-3 text-right col-form-label">Tên công ty</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="website_company" name="website_company" placeholder="Tên công ty"
            value="{{ !empty($systemConfig['website_company']) ? $systemConfig['website_company'] : old('website_company') }}">
    </div>
</div>
<div class="form-group row">
    <label for="website_title" class="col-sm-3 text-right col-form-label">Website Title</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="website_title" name="website_title" placeholder="Website Title"
            value="{{ !empty($systemConfig['website_title']) ? $systemConfig['website_title'] : old('website_title') }}">
        <div class="text-danger">
            <b>⁕Lưu ý:</b> Tiêu đề hiển thị trên tab trình duyệt và hiển thị tiêu đề trong các bộ kết quả tìm kiếm
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="website_name" class="col-sm-3 text-right col-form-label">Tên hệ thống</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="website_name" name="website_name" placeholder="Tên hệ thống"
            value="{{ !empty($systemConfig['website_name']) ? $systemConfig['website_name'] : old('website_name') }}">
        <div class="text-danger">
            <b>⁕Lưu ý:</b> Tên hệ thống sẽ được hiển thị trong toàn bộ các trang
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="website_email" class="col-sm-3 text-right col-form-label">Địa chỉ Email</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="website_email" name="website_email" placeholder="Địa chỉ Email"
            value="{{ !empty($systemConfig['website_email']) ? $systemConfig['website_email'] : old('website_email') }}">
    </div>
</div>
<div class="form-group row">
    <label for="website_address" class="col-sm-3 text-right col-form-label">Địa chỉ</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="website_address" name="website_address" placeholder="Địa chỉ"
            value="{{ !empty($systemConfig['website_address']) ? $systemConfig['website_address'] : old('website_address') }}">
    </div>
</div>
<div class="form-group row">
    <label for="website_domain" class="col-sm-3 text-right col-form-label">Domain trang Admin</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="website_domain" name="website_domain" placeholder="Domain"
            value="{{ !empty($systemConfig['website_domain']) ? $systemConfig['website_domain'] : old('website_domain') }}">
    </div>
</div>
<div class="form-group row">
    <label for="website_domain" class="col-sm-3 text-right col-form-label">Domain trang Customer</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="website_domain_customer" name="website_domain_customer" placeholder="Domain"
               value="{{ !empty($systemConfig['website_domain_customer']) ? $systemConfig['website_domain_customer'] : old('website_domain_customer') }}">
    </div>
</div>
<div class="form-group row">
    <label for="website_phone" class="col-sm-3 text-right col-form-label">Số điện thoại</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="website_phone" name="website_phone" placeholder="Số điện thoại"
            value="{{ !empty($systemConfig['website_phone']) ? $systemConfig['website_phone'] : old('website_phone') }}">
    </div>
</div>
<div class="form-group row">
    <label for="facebook_contact" class="col-sm-3 text-right col-form-label">Facebook contact</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="facebook_contact" name="facebook_contact" placeholder="Facebook URL"
            value="{{ !empty($systemConfig['facebook_contact']) ? $systemConfig['facebook_contact'] : old('facebook_contact') }}">
    </div>
</div>
<div class="form-group row">
    <label for="zalo_contact" class="col-sm-3 text-right col-form-label">Zalo contact</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="zalo_contact" name="zalo_contact" placeholder="Facebook URL"
            value="{{ !empty($systemConfig['zalo_contact']) ? $systemConfig['zalo_contact'] : old('zalo_contact') }}">
    </div>
</div>
<div class="form-group row">
    <label for="facebook_channel" class="col-sm-3 text-right col-form-label">Facebook channel</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="facebook_channel" name="facebook_channel" placeholder="Facebook channel"
            value="{{ !empty($systemConfig['facebook_channel']) ? $systemConfig['facebook_channel'] : old('facebook_channel') }}">
    </div>
</div>
<div class="form-group row">
    <label for="zalo_channel" class="col-sm-3 text-right col-form-label">Zalo channel</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="zalo_channel" name="zalo_channel" placeholder="Zalo channel"
            value="{{ !empty($systemConfig['zalo_channel']) ? $systemConfig['zalo_channel'] : old('zalo_channel') }}">
    </div>
</div>
<div class="form-group row">
    <label for="telegram_channel" class="col-sm-3 text-right col-form-label">Telegram channel</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="telegram_channel" name="telegram_channel" placeholder="Telegram channel"
            value="{{ !empty($systemConfig['telegram_channel']) ? $systemConfig['telegram_channel'] : old('telegram_channel') }}">
    </div>
</div>
<div class="form-group row">
    <label for="website_logo" class="col-sm-3 text-right">Logo</label>
    <div class="col-sm-6">
        <div class="website-logo-container mb-2">
            @if ( !empty($systemConfig['website_logo']) )
                <img class="config-image" src="{{ asset($systemConfig['website_logo'])  }}" alt="{{ !empty($systemConfig['website_title']) ? $systemConfig['website_title'] : old('website_title') }}" width="160" height="160">
            @else
                <h6 class="text-danger">Chưa có Logo cho hệ thống.</h6>
            @endif
        </div>
        <input type="hidden" name="website_logo" id="website_logo" placeholder="Logo" class="form-control" value="{{$systemConfig['website_logo']}}">
        <button type="button" class="btn btn-outline-dark btn-sm btn-open-library btn-system-logo"><i class="bx bx-cloud-upload mr-1"></i> Chọn Logo</button>
    </div>
</div>
<div class="form-group row">
    <label for="website_logo" class="col-sm-3 text-right">Logo màu trắng</label>
    <div class="col-sm-6">
        <div class="website-logo-white-container mb-2">
            @if ( !empty($systemConfig['website_logo_w']) )
                <img class="config-image" id="img-w" src="{{ asset($systemConfig['website_logo_w'])  }}" alt="{{ !empty($systemConfig['website_title']) ? $systemConfig['website_title'] : old('website_title') }}" width="160" height="160">
            @else
                <h6 class="text-danger">Chưa có Logo màu trắng cho hệ thống.</h6>
            @endif
        </div>
        <input type="hidden" name="website_logo_w" id="website_logo_w" placeholder="Logo màu trắng" class="form-control" value="{{$systemConfig['website_logo_w']}}">
        <button type="button" class="btn btn-outline-dark btn-sm btn-open-library btn-system-logo-white"><i class="bx bx-cloud-upload mr-1"></i> Chọn Logo trắng</button>
    </div>
</div>
<div class="form-group row">
    <label for="website_favicon" class="col-sm-3 text-right">Favicon</label>
    <div class="col-sm-6">
        <div class="website-favicon-container mb-2">
            @if ( !empty($systemConfig['website_favicon']) )
                <img class="config-image" src="{{ asset($systemConfig['website_favicon'])  }}" alt="{{ !empty($systemConfig['website_title']) ? $systemConfig['website_title'] : old('website_title') }}" width="160" height="160">
            @else
                <h6 class="text-danger">Chưa có Favicon cho hệ thống.</h6>
            @endif
        </div>
        <input type="hidden" name="website_favicon" id="website_favicon" placeholder="Favicon" class="form-control" value="{{$systemConfig['website_favicon']}}">
        <button type="button" class="btn btn-outline-dark btn-sm btn-open-library btn-system-favicon"><i class="bx bx-cloud-upload mr-1"></i> Chọn Favicon</button>
    </div>
</div>

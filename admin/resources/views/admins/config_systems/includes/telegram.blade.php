<div class="form-group row">
    <label for="telegram_url" class="col-sm-3 text-right col-form-label">URL</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="telegram_url" name="telegram_url" placeholder="URL"
               value="{{ !empty($configTelegram['telegram_url']) ? $configTelegram['telegram_url'] : old('telegram_url') }}">
    </div>
</div>
<div class="form-group row">
    <label for="telegram_token" class="col-sm-3 text-right col-form-label">Token</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="telegram_token" name="telegram_token" placeholder="Token"
               value="{{ !empty($configTelegram['telegram_token']) ? $configTelegram['telegram_token'] : old('telegram_token') }}">
    </div>
</div>
<div class="form-group row">
    <label for="telegram_chat_id" class="col-sm-3 text-right col-form-label">Chat ID</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="telegram_chat_id" name="telegram_chat_id" placeholder="Chat ID"
               value="{{ !empty($configTelegram['telegram_chat_id']) ? $configTelegram['telegram_chat_id'] : old('telegram_chat_id') }}">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 text-right col-form-label">Kiểm tra kết nối</label>
    <div class="col-sm-6">
        <button class="btn btn-success btm-sm btn-check-connect-telegram"  type="button">
            Kiểm tra
        </button>
        {{--<button class="btn btn-success" type="button" disabled="">
            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>  Loading...
        </button>--}}
    </div>
</div>

<div>
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Hồ sơ của bạn</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item @if (session()->get('focus') == 'user_profile') active @endif">
                                <button class="btn btn-sm btn-menu-item w-100" wire:click="user_profile()">Hồ sơ và bảo
                                    mật</button>
                            </li>
                            <li class="list-group-item @if (session()->get('focus') == 'user_card_transactions') active @endif">
                                <button class="btn btn-sm btn-menu-item w-100" wire:click="user_cardTransactions()">Lịch
                                    sử nạp thẻ</button>
                            </li>
                            <li class="list-group-item @if (session()->get('focus') == 'user_bank_transactions') active @endif">
                                <button class="btn btn-sm btn-menu-item w-100" wire:click="user_bankTransactions()">Lịch
                                    sử chuyển khoản</button>
                            </li>
                            <li class="list-group-item @if (session()->get('focus') == 'user_gamepass_orders') active @endif">
                                <button class="btn btn-sm btn-menu-item w-100" wire:click="user_gamepassOrders()">Lịch
                                    sử mua Gamepass</button>
                            </li>
                            <li class="list-group-item @if (session()->get('focus') == 'user_robux_orders') active @endif">
                                <button class="btn btn-sm btn-menu-item w-100" wire:click="user_robuxOrders()">Lịch sử
                                    mua Robux</button>
                            </li>
                            <li class="list-group-item @if (session()->get('focus') == 'user_pending_orders') active @endif">
                                <button class="btn btn-sm btn-menu-item w-100" wire:click="user_pendingOrders()">Đơn
                                    hàng chờ</button>
                            </li>
                            <li class="list-group-item @if (session()->get('focus') == 'user_all_orders') active @endif">
                                <button class="btn btn-sm btn-menu-item w-100" wire:click="user_allOrders()">Toàn bộ đơn
                                    hàng</button>
                            </li>


                            <button class="btn btn-sm btn-menu-item w-100" wire:click="test()">Test</button>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card mb-3">
                    @if ($show_card_transactions)
                        @include('livewire.user_profile.user-card-transactions')
                    @elseif($show_bank_transactions)
                        @include('livewire.user_profile.user-bank-transactions')
                    @elseif($show_gamepass_orders)
                        @include('livewire.user_profile.user-gamepass-orders')
                    @elseif($show_robux_orders)
                        @include('livewire.user_profile.user-robux-orders')
                    @elseif($show_pending_orders)
                        @include('livewire.user_profile.user-pending-orders')
                    @elseif($show_all_orders)
                        @include('livewire.user_profile.user-all-orders')
                    @else
                        <div class="card-header">
                            <h4>Thông tin người dùng</h4>
                        </div>
                        <div class="card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success text-center" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session()->has('error'))
                                <div class="alert alert-danger text-center" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form action="" wire:submit.prevent="user_updatePassword">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Tên tài khoản</label>
                                            <input type="text" class="form-control" id="name"
                                                value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}"
                                                disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email"
                                                value="{{ Auth::user()->email }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <input type="text" class="form-control" id="role"
                                                value="{{ Auth::user()->role }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="affiliate">Mã giới thiệu</label>
                                            <input type="text" class="form-control" id="affiliate"
                                                value="{{ Auth::user()->userDetail->affiliate }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="last_login">Lần đằng nhập gần nhất</label>
                                            <input type="text" class="form-control" id="last_login"
                                                value="{{ date('d-m-Y H:i:s'), strtotime(Auth::user()->last_login) }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Mật khẩu củ</label>
                                            <input type="password" class="form-control" id="password"
                                                wire:model="password">
                                            @error('password')
                                                <span class="text-danger" style="font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="newpassword">Mật khẩu mới</label>
                                            <input type="password" class="form-control" id="newpassword"
                                                wire:model="newpassword">
                                            @error('newpassword')
                                                <span class="text-danger" style="font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="enternewpassword">Nhập lại mật khẩu mới</label>
                                            <input type="password" class="form-control" id="enternewpassword"
                                                wire:model="enternewpassword">
                                            @error('enternewpassword')
                                                <span class="text-danger" style="font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-2">
                                            <button type="submit" class="btn btn-sm btn-success">Lưu thay
                                                đổi</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>

                @if ($hire_partner_exists || $kol_partner_exists || $refer_partner_exists)
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Mức hoa hồng hiện tại</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($partner_rate as $partner)
                                <div class="form-group">
                                    <label for="rate">Chiết khấu/Mức hoa hồng của nhóm
                                        {{ $partner['name'] }}</label>
                                    <input type="text" class="form-control" id="rate"
                                        value="{{ $partner['rate'] }}" disabled>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- <script>
    
</script> --}}

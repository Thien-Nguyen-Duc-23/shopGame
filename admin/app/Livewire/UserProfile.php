<?php

namespace App\Livewire;

use App\Models\BankTransaction;
use App\Models\CardTransaction;
use App\Models\HirePartner;
use App\Models\KolParner;
use App\Models\Order;
use App\Models\ReferPartner;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Livewire\WithPagination;

class UserProfile extends Component
{
    use WithPagination;

    public $paginationTheme = 'bootstrap';

    public $password, $newpassword, $enternewpassword;

    public $show_card_transactions = false;

    public $show_bank_transactions = false;

    public $show_gamepass_orders = false;

    public $show_robux_orders = false;

    public $show_pending_orders = false;

    public $show_all_orders = false;

    public function render()
    {
        $card_transactions = [];
        $bank_transactions = [];
        $gamepass_orders = [];
        $robux_orders = [];
        $pending_orders = [];
        $all_orders = [];

        $user = Auth::user();

        if ($this->show_card_transactions) {
            $card_transactions = CardTransaction::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(2);
        } elseif ($this->show_bank_transactions) {
            $bank_transactions = BankTransaction::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(2);
        } elseif ($this->show_gamepass_orders) {
            $gamepass_orders = Order::whereHas('product.category', function ($query) {
                $query->where('name', 'like', '%Gamepass%');
            })->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(5);

            //dd($gamepass_orders);
        } elseif ($this->show_robux_orders) {
            $robux_orders = Order::whereHas('product.category', function ($query) {
                $query->where('name', 'like', '%Robux%');
            })->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(5);

            //dd($gamepass_orders);
        } elseif ($this->show_pending_orders) {
            $pending_orders = Order::where('user_id', Auth::user()->id)->where('status', 'cho_giao_hang')->orderBy('id', 'desc')->paginate(5);
        } elseif ($this->show_all_orders) {
            $all_orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(5);
        }

        // Tỉ lệ chiết khấu/hoa hồng
        $partnerRates = [];

        // Kiểm tra xem người dùng có tồn tại trong bảng hire_partners không
        $hirePartnerExists = HirePartner::whereRaw("FIND_IN_SET($user->id, user_ids)")->exists();
        $hirePartnerRate = $hirePartnerExists ? HirePartner::whereRaw("FIND_IN_SET($user->id, user_ids)")->value('rate') : null;
        if ($hirePartnerExists) {
            $partnerRates[] = [
                'name' => 'Hire Partner',
                'rate' => $hirePartnerRate
            ];
        }

        // Kiểm tra xem người dùng có tồn tại trong bảng kol_partners không
        $kolPartnerExists = KolParner::whereRaw("FIND_IN_SET($user->id, user_ids)")->exists();
        $kolPartnerRate = $kolPartnerExists ? KolParner::whereRaw("FIND_IN_SET($user->id, user_ids)")->value('rate') : null;;
        if ($kolPartnerExists) {
            $partnerRates[] = [
                'name' => 'Kol Partner',
                'rate' => $kolPartnerRate
            ];
        }

        // Kiểm tra xem người dùng có tồn tại trong bảng refer_partners không
        $referPartnerExists = ReferPartner::whereRaw("FIND_IN_SET($user->id, user_ids)")->exists();
        $referPartnerRate = $referPartnerExists ? ReferPartner::whereRaw("FIND_IN_SET($user->id, user_ids)")->value('rate') : null;
        if ($referPartnerExists) {
            $partnerRates[] = [
                'name' => 'Refer Partner',
                'rate' => $referPartnerRate
            ];
        }

        return view('livewire.user_profile.user-profile', ['card_transactions' => $card_transactions, 'bank_transactions' => $bank_transactions, 'gamepass_orders' => $gamepass_orders, 'robux_orders' => $robux_orders, 'pending_orders' => $pending_orders, 'all_orders' => $all_orders, 'hire_partner_exists' => $hirePartnerExists, 'kol_partner_exists' => $kolPartnerExists, 'refer_partner_exists' => $referPartnerExists, 'hire_partner_rate' => $hirePartnerRate, 'kol_partner_rate' => $kolPartnerRate, 'refer_partner_rate' => $referPartnerRate, 'partner_rate' => $partnerRates]);
    }

    public function user_updatePassword()
    {
        // dd($this->all());

        $this->validate([
            'password' => 'required',
            'newpassword' => 'required|min:8|different:password',
            'enternewpassword' => 'required|same:newpassword',
        ], [
            'password.required' => 'Mật khẩu hiện tại không được để trống',
            'newpassword.required' => 'Mật khẩu mới không được để trống',
            'newpassword.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự',
            'newpassword.different' => 'Mật khẩu mới phải khác mật khẩu hiện tại',
            'enternewpassword.required' => 'Vui lòng xác nhận mật khẩu mới',
            'enternewpassword.same' => 'Mật khẩu xác nhận phải trùng khớp với mật khẩu mới',
        ]);

        // Kiểm tra mật khẩu hiện tại có đúng không
        if (!Hash::check(trim($this->password), Auth::user()->password)) {
            session()->flash('error', 'Mật khẩu hiện tại không chính xác, vui lòng thao tác lại!!');
            return;
        }

        Auth::user()->updatePassword(trim($this->newpassword));

        session()->flash('success', 'Mật khẩu đã được cập nhật thành công!!');

        $this->password = '';
        $this->newpassword = '';
        $this->enternewpassword = '';
    }

    // Lịch sử nạp thẻ cào
    public function user_cardTransactions()
    {
        session()->flash('focus', 'user_card_transactions');
        $this->show_card_transactions = true;
        $this->show_bank_transactions = false;
        $this->show_gamepass_orders = false;
        $this->show_robux_orders = false;
        $this->show_pending_orders = false;
        $this->show_all_orders = false;
        //dd($this->all());
    }

    // Lịch sử chuyển khoản
    public function user_bankTransactions()
    {
        session()->flash('focus', 'user_bank_transactions');
        $this->show_bank_transactions = true;
        $this->show_card_transactions = false;
        $this->show_gamepass_orders = false;
        $this->show_robux_orders = false;
        $this->show_pending_orders = false;
        $this->show_all_orders = false;
    }

    // Lịch sử mua Gamepass
    public function user_gamepassOrders()
    {
        session()->flash('focus', 'user_gamepass_orders');
        $this->show_gamepass_orders = true;
        $this->show_bank_transactions = false;
        $this->show_card_transactions = false;
        $this->show_robux_orders = false;
        $this->show_pending_orders = false;
        $this->show_all_orders = false;
    }

    // Lịch sử mua Robux
    public function user_robuxOrders()
    {
        session()->flash('focus', 'user_robux_orders');
        $this->show_robux_orders = true;
        $this->show_bank_transactions = false;
        $this->show_card_transactions = false;
        $this->show_gamepass_orders = false;
        $this->show_pending_orders = false;
        $this->show_all_orders = false;
    }

    // Lịch sử đơn hàng đang ở trạng thái chờ giao hàng
    public function user_pendingOrders()
    {
        session()->flash('focus', 'user_pending_orders');
        $this->show_pending_orders = true;
        $this->show_bank_transactions = false;
        $this->show_card_transactions = false;
        $this->show_gamepass_orders = false;
        $this->show_robux_orders = false;
        $this->show_all_orders = false;
    }

    // Toàn bộ đơn hàng
    public function user_allOrders()
    {
        session()->flash('focus', 'user_all_orders');
        $this->show_all_orders = true;
        $this->show_bank_transactions = false;
        $this->show_card_transactions = false;
        $this->show_gamepass_orders = false;
        $this->show_robux_orders = false;
        $this->show_pending_orders = false;
    }

    public function user_profile()
    {
        session()->flash('focus', 'user_profile');
        $this->show_all_orders = false;
        $this->show_bank_transactions = false;
        $this->show_card_transactions = false;
        $this->show_gamepass_orders = false;
        $this->show_robux_orders = false;
        $this->show_pending_orders = false;
    }

    public function test()
    {


        // Kiểm tra xem người dùng có tồn tại trong ít nhất một trong các bảng trên không
        if ($hirePartnerExists) {
            // Người dùng tồn tại trong ít nhất một trong các bảng
            // Thực hiện các hành động cần thiết tại đây
            dd('HirePartner');
        }
        if ($kolPartnerExists) {
            // Người dùng tồn tại trong ít nhất một trong các bảng
            // Thực hiện các hành động cần thiết tại đây
            dd('KolPartner');
        }
        if ($referPartnerExists) {
            // Người dùng tồn tại trong ít nhất một trong các bảng
            // Thực hiện các hành động cần thiết tại đây
            dd('ReferPartner');
        }
    }
}

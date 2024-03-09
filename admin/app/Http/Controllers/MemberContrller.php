<?php

namespace App\Http\Controllers;

use App\Models\CardTransaction;
use Illuminate\Http\Request;

class MemberContrller extends Controller
{
    public function userProfile()
    {
        session()->flash('focus', 'user_profile');
        return view('clients.thong-tin-nguoi-dung');
    }
}

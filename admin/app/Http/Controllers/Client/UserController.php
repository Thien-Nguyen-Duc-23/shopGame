<?php

namespace App\Http\Controllers\Client;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userRepository;
    public function __construct()
    {
        $this->userRepository = AdminFactory::userRepository();
    }

    public function recharge(Request $request)
    {
        return view("clients.users.recharge");
    }
}

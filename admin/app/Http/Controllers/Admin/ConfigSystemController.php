<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Factories\AdminFactory;
use Illuminate\Support\Facades\Auth;

class ConfigSystemController extends Controller
{

    protected $config_system;

    public function __construct()
    {
        $this->config_system = AdminFactory::configSystemRepository();
    }

    public function index()
    {
        if (Auth::user()->can('checkAdmin', Auth::user())) {
            $systemConfig = $this->config_system->systemConfig();
            $configSmtpMail = $this->config_system->configSmtpMail();
            $configPayment = $this->config_system->configPayment();
            $configTelegram = $this->config_system->configTelegram();
            return view('admins.config_systems.index', compact('systemConfig', 'configSmtpMail', 'configPayment', 'configTelegram'));
        }
        else {
            return redirect()->back()->with('fails', 'Truy cập thất bại. Tài khoản của bạn không được phép truy cập vào trang này.');
        }
    }

    public function saveChange(Request $request)
    {
        if ( Auth::user()->can('checkAdmin', Auth::user()) ) {
            $data = $request->all();

            $saveChange = $this->config_system->saveChange($data);
            // $saveChange = true;
            if ( $saveChange ) {
                return redirect()->back()->with('success', 'Lưu thiết lập hệ thống thành công');
            } else {
                return redirect()->back()->with('fails', 'Lưu thiết lập hệ thống thất bại');
            }
        }
        else {
            return redirect()->back()->with('fails', 'Truy cập thất bại. Tài khoản của bạn không được phép truy cập vào trang này.');
        }
    }

    public function sendMailTest(Request $request)
    {
        return response()->json($this->config_system->sendMailTest($request->all()));
    }

    public function sendTelegramTest(Request $request)
    {
        return response()->json($this->config_system->sendTelegramTest($request->all()));
    }

}

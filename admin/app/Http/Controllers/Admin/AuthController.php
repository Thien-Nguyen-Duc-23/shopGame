<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use App\Factories\AdminFactory;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $auth;
    protected  $log_activity;

    public function __construct()
    {
        $this->auth = AdminFactory::authRepository();
        $this->log_activity = new LogActivity();
    }

    public function login(Request $request)
    {
        $affiliate_token = $request->get('affiliate_token');
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'admin' || $user->role == 'super_admin') {
                return redirect()->route('admin.home');
            }
            else {
                return redirect()->route('login');
            }
        } else {
            return view('admins.auth.login', compact('affiliate_token'));
        }
    }

    public function logout(Request $request)
    {
        if (Auth::check())
        {
            // Tạo log
            $data_log = [
                'user_id' => Auth::id(),
                'action' => 'đăng xuất',
                'model' => 'Admin/Login',
                'admin' => ' '
            ];
            $this->log_activity->create($data_log);
            Auth::logout();
        }
        return redirect()->route('login');
    }

    public function checkLogin(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $remember = $request->has('remember') ? true : false;

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            $user = Auth::user();
            if ($user->role == 'admin' || $user->role == 'super_admin') {
                try {
                    // Tạo log
                    $data_log = [
                        'user_id' => $user->id,
                        'action' => 'đăng nhập',
                        'model' => 'Admin/Login',
                        'admin' => 'bằng email',
                        'user' => 'bằng email',
                        'ip' => $request->ip()
                    ];
                    $this->log_activity->create($data_log);

                    $user->last_login = date('Y-m-d H:i:s');
                    $user->save();

                    $this->auth->remove_throttles_login($request);
                } catch (\Exception $e) {
                    report($e);
                }

                return redirect()->route('admin.home');
            }
        }

        return redirect()->route('login')->with('fails', 'Đăng nhập thất bại. Tài khoản hoặc mật khẩu không đúng.');
    }

}

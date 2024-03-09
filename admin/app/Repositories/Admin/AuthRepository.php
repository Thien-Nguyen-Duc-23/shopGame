<?php

namespace App\Repositories\Admin;

use App\Models\ThrottlesLogin;
use App\Models\User;
use App\Models\LogActivity;

class AuthRepository
{
    protected $user;
    protected $log_activity;
    protected $throttles_login;

    public function __construct()
    {
        $this->user = new User();
        $this->log_activity = new LogActivity();
        $this->throttles_login = new ThrottlesLogin();
    }

    public function checkThrottlesLogin($request) : array
    {
        $throttles_logins = $this->get_throttles_login_by_user($request);
        if ( !empty($throttles_logins) ) {
            if ( !empty($throttles_logins->block) ) {
                $mb = '';
                if ($throttles_logins->block == 1) {
                    $mb = '30 giây';
                }
                else
                {
                    $mb = $throttles_logins->block . ' phút';
                }

                $message = 'Đăng nhập thất bại. Tài khoản của quý khách đã bị khóa ';
                $message .= $mb . ' do đăng nhập sai nhiều lần';
                return [
                    'error' => 1,
                    'message' => $message
                ];
            }
            else {
                $throttles_logins->times++;
                $throttles_logins->save();
                if ( $throttles_logins->times > 0 && $throttles_logins->times % 5 == 0 ) {
                    $block = 0;
                    if ($throttles_logins->times == 5) {
                        $block = 1;
                    }
                    else {
                        $block = floor($throttles_logins->times/5) * 2;
                    }

                    $throttles_logins->block = $block;
                    $throttles_logins->save();

                    $message = 'Đăng nhập thất bại. Tài khoản của quý khách đã bị khóa ';
                    $message .= $block . ' phút do đăng nhập sai nhiều lần';

                    // ghi log
                    $data_log = [
                        'user_id' => 999999,
                        'action' => 'chặn',
                        'model' => 'User/Login',
                        'description' => ' đăng nhập ' . $block . ' phút do đăng nhập sai nhiều lần',
                    ];
                    $this->log_activity->create($data_log);

                    return [
                        'error' => 1,
                        'message' => $message
                    ];
                }
                else {
                    return [ 'error' => 0 ];
                }
            }
        }
        else {
            $this->throttles_login->create([
                'ip' => $request->ip(),
                'email' => $request->get('email'),
                'times' => 1,
            ]);
            return [ 'error' => 0 ];
        }
    }

    public function get_throttles_login_by_user($request) {
        $throttles_logins = $this->throttles_login->where('email', $request->get('email'))->where('ip', $request->ip())->first();
        if ( isset($throttles_logins) ) {
            return $throttles_logins;
        }
        $throttles_logins = $this->throttles_login->where('email', $request->get('email'))->first();
        if ( isset($throttles_logins) ) {
            return $throttles_logins;
        }
        $throttles_logins = $this->throttles_login->where('ip', $request->ip())->first();
        if ( isset($throttles_logins) ) {
            return $throttles_logins;
        }
        return false;
    }

    public function remove_throttles_login($request) {
        $throttles_logins = $this->get_throttles_login_by_user($request);
        if ( !empty($throttles_logins) ) {
            $throttles_logins->times = 0;
            $throttles_logins->save();
        }
    }

}

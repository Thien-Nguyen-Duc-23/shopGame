<?php
namespace App\Repositories\Client;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Enums\UserRole;
use Carbon\Carbon;

Class UserRepository
{
    protected $user;
    protected $userDetail;

    protected $logActivity;

    public function __construct()
    {
        $this->user = new User();
        $this->userDetail = new UserDetail();
        $this->logActivity = new LogActivity();
    }

    public function getModelUser()
    {
        return $this->user;
    }

    public function register($request)
    {
        try {
            // create user
            $user = $this->user->create($request->all());

            // check have data
            if (!$user) {
                return [
                    'error' => 1,
                    'message' => 'Tạo tài khoản thất bại!',
                    'data' => []
                ];
            }

            // create user detail
            if (!$this->userDetail->create([
                "user_id"=> $user->id,
            ])) {
                return [
                    'error' => 1,
                    'message' => 'Tạo tài khoản thất bại!',
                    'data' => []
                ];
            }

            // create token
            $token = auth('api')->attempt($request->all());

            return [
                'error' => 0,
                'data' => [
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => auth('api')->factory()->getTTL() * 60,
                    'user' => auth('api')->user()
                ],
                'message' => null,
            ];
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Tạo tài khoản thất bại!',
                'data' => []
            ];
        }
    }

    public function changePassWord($request)
    {
        try {
            $this->user->where('id', auth()->user()->id)->update([
                'password' => bcrypt($request->new_password)
            ]);

            return [
                'error' => 0,
                'message' => null,
                'data' => []
            ];
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Thay đổi mật khẩu thất bại!',
                'data' => []
            ];
        }
    }

    public function registerUser($request)
    {
        try {
            $data = $request->all();
            $data['password'] = Hash::make($request->password);
            $data['role'] = UserRole::Customer->value;
            // create user
            $user = $this->user->create($data);

            // check have data
            if (!$user) {
                return [
                    'status' => false,
                    'message' => 'Tạo tài khoản thất bại!'
                ];
            }

            // create user detail
            if (!$this->userDetail->create([
                "user_id"=> $user->id,
            ])) {
                return [
                    'status' => false,
                    'message' => 'Tạo tài khoản thất bại!'
                ];
            }

            Auth::login($user);

            return [
                'status' => true,
                'data' => route("client.home"),
                'message' => 'Tạo tài khoản thành công!'
            ];
        } catch (\Exception $e) {
            report($e);

            return [
                'status' => false,
                'message' => 'Truy vấn đến máy chủ thất bại!'
            ];
        }
    }

    public function loginUser($request)
    {
        try {
            if (Auth::attempt($request->only(["user_name", "password"]))) {
                $user = Auth::user();
                $user->update([
                    'last_login' => Carbon::now()
                ]);
                return [
                    "status" => true, 
                    "data" => route("client.home"),
                    'message' => 'Đăng nhập thành công!'
                ];
            } else {
                return [
                    "status" => false,
                    "message" => "Tài khoản hoặc mật khẩu không chính xác!"
                ];
            }
        } catch (\Exception $e) {
            report($e);

            return [
                'status' => false,
                'message' => 'Truy vấn đến máy chủ thất bại!'
            ];
        }
    }
}

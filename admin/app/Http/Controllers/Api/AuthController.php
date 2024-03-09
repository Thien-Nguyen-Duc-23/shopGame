<?php

namespace App\Http\Controllers\Api;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Requests\Api\Auth\ChangePasswordRequest;

class AuthController extends Controller
{
    protected $userRepository;
    public function __construct()
    {
        $this->userRepository = AdminFactory::userRepository();
    }

    public function login(LoginRequest $request) {
        try {
            if (!$token = auth('api')->attempt($request->all())) {
                return response()->json([
                    'error' => 1,
                    'message' => 'Tài khoản hoặc mật khẩu không chính xác!',
                    'data' => []
                ], 401);
            }

            return response()->json([
                'error' => 0,
                'data' => [
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => auth('api')->factory()->getTTL() * 60,
                    'user' => auth('api')->user()
                ],
                'message' => null,
            ]);
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                'error' => 1,
                'data' => [],
                'message' => 'Đã có lỗi xãy ra trong khi đăng nhập!'
            ]);
        }
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request) {
        return response()->json($this->userRepository->register($request));
    }

    public function logout() {
        auth('api')->logout();

        return response()->json([
            'error' => 0,
            'message' => null,
            'data' => []
        ]);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return response()->json([
            'error' => 0,
            'data' => [
                'access_token' => auth('api')->refresh(),
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60,
                'user' => auth('api')->user()
            ],
            'message' => null,
        ]);
    }

    public function changePassWord(ChangePasswordRequest $request) {
        return response()->json($this->userRepository->changePassWord($request));
    }
}

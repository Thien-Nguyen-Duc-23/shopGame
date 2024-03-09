<?php

namespace App\Http\Controllers\Client;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class AuthClientController extends Controller
{
    protected $userRepository;
    public function __construct()
    {
        $this->userRepository = AdminFactory::userRepository();
    }

    public function register(RegisterRequest $request)
    {
        return response()->json($this->userRepository->registerUser($request));
    }

    public function login(LoginRequest $request)
    {
        return response()->json($this->userRepository->loginUser($request));
    }
}

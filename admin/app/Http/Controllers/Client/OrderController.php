<?php

namespace App\Http\Controllers\Client;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderClientRepository;
    public function __construct()
    {
        $this->orderClientRepository = AdminFactory::orderClientRepository();
    }

    public function order(Request $request)
    {
        try {
            return response()->json($this->orderClientRepository->createOrder($request));
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                "status" => false,
                "message" => "Đã có lỗi hệ thống!"
            ]);
        }
    }
}

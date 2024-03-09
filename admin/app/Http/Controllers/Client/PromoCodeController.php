<?php

namespace App\Http\Controllers\Client;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    protected $promoCodeClientRepository;
    public function __construct()
    {
        $this->promoCodeClientRepository = AdminFactory::promoCodeClientRepository();
    }

    public function checkPromoCode(Request $request, $discountCode)
    {
        $promoCode = $this->promoCodeClientRepository->checkPromoCodeOfUserByDiscountCode($discountCode);

        if ($promoCode) {
            return response()->json([
                "status" => true,
                "message" => null
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Mã giảm giá này không tìm tại trên hệ thống!"
            ]);
        }
    }
}

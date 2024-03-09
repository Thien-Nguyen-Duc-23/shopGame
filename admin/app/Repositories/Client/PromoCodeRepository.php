<?php

namespace App\Repositories\Client;

use App\Models\PromoCode;
use App\Models\LogActivity;
use App\Enums\PromoCodeStatus;
use Auth;
use Carbon\Carbon;
use App\Enums\PromoCodeIsDisposable;

class PromoCodeRepository
{
    protected $promoCode;
    protected $logActivity;

    public function __construct()
    {
        $this->promoCode = new PromoCode();
        $this->logActivity = new LogActivity();
    }

    /**
     * get Model
     */
    public function getModel(): string
    {
        return $this->promoCode;
    }

    public function find($id)
    {
        return $this->promoCode->find($id);
    }

    public function checkPromoCodeOfUserByDiscountCode($discountCode)
    {
        return $this->promoCode->where('discount_code', $discountCode)
            // ->where('user_id', \Auth::user()->id)
            ->where('status', PromoCodeStatus::ON_Type->value)
            ->where('start_at', '>=', Carbon::now())
            ->where('expired_at','<=', Carbon::now())
            ->where('is_disposable', PromoCodeIsDisposable::ON_Type->value)
            ->first();
    }
}

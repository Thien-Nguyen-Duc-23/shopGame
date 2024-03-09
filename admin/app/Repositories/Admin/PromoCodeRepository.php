<?php
namespace App\Repositories\Admin;

use App\Models\PromoCode;
use App\Models\LogActivity;
use App\Enums\PromoCodeStatus;
use Carbon\Carbon;
use App\Enums\PromoCodeIsDisposable;

Class PromoCodeRepository
{
    protected $promoCode;
    protected $log_activity;

    public function __construct()
    {
        $this->promoCode = new PromoCode();
        $this->log_activity = new LogActivity();
    }

    public function store($request) {
        try {
            $data = $request->all();

            $data['expired_at'] = Carbon::parse($request->expired_at)->format('Y-m-d H:i:s') ?? null;
            $data['user_ids'] = $request->user_ids ? implode(',', $request->user_ids) : null;
            $data['product_group_ids'] = $request->product_group_ids ? implode(',', $request->product_group_ids) : null;
            $data['product_ids'] = $request->product_ids ? implode(',', $request->product_ids) : null;
            $data['status'] = $request->status == 'on' ? PromoCodeStatus::ON_Type : PromoCodeStatus::OFF_Type;
            $data['value'] = str_replace([',', '.'], ['', ''], $data['value']);
            $data['order_min_value'] = str_replace([',', '.'], ['', ''], $data['order_min_value']);
            $data['order_max_value'] = str_replace([',', '.'], ['', ''], $data['order_max_value']);
            $data['is_disposable'] = $request->status == 'on' ? PromoCodeIsDisposable::ON_Type : PromoCodeIsDisposable::OFF_Type;
        
            return $this->promoCode->create($data);
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function listPromoCode($request) : array
    {
        try {
            $qtt = !empty($request['qtt']) ? $request['qtt'] : 20;
            $q = !empty($request['q']) ? $request['q'] : '';
            $data = ['data' => []];

            $listPromoCode = $this->promoCode->when($q, function ($query, $q)
            {
                $query->where('name', 'like', '%'. $q . '%');
            })->paginate($qtt);

            foreach ($listPromoCode as $promoCode)
            {
                $data['data'][] = $promoCode;
            }
            // Dữ liệu phân trang
            $data['total'] = $listPromoCode->total();
            $data['perPage'] = $listPromoCode->perPage();
            $data['current_page'] = $listPromoCode->currentPage();
            $data['firstItem'] = $listPromoCode->firstItem();
            $data['lastItem'] = $listPromoCode->lastItem();

            return [
                'error' => 0,
                'message' => '',
                'data' => $data
            ];

        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Lỗi truy vấn đến máy chủ'
            ];
        }
    }

    public function findPromoCodeById($id) {
        try {
            return $this->promoCode->find($id);
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function deletePromoCodeById($id) {
        try {
            return $this->promoCode->destroy($id);
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function update($request) {
        try {
            $data = $request->all();
            $data['expired_at'] = Carbon::parse($request->expired_at)->format('Y-m-d H:i:s') ?? null;
            $data['user_ids'] = $request->user_ids ? implode(',', $request->user_ids) : null;
            $data['product_group_ids'] = $request->product_group_ids ? implode(',', $request->product_group_ids) : null;
            $data['product_ids'] = $request->product_ids ? implode(',', $request->product_ids) : null;
            $data['status'] = $request->status == 'on' ? PromoCodeStatus::ON_Type : PromoCodeStatus::OFF_Type;
            $data['value'] = str_replace([',', '.'], ['', ''], $data['value']);
            $data['order_min_value'] = str_replace([',', '.'], ['', ''], $data['order_min_value']);
            $data['order_max_value'] = str_replace([',', '.'], ['', ''], $data['order_max_value']);
            $data['is_disposable'] = $request->status == 'on' ? PromoCodeIsDisposable::ON_Type : PromoCodeIsDisposable::OFF_Type;

            return $this->findPromoCodeById($request->id)->update($data);
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function updateByCondition($request)
    {
        try {
            $this->findPromoCodeById($request->id)->update($request->all());

            return [
                'error' => 0,
                'message' => 'Lưu thành công!'
            ];
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Lưu liệu thất bại!'
            ];
        }
    }
}

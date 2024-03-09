<?php
namespace App\Repositories\Admin;

use App\Models\CardExchangerRate;
use App\Models\LogActivity;
use Illuminate\Http\Request;

Class CardExchangerRateRepository
{
    protected $card_exchanger_rate;
    protected $log_activity;

    public function __construct()
    {
        $this->card_exchanger_rate = new CardExchangerRate();
        $this->log_activity = new LogActivity();
    }

    public function listCardExchangerRate($request) : array
    {
        try {
            $qtt = !empty($request['qtt']) ? $request['qtt'] : 20;
            $q = !empty($request['q']) ? $request['q'] : '';
            $data = ['data' => []];

            $listCardExchangerRate = $this->card_exchanger_rate->when($q, function ($query, $q)
            {
                $query->where('name', 'like', '%'. $q . '%');
            })->paginate($qtt);

            foreach ($listCardExchangerRate as $cardExchangerRate)
            {
                $data['data'][] = $cardExchangerRate;
            }
            $data['total'] = $listCardExchangerRate->total();
            $data['perPage'] = $listCardExchangerRate->perPage();
            $data['current_page'] = $listCardExchangerRate->currentPage();
            $data['firstItem'] = $listCardExchangerRate->firstItem();
            $data['lastItem'] = $listCardExchangerRate->lastItem();

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

    public function listCardExchangerRateByConditions($conditions)
    {
        try {
            return $this->card_exchanger_rate->when($conditions['card_exchanger_id'], function ($query) use ($conditions) {
                $query->where('card_exchanger_id', $conditions['card_exchanger_id']);
            })->paginate(20);

        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
}

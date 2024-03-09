<?php
namespace App\Repositories\Admin;

use App\Models\CardTransaction;
use App\Models\LogActivity;
use Illuminate\Http\Request;

Class CardTransactionRepository
{
    protected $card_transaction;
    protected $log_activity;

    public function __construct()
    {
        $this->card_transaction = new CardTransaction();
        $this->log_activity = new LogActivity();
    }

    public function listCardTransaction($request) : array
    {
        try {
            $qtt = !empty($request['qtt']) ? $request['qtt'] : 20;
            $q = !empty($request['q']) ? $request['q'] : '';
            $data = ['data' => []];

            $listCardTransaction = $this->card_transaction->when($q, function ($query, $q)
            {
                $query->where('name', 'like', '%'. $q . '%');
            })->paginate($qtt);

            foreach ($listCardTransaction as $cardTransaction)
            {
                $cardTransaction->userName = $cardTransaction->user->first_name . ' ' . $cardTransaction->user->last_name;
                $cardTransaction->cardProviderName = $cardTransaction->card_provider->name;
                $data['data'][] = $cardTransaction;
            }
            $data['total'] = $listCardTransaction->total();
            $data['perPage'] = $listCardTransaction->perPage();
            $data['current_page'] = $listCardTransaction->currentPage();
            $data['firstItem'] = $listCardTransaction->firstItem();
            $data['lastItem'] = $listCardTransaction->lastItem();

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
}

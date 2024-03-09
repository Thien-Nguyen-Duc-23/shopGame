<?php

namespace App\Repositories\Client;

use App\Models\CardTransaction;
use App\Models\LogActivity;
use App\Enums\CardTransactionStatus;
use Auth;

class CardTransactionRepository
{
    protected $cardTransaction;
    protected $logActivity;

    public function __construct()
    {
        $this->cardTransaction = new CardTransaction();
        $this->logActivity = new LogActivity();
    }

    /**
     * get Model
     */
    public function getModel(): string
    {
        return $this->cardTransaction;
    }

    public function getListCardTransaction($request)
    {
        try {

            if (!Auth::check()) {
                return [
                    'error' => 1,
                    'data' => [],
                    'message' => 'Chưa đăng nhập'
                ];
            }

            $pageSize = !empty($request['page_size']) ? $request['page_size'] : '';
            $pageNo = !empty($request['page_no']) ? $request['page_no'] : '';

            $data = ['error' => 0, 'data' => []];

            $query = $this->cardTransaction
                ->where('user_id', Auth::user()->id);

            $cardTransactions = $query->paginate($pageSize, ['*'], 'page', $pageNo);

            foreach ($cardTransactions as $cardTransaction) {
                $data['data'][] = $cardTransaction;
            }

            $data['total'] = $cardTransactions->total();
            $data['per_page'] = $cardTransactions->perPage();
            $data['current_page'] = $cardTransactions->currentPage();
            $data['first_item'] = $cardTransactions->firstItem();
            $data['last_item'] = $cardTransactions->lastItem();

            return $data;
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'data' => [],
                'message' => 'Truy vấn dữ liệu đổi thẻ không thành công'
            ];
        }
    }
}

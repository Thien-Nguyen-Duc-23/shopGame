<?php
namespace App\Repositories\Admin;

use App\Models\FeedBack;
use App\Models\LogActivity;

Class FeedbackRepository
{
    protected $feedBack;
    protected $log_activity;

    public function __construct()
    {
        $this->feedBack = new FeedBack();
        $this->log_activity = new LogActivity();
    }

    public function listFeedBack($request) : array
    {
        try {
            $qtt = !empty($request['qtt']) ? $request['qtt'] : 20;
            $q = !empty($request['q']) ? $request['q'] : '';
            $data = ['data' => []];

            $listFeedBack = $this->feedBack->with(['library', 'order'])->when($q, function ($query, $q)
            {
                $query->where('name', 'like', '%'. $q . '%');
            })->paginate($qtt);

            foreach ($listFeedBack as $feedBack)
            {

                $informationOrder = "Order ID: " . $feedBack->order_id;
                $informationOrder .= !empty($feedBack->order->user) ? ' - Khách: ' . $feedBack->order->user->full_name : $informationOrder;
                $informationOrder .= !empty($feedBack->order->product) ? ' - Tên sản phẩm: ' . $feedBack->order->product->name : $informationOrder;
                $feedBack->product_and_user_name = $informationOrder ?? null;
                $feedBack->image_feedback_temp = $feedBack->library && $feedBack->library->link ? asset($feedBack->library->link) : null;

                $data['data'][] = $feedBack;
            }

            // Dữ liệu phân trang
            $data['total'] = $listFeedBack->total();
            $data['perPage'] = $listFeedBack->perPage();
            $data['current_page'] = $listFeedBack->currentPage();
            $data['firstItem'] = $listFeedBack->firstItem();
            $data['lastItem'] = $listFeedBack->lastItem();

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

    public function findFeedBackById($id) {
        try {
            return $this->feedBack->find($id);
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function deleteFeedBackById($id) {
        try {
            return $this->feedBack->destroy($id);
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function store($request) {
        try {
            $data = $request->all();

            return $this->feedBack->create($data);
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function update($request) {
        try {
            $data = $request->all();

            return $this->findFeedBackById($request->id)->update($data);
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
}

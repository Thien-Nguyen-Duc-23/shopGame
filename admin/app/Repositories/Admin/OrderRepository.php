<?php
namespace App\Repositories\Admin;

use App\Models\Order;
use App\Models\OrderInfo;
use App\Models\UserDetail;
use App\Models\LogActivity;
use App\Enums\OrderStatus;
use Carbon\Carbon;

Class OrderRepository
{
    protected $order;
    protected $log_activity;
    protected $orderInfo;

    public function __construct()
    {
        $this->order = new Order();
        $this->log_activity = new LogActivity();
        $this->orderInfo = new Order();
    }

    /**
     * get all product no condition
     */
    public function getAllOrder()
    {
        return $this->order->all();
    }

    public function store($request) {
        try {
            $data = $request->all();

            $data['partner_rate'] = $data['partner_rate'] ? str_replace([',', '.'], ['', ''], $data['partner_rate']) : null;
            $data['discouted'] = $data['discouted'] ? str_replace([',', '.'], ['', ''], $data['discouted']) : null;
            $data['unit_price'] = $data['unit_price'] ? str_replace([',', '.'], ['', ''], $data['unit_price']) : null;
            $data['total'] = $data['total'] ? str_replace([',', '.'], ['', ''], $data['total']) : null;
            $data['received_at'] = Carbon::now();

            if ((int) $request->status == (int) OrderStatus::Success->value) {
                $data['completed_at'] = Carbon::now();
            }

            // create order
            $order = $this->order->create($data);

            $dataOrderInformation = [];
            if ($request->name || $request->content) {
                foreach ($request->name as $key => $orderInformationName) {
                    array_push($dataOrderInformation, [
                        'order_id' => $order->id,
                        'name' => $orderInformationName,
                        'content' => $request->content[$key] ?? null
                    ]);

                }
                OrderInfo::insert($dataOrderInformation);
            }

            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function listOrder($request) : array
    {
        try {
            $qtt = !empty($request['qtt']) ? $request['qtt'] : 20;
            $q = !empty($request['q']) ? $request['q'] : '';
            $data = ['data' => []];

            $listOrder = $this->order->when($q, function ($query, $q) {
                $query->where('name', 'like', '%'. $q . '%');
            })->orderBy('created_at', 'desc')->paginate($qtt);

            foreach ($listOrder as $order) {
                $order->processor_name = !empty($order->processor->full_name) ? $order->processor->full_name : '';
                $order->customer_name = !empty($order->user->full_name) ? $order->user->full_name : '';
                $order->product_name = !empty($order->product->name) ? $order->product->name : '';
                $data['data'][] = $order;
            }

            // Dữ liệu phân trang
            $data['total'] = $listOrder->total();
            $data['perPage'] = $listOrder->perPage();
            $data['current_page'] = $listOrder->currentPage();
            $data['firstItem'] = $listOrder->firstItem();
            $data['lastItem'] = $listOrder->lastItem();

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

    public function findOrderById($id) {
        try {
            return $this->order->find($id);
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function deleteOrderById($id) {
        try {

            if (!$order = $this->findOrderById($id)) {
                return [
                    'error' => 1,
                    'message' => 'Không tìm thấy đơn hàng!'
                ];
            }
            $order->delete();

            return [
                'error' => 0,
                'message' => 'Xóa dữ liệu thành công!'
            ];
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Xóa dữ liệu thất bại!'
            ];
        }
    }

    public function update($request) {
        try {
            if (!$order = $this->findOrderById($request->id)) {
                return [false, 'Không tìm thấy thông tin đơn hàng'];

            }
            $data = $request->all();

            $data['partner_rate'] = $data['partner_rate'] ? str_replace([',', '.'], ['', ''], $data['partner_rate']) : null;
            $data['discouted'] = $data['discouted'] ? str_replace([',', '.'], ['', ''], $data['discouted']) : null;
            $data['unit_price'] = $data['unit_price'] ? str_replace([',', '.'], ['', ''], $data['unit_price']) : null;
            $data['total'] = $data['total'] ? str_replace([',', '.'], ['', ''], $data['total']) : null;
            $data['received_at'] = Carbon::now();

            if ((int) $request->status == (int) OrderStatus::Success->value) {
                $data['completed_at'] = Carbon::now();
            }

            if (!$order->update($data)) {
                return [false, 'Cập nhật đơn hàng không thành công!'];
            }

            $dataOrderInformation = [];
            if ($request->name || $request->content) {
                foreach ($request->name as $key => $orderInformationName) {
                    array_push($dataOrderInformation, [
                        'order_id' => $order->id,
                        'name' => $orderInformationName,
                        'content' => $request->content[$key] ?? null
                    ]);

                }

                if (!empty($dataOrderInformation)) {
                    OrderInfo::where('order_id', $order->id)->delete();
                    OrderInfo::insert($dataOrderInformation);
                }
            }

            return [true, null];
        } catch (\Exception $e) {
            report($e);
            return [false, 'Lỗi truy vấn đến máy chủ'];
        }
    }

    public function getOrderInformationOfUser($userId)
    {
        return $this->order->where('user_id', $userId)->orderBy('created_at', 'desc')->paginate(5);
    }
}

<?php
namespace App\Repositories\Client;

use App\Models\Order;
use App\Models\OrderInfo;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;
use App\Enums\OrderStatus;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

Class OrderRepository
{
    protected $order;
    protected $product;

    protected $logActivity;

    public function __construct()
    {
        $this->order = new Order();
        $this->product = new Product();
        $this->logActivity = new LogActivity();
    }
    
    /**
     * get Model
     */
    public function getModel(): string
    {
        return $this->order;
    }

    public function createOrder($request)
    {
        try {
            $user = Auth::user();
            $product = $this->product->find($request->product_id);
            if (!$product) {
                return [
                    "status" => false,
                    "message" => "Không tìm thấy sản phẩm!"
                ];
            }
    
            $priceProduct = $this->product->sale_pricing ? $this->product->sale_pricing : $this->product->pricing;
            $creditTotal = $user->credit->total ?? 0;
            if ($priceProduct > $creditTotal) {
                return [
                    "status" => false,
                    "message" => 'Bạn không đủ tiền để thực hiện giao dịch này'
                ];
            }
    
            // create data save order
            $dataOrder = [
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'unit_price' => $request->unit_price,
                'total' => $request->quantity * $request->unit_price,
                'status' => OrderStatus::Processing->value,
                'received_at' => Carbon::now()
            ];
    
            $order = $this->order->create($dataOrder);
    
            if (!$order) {
                return [
                    "status" => false,
                    "message" => 'Tạo đơn hàng thất bại!'
                ];
            }
    
            return [
                "status" => true,
                "message" => 'Tạo đơn hàng thành công.'
            ];
        } catch (\Exception $e) {
            report($e);

            return [
                "status" => false,
                "message" => "Truy vấn đến máy chủ thất bại!"
            ];
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Factories\AdminFactory;
use App\Http\Requests\Admin\Order\StoreOrderRequest;
use App\Http\Requests\Admin\Order\UpdateOrderRequest;

class OrderController extends Controller
{
    protected $order;
    protected $user;
    protected $product;

    public function __construct()
    {
        $this->order = AdminFactory::orderRepository();
        $this->user = AdminFactory::userReposiroty();
        $this->product = AdminFactory::productRepository();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.order.index');
    }

    public function getListOrder(Request $request)
    {
        return response()->json($this->order->listOrder($request->all()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // get admin
        $admins = $this->user->getAllAdmin()->pluck('full_name', 'id')->toArray();
        // get user
        $users = $this->user->getAllUser()->pluck('full_name', 'id')->toArray();
        // get product
        $products = $this->product->getAllProduct()->pluck('name', 'id')->toArray();

        return view('admins.order.create', [
            'users' => $users,
            'products' => $products,
            'admins' => $admins
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        try {
            if ($this->order->store($request)) {
                return redirect()->route('admin.order')->with('success', 'Thêm thành công');
            } else {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            report($e);
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$order = $this->order->findOrderById($id)) {
            return redirect()->route('admin.order')->with('error', 'Không tìm thấy thông tin đơn hàng');
        }
        // get admin
        $admins = $this->user->getAllAdmin()->pluck('full_name', 'id')->toArray();
        // get user
        $users = $this->user->getAllUser()->pluck('full_name', 'id')->toArray();
        // get product
        $products = $this->product->getAllProduct()->pluck('name', 'id')->toArray();

        return view('admins.order.edit', [
            'users' => $users,
            'products' => $products,
            'order' => $order,
            'admins' => $admins
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, string $id)
    {
        try {
            list($result, $message) = $this->order->update($request);
            if ($result) {
                return redirect()->route('admin.order')->with('success', 'Cập nhật thành công');
            } else {
                return redirect()->back()->with('error', $message);
            }
        } catch (\Exception $e) {
            report($e);
            return redirect()->back()->with('error', 'Lỗi truy vấn đến máy chủ');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            return response()->json($this->order->deleteOrderById($id));
        } catch (\Exception $e) {

            return response()->json([
                'error' => 1,
                'message' => 'Xóa dữ liệu thất bại!'
            ], 400);
        }
    }
}

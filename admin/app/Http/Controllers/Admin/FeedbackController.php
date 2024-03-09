<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Factories\AdminFactory;
use App\Http\Requests\Admin\Feedback\StoreFeedbackRequest;
use App\Http\Requests\Admin\Feedback\UpdateFeedbackRequest;

class FeedbackController extends Controller
{
    protected $feedback;
    protected $order;

    public function __construct()
    {
        $this->feedback = AdminFactory::feedbackRepository();
        $this->order = AdminFactory::orderRepository();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.feedback.index');
    }

    public function listFeedback(Request $request)
    {
        return response()->json($this->feedback->listFeedBack($request->all()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $orders = $this->order->getAllOrder()->pluck('product_and_user_name', 'id')->toArray();

            return view('admins.feedback.create', [
                'orders' => $orders
            ]);
        } catch (\Exception $e) {
            report($e);
            return redirect()->route('admin.feedback')->with('error', 'Lấy thông tin thất bại');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeedbackRequest $request)
    {
        try {
            $this->feedback->store($request);
            
            return redirect()->route('admin.feedback')->with('success', 'Thêm thành công');
        } catch (\Exception $e) {
            report($e);
            return redirect()->back()->with('error', 'Thêm thất bại');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            if (!$feedback = $this->feedback->findFeedBackById($id)) {
                return redirect()->route('admin.feedback')->with('error', 'Lấy thông tin thất bại');
            }

            $orders = $this->order->getAllOrder()->pluck('product_and_user_name', 'id')->toArray();

            return view('admins.feedback.edit', [
                'orders' => $orders,
                'feedback' => $feedback
            ]);
        } catch (\Exception $e) {
            return redirect()->route('admin.feedback')->with('error', 'Lấy thông tin thất bại');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeedbackRequest $request, string $id)
    {
        try {
            if (!$this->feedback->findFeedBackById($request->id)) {
                return redirect()->back()->with('error', 'Không tìm thấy feedback!');
            }
            $this->feedback->update($request);

            return redirect()->route('admin.feedback')->with('success', 'Cập nhật thành công');
        } catch (\Exception $e) {
            report($e);
            return redirect()->back()->with('error', 'Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        try {
            if (!$this->feedback->findFeedBackById($id)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy feedback!'
                ], 400);
            }

            $this->feedback->deleteFeedBackById($id);
            
            return response()->json([
                'success' => true,
                'message' => 'Xóa thành công!'
            ]);
        } catch (\Exception $e) {
            report($e);
            return redirect()->route('admin.kol')->with('error', 'Xóa thất bại');
        }
    }
}

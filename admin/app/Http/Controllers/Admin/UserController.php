<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Factories\AdminFactory;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;

class UserController extends Controller
{
    protected $home;
    protected $user;
    protected $order;

    public function __construct()
    {
        $this->home = AdminFactory::homeRepository();
        $this->user = AdminFactory::userReposiroty();
        $this->order = AdminFactory::orderRepository();
    }

    public function index()
    {
        return view('admins.users.index');
    }

    public function listUser(Request $request)
    {
        return response()->json($this->user->listUser($request->all()));
    }

    public function create()
    {
        try {
            return view('admins.users.create');
        } catch (\Exception $e) {
            report($e);
            return redirect()->route('admin.user')->with('error', 'Lấy thông tin thất bại');
        }
    }

    public function store(StoreUserRequest $request)
    {
        try {
            list($result, $message) = $this->user->storeCustomer($request);
            if ($result) {
                return redirect()->route('admin.user')->with('success', 'Tạo khách hàng thành công');
            } else {
                return redirect()->back()->withInput($request->all())->with('error', $message);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput($request->all())->with('error', 'Tạo khách hàng thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            return response()->json($this->user->deleteCustomerById($id));
        } catch (\Exception $e) {

            return response()->json([
                'error' => 1,
                'message' => 'Xóa dữ liệu thất bại!'
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$user = $this->user->findCustomerById($id)) {
            return redirect()->route('admin.user')->with('error', 'Không tìm thấy thông tin khách hàng!');
        }

        return view('admins.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        try {
            list($result, $message) = $this->user->update($request);
            if ($result) {
                return redirect()->route('admin.user')->with('success', 'Cập nhật thành công!');
            } else {
                return redirect()->back()->withInput($request->all())->with('error', $message);
            }
        } catch (\Exception $e) {
            report($e);
            return redirect()->back()->withInput($request->all())->with('error', 'Lỗi truy vấn đến máy chủ!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(Request $request)
    {
        try {
            if (!$this->user->findCustomerById($request->id)) {

                return response()->json([
                    'error' => 1,
                    'message' => 'Không tìm thấy dữ liệu!'
                ], 400);
            }

            return response()->json($this->user->updateStatusCustomer($request));
        } catch (\Exception $e) {

            return response()->json([
                'error' => 1,
                'message' => 'Lưu thất bại!'
            ], 400);
        }
    }

    public function search(Request $request){
        return response()->json($this->user->listUser($request->all()));
    }

    public function detail(string $id)
    {
        if (!$user = $this->user->findCustomerById($id)) {
            return redirect()->route('admin.user')->with('error', 'Không tìm thấy thông tin khách hàng!');
        }

        list($result, $message, $kolPartners, $hirePartners, $referPartners) = $this->user->getInformationUserGroup($user->id);
        if (!$result) {
            return redirect()->route('admin.user')->with('error', $message);
        }

        return view('admins.users.detail', [
            'user' => $user,
            'kolPartners' => $kolPartners,
            'hirePartners' => $hirePartners,
            'referPartners' => $referPartners
        ]);
    }

    public function detailV2(string $id)
    {
        try {
            if (!$user = $this->user->findCustomerById($id)) {
                return redirect()->route('admin.user')->with('error', 'Không tìm thấy thông tin khách hàng!');
            }

            return view('admins.users.detail_v2', [
                'user' => $user
            ]);
        } catch (\Exception $e) {
            report($e);
            return redirect()->route('admin.user')->with('error', 'Không tìm thấy thông tin khách hàng!');
        }
    }
}

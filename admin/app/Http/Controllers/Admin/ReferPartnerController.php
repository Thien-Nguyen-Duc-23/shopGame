<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Factories\AdminFactory;
use App\Models\ReferPartner;
use App\Models\User;

class ReferPartnerController extends Controller
{
    protected $refer;

    public function __construct()
    {
        $this->refer = AdminFactory::referPartnerRepository();
    }

    public function index()
    {
        $users = User::notInReferPartners()->get();
        
        return view('admins.referPartners.index', compact('users'));
    }

    public function listRefer(Request $request)
    {
        return response()->json($this->refer->listRefer($request->all()));
    }

    public function create()
    {
        return view('admins.referPartners.create');
    }

    public function store(Request $request)
    {
        if($this->refer->store($request))
        {
            return redirect()->route('admin.refer')->with('success', 'Thêm thành công');
        }else{
            return redirect()->route('admin.refer')->with('error', 'Thêm thất bại');
        }
    }

    public function edit($id){
        $referPartner = ReferPartner::findOrFail($id);

        return view('admins.referPartners.update', compact('referPartner'));
    }

    public function update(Request $request, $id){
        $referPartner = ReferPartner::findOrFail($id);

        //dd($category);

        if($this->refer->update($request, $referPartner))
        {
            return redirect()->route('admin.refer')->with('success', 'Cập nhật thành công');
        }else{
            return redirect()->route('admin.refer')->with('error', 'Cập nhật thất bại');
        }
    }

    public function delete($id){
        if($this->refer->delete($id))
        {
            return redirect()->route('admin.refer')->with('success', 'Xóa thành công');
        }else{
            return redirect()->route('admin.refer')->with('error', 'Xóa thất bại');
        }
    }

    public function search(Request $request)
    {
        return response()->json($this->refer->listRefer($request->all()));
    }

    public function inforOfReferPartner($id, Request $request){
        try {
            $referPartner = ReferPartner::findOrFail($id);

            // Chuyển chuỗi id thành mảng các id người dùng
            $userIds = $referPartner->user_ids ? explode(',', $referPartner->user_ids) : [];
            //dd($userIds);

            // Truy vấn thông tin người dùng
            $users = User::whereIn('id', $userIds)->get();

            return view('admins.referPartners.inforOfReferPartner', compact('referPartner', 'users'));
        } catch (\Exception $e) {
            report($e);

            return redirect()->route('admin.refer')->with('error', 'Không tìm thấy khách tiếp thị liên kết!');
        }
    }

    public function addUserToGroup(Request $request){
        try {
            $referPartner = ReferPartner::find($request->get('id'));

            $isValid = $this->refer->addUserToGroup($request, $referPartner);

            // Nếu việc thêm người dùng vào group thành công, trả về 1 phẩn hồi JSON thành công
            if($isValid){
                session()->flash('success', 'Thêm người dùng vào nhóm thành công!');

                return response()->json([
                    'success' => true,
                    //'message' => 'Thêm người dùng vào nhóm thành công!',
                ]);
            }else{
                session()->flash('error', 'Thêm người dùng vào nhóm thất bại!');

                // Nếu có lỗi xảy ra, trả về 1 phản hồi JSON với thông báo lỗi
                return response()->json([
                   'success' => false,
                   //'message' => 'Thêm người dùng vào nhóm thất bại!',
                ]);
            }
        } catch (\Exception $e) {
            report($e);

            session()->flash('error', 'Có lỗi xảy ra trong quá trình thêm người dùng vào nhóm!');

            return response()->json([
                'success' => false,
                //'message' => 'Có lỗi xảy ra trong quá trình thêm người dùng vào nhóm!',
            ]);
        }
    }
}

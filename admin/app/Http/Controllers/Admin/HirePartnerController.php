<?php

namespace App\Http\Controllers\Admin;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use App\Models\HirePartner;
use App\Models\User;
use Illuminate\Http\Request;


class HirePartnerController extends Controller
{
    protected $hire;

    public function __construct()
    {
        $this->hire = AdminFactory::hirePartnerRepository();
    }

    public function index()
    {
        $users = User::notInHirePartners()->get();
        //dd($users);

        return view('admins.hirePartners.index', compact('users'));
    }

    public function listHire(Request $request)
    {
        return response()->json($this->hire->listHire($request->all()));
    }

    public function create()
    {
        $users = User::all();
        return view('admins.hirePartners.create', compact('users'));
    }

    public function store(Request $request)
    {
        if($this->hire->store($request))
        {
            session()->flash('success', 'Thêm thành công');
            return redirect()->route('admin.hire');
        }else{
            session()->flash('error', 'Thêm thất bại');
            return redirect()->route('admin.hire');
        }
    }

    public function edit($id){
        $hirePartner = HirePartner::findOrFail($id);
        $users = User::all();

        return view('admins.hirePartners.update', compact('hirePartner', 'users'));
    }

    public function update(Request $request, $id){
        $hirePartner = HirePartner::findOrFail($id);

        //dd($category);

        if($this->hire->update($request, $hirePartner))
        {
            session()->flash('success', 'Cập nhật thành công');
            return redirect()->route('admin.hire');
        }else{
            session()->flash('error', 'Cập nhật thất bại');
            return redirect()->route('admin.hire');
        }
    }

    public function delete($id){
        if($this->hire->delete($id))
        {
            session()->flash('success', 'Xóa thành công');
            return redirect()->route('admin.hire');
        }else{
            session()->flash('error', 'Xóa thất bại');
            return redirect()->route('admin.hire');
        }
    }

    public function search(Request $request){
        return response()->json($this->hire->listHire($request->all()));
    }

    public function inforOfHirePartner(Request $request, $id){
        try {
            $hirePartner = HirePartner::findOrFail($id);

            // Chuyển chuỗi id thành mảng các id người dùng
            $userIds = $hirePartner->user_ids ? explode(',', $hirePartner->user_ids) : [];
            //dd($userIds);

            // Truy vấn thông tin người dùng
            $users = User::whereIn('id', $userIds)->get();
            //dd($users);

            return view('admins.hirePartners.inforOfHirePartner', compact('hirePartner', 'users'));
        } catch (\Exception $e) {
            report($e);

            return redirect()->route('admin.hire')->with('error', 'Không tìm thấy đối tác cày thuê!');
        }
    }

    public function addUserToGroup(Request $request){
        try {
            $hirePartner = HirePartner::find($request->get('id'));

            $isValid = $this->hire->addUserToGroup($request, $hirePartner);

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

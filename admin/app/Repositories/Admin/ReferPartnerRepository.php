<?php
namespace App\Repositories\Admin;

use App\Models\ReferPartner;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

Class ReferPartnerRepository
{
    protected $referPartner;
    protected $log_activity;

    public function __construct()
    {
        $this->referPartner = new ReferPartner();
        $this->log_activity = new LogActivity();
    }

    public function listRefer($request) : array
    {
        try {
            $qtt = !empty($request['qtt']) ? $request['qtt'] : 20;
            $q = !empty($request['q']) ? $request['q'] : '';
            $data = ['data' => []];

            $listReferPartner = $this->referPartner->when($q, function ($query, $q)
            {
                $query->where('name', 'like', '%'. $q . '%');
            })->orderBy('id', 'desc')->paginate($qtt);

            foreach ($listReferPartner as $referPartner)
            {
                $data['data'][] = $referPartner;
            }
            // Dữ liệu phân trang
            $data['total'] = $listReferPartner->total();
            $data['perPage'] = $listReferPartner->perPage();
            $data['current_page'] = $listReferPartner->currentPage();
            $data['firstItem'] = $listReferPartner->firstItem();
            $data['lastItem'] = $listReferPartner->lastItem();

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

    public function store(Request $request)
    {
        $message = [
            'name.required' => 'Tên đối tác giới thiệu không được để trống',
            'name.string' => 'Tên đối tác giới thiệu phải là chuỗi',
            'name.max' => 'Tên đối tác giới thiệu không vượt quá 255 ký tự',
            'name.unique' => 'Tên đối tác giới thiệu đã tồn tại',
            'rate.required' => 'Tỉ lệ chiết khấu không được để trống',
            'rate.numeric' => 'Tỉ lệ chiết khấu phải là số',
        ];

        $request->validate([
            'name' => 'required|string|max:255|unique:hire_partners',
            'rate' => 'required|numeric',
        ], $message);

        try {
            $this->referPartner->create([
                'name' => $request['name'],
                'rate' => $request['rate'],
                'token'=> Str::random(32),
            ]);
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
    
    public function update($request, $referPartner)
    {
        $message = [
            'name.required' => 'Tên khách tiếp thị liên kết không được để trống',
            'name.string' => 'Tên khách tiếp thị liên kết phải là chuỗi',
            'name.max' => 'Tên khách tiếp thị liên kết không vượt quá 255 ký tự',
            'name.unique' => 'Tên khách tiếp thị liên kết đã tồn tại',
            'rate.required' => 'Tỉ lệ chiết khấu không được để trống',
            'rate.numeric' => 'Tỉ lệ chiết khấu phải là số',
        ];

        $request->validate([
            'name' => 'required|string|max:255|unique:hire_partners',
            'rate' => 'required|numeric',
        ], $message);

        try {
            $referPartner->update([
                'name' => $request['name'],
                'rate' => $request['rate'],
            ]);
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function delete($id)
    {
        try {
            ReferPartner::destroy($id);
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function addUserToGroup($request, $referPartner){
        try {
            // Lấy danh sách user_ids hiện tại trong bảng hire_partners
            $userIds = $referPartner->user_ids ? explode(',', $referPartner->user_ids) : [];

            // Lấy danh sách user_ids mới từ request
            $newUserIds = $request->input('user_ids');

            // Kiểm tra và cập nhật danh sách user_ids
            foreach($newUserIds as $userId)
            {
                // Nếu userId không tồn tại trong danh sách hiện tại thì thêm vào danh sách
                if(!in_array($userId, $userIds))
                {
                    $userIds[] = $userId;
                }
            }

            // Cập nhật lại cột user_ids của hire_partners
            $referPartner->user_ids = implode(',', $userIds);
            $referPartner->save();

            return true;
        } catch (\Exception $e) {
            report($e);

            return false;
        }
    }
}

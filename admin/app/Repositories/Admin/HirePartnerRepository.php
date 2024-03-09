<?php
namespace App\Repositories\Admin;

use App\Models\hirePartner;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

Class hirePartnerRepository
{
    protected $hirePartner;
    protected $log_activity;

    public function __construct()
    {
        $this->hirePartner = new hirePartner();
        $this->log_activity = new LogActivity();
    }

    public function listHire($request) : array
    {
        try {
            $qtt = !empty($request['qtt']) ? $request['qtt'] : 20;
            $q = !empty($request['q']) ? $request['q'] : '';
            $data = ['data' => []];

            $listhirePartner = $this->hirePartner->when($q, function ($query, $q)
            {
                $query->where('name', 'like', '%'. $q . '%');
            })->orderBy('id', 'desc')->paginate($qtt);

            foreach ($listhirePartner as $hirePartner)
            {
                $data['data'][] = $hirePartner;
            }
            // Dữ liệu phân trang
            $data['total'] = $listhirePartner->total();
            $data['perPage'] = $listhirePartner->perPage();
            $data['current_page'] = $listhirePartner->currentPage();
            $data['firstItem'] = $listhirePartner->firstItem();
            $data['lastItem'] = $listhirePartner->lastItem();

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
        //dd($request->all());

        $message = [
            'name.required' => 'Tên đối tác cày thuê không được để trống',
            'name.string' => 'Tên đối tác cày thuê phải là chuỗi',
            'name.max' => 'Tên đối tác cày thuê không vượt quá 255 ký tự',
            'name.unique' => 'Tên đối tác cày thuê đã tồn tại',
            'rate.required' => 'Tỉ lệ chiết khấu không được để trống',
            'rate.numeric' => 'Tỉ lệ chiết khấu phải là số',
        ];

        $request->validate([
            'name' => 'required|string|max:255|unique:hire_partners',
            'rate' => 'required|numeric',
        ], $message);

        try {
            $this->hirePartner->create([
                'name' => $request['name'],
                'rate' => $request['rate'],
                'token'=> Str::random(32),
                //'user_ids' => $request['user_ids'] ? implode(',', $request['user_ids']) : null,
            ]);
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function update($request, $hirePartner)
    {
        $message = [
            'name.required' => 'Tên đối tác cày thuê không được để trống',
            'name.string' => 'Tên đối tác cày thuê phải là chuỗi',
            'name.max' => 'Tên đối tác cày thuê không vượt quá 255 ký tự',
            'name.unique' => 'Tên đối tác cày thuê đã tồn tại',
            'rate.required' => 'Tỉ lệ chiết khấu không được để trống',
            'rate.numeric' => 'Tỉ lệ chiết khấu phải là số',
        ];

        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('hire_partners')->ignore($hirePartner->id),
            ],
            'rate' => 'required|numeric',
        ], $message);

        try {
            $hirePartner->update([
                'name' => $request['name'],
                'rate' => $request['rate'],
                //'user_ids' => $request['user_ids'] ? implode(',', $request['user_ids']) : $hirePartner->user_ids,
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
            hirePartner::destroy($id);
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function addUserToGroup($request, $hirePartner){
        //$data = $request->all();

        //dd($hirePartner);

        try {
            // Lấy danh sách user_ids hiện tại trong bảng hire_partners
            $userIds = $hirePartner->user_ids ? explode(',', $hirePartner->user_ids) : [];

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
            $hirePartner->user_ids = implode(',', $userIds);
            $hirePartner->save();

            return true;
        } catch (\Exception $e) {
            report($e);

            return false;
        }
    }
}

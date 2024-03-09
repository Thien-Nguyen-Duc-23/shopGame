<?php
namespace App\Repositories\Admin;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\LogActivity;
use App\Models\Credit;
use App\Models\KolParner;
use App\Models\ReferPartner;
use App\Models\HirePartner;
use App\Enums\UserRole;
use App\Enums\UserStatus;
use Illuminate\Support\Carbon;
use Str;

Class UserReposiroty
{
    protected $user;
    protected $user_detail;
    protected $log_activity;
    protected $credit;

    public function __construct()
    {
        $this->user = new User();
        $this->user_detail = new UserDetail();
        $this->log_activity = new LogActivity();
        $this->credit = new Credit();
    }

    public function listUser($request) : array
    {
        $kolPartners = KolParner::all();
        $hirePartners = HirePartner::all();
        $referPartners = ReferPartner::all();

        try {
            $qtt = !empty($request['qtt']) ? $request['qtt'] : 20;
            $q = !empty($request['q']) ? $request['q'] : '';
            $data = ['data' => []];

            $listUser = $this->user->when($q, function ($query, $q)
            {
                $query->where('first_name', 'like', '%'. $q . '%')
                    ->orWhere('last_name', 'like', '%'. $q . '%')
                    ->orWhere('email', 'like', '%'. $q . '%');
            })
                ->where('role', UserRole::Customer->value)
                ->orderBy('id')
                ->paginate($qtt);

            foreach ($listUser as $user)
            {
                $user->credits = !empty($user->credit->credit) ? $user->credit->credit : '';
                $user->total = !empty($user->credit->total) ? $user->credit->total : '';
                $user->socical_account = !empty($user->socialAccount->first()->provider) ? $user->socialAccount->first()->provider : $user->email;
                $user->text_last_login = $user->last_login ? date('H:i:s d-m-Y', strtotime($user->last_login)) : '';
                $user->text_created_at = $user->created_at ? date('H:i:s d-m-Y', strtotime($user->created_at)) : '';
                $user->point = $user->userDetail->point ?? '';
                $nameGroup = null;
                $kolPartner = $kolPartners->filter(function ($item) use ($user) {
                    $userIds = array_map('intval', explode(',', $item->user_ids)) ?? [];
                    if (in_array($user->id, $userIds)) {
                        return $item;
                    }
                })->values()->pluck('name')->toArray();

                $nameGroup = implode(', ', $kolPartner);

                $hirePartner = $hirePartners->filter(function ($item) use ($user) {
                    $userIds = array_map('intval', explode(',', $item->user_ids)) ?? [];
                    if (in_array($user->id, $userIds)) {
                        return $item;
                    }
                })->values()->pluck('name')->toArray();

                $nameGroup .= $nameGroup != null && !empty($hirePartner) ? ', ' . implode(', ', $hirePartner) : implode(', ', $hirePartner);
                
                $referPartner = $referPartners->filter(function ($item) use ($user) {
                    $userIds = array_map('intval', explode(',', $item->user_ids)) ?? [];
                    if (in_array($user->id, $userIds)) {
                        return $item;
                    }
                })->values()->pluck('name')->toArray();
                $nameGroup .= $nameGroup != null && !empty($referPartner) ? ', ' . implode(', ', $referPartner) : implode(', ', $referPartner);
                $user->name_group = $nameGroup == ', ' ? '' : $nameGroup;
                $data['data'][] = $user;
            }
            $data['total'] = $listUser->total();
            $data['perPage'] = $listUser->perPage();
            $data['current_page'] = $listUser->currentPage();
            $data['firstItem'] = $listUser->firstItem();
            $data['lastItem'] = $listUser->lastItem();

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

    /**
     * get all product no condition
     */
    public function getAllUser()
    {
        return $this->user->where('role', UserRole::Customer->value)->get();
    }

    public function getAllAdmin()
    {
        return $this->user->where('role', UserRole::Admin->value)->get();
    }

    /**
     * get all product no condition
     */
    public function getUserByIds($userIds)
    {
        return $this->user->whereIn('id', $userIds)->get();
    }

    public function storeCustomer($request)
    {
        try {
            $dataUser = $dataUserInformation =$request->all();
            $dataUser['role'] = UserRole::Customer->value;
            $dataUser['password'] = \Hash::make($request->password);
            
            if (!$user = $this->user->create($dataUser)) {
                return [false, 'Đã có lỗi xãy ra trong quá trình tạo khách hàng!'];
            }

            $dataUserInformation['date'] = Carbon::parse($request->date)->format('Y-m-d');
            $dataUserInformation['affiliate'] = Str::random(32);
            $dataUserInformation['user_id'] = $user->id;
            $dataUserInformation['user_create'] = auth()->user()->id;
            if (!$this->user_detail->create($dataUserInformation)) {
                return [false, 'Đã có lỗi xãy ra trong quá trình tạo khách hàng chi tiết!'];
            }

            // create data credit
            if (!$this->credit->create([
                'user_id' => $user->id
            ])) {
                return [false, 'Đã có lỗi xãy ra trong quá trình tạo thẻ tín dụng!'];
            }

            return [true, null];
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Lỗi truy vấn đến máy chủ'
            ];
        }
    }

    public function findCustomerById($id) {
        try {
            return $this->user->find($id);
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function deleteCustomerById($id) {
        try {
            if (!$user = $this->findCustomerById($id)) {
                return [
                    'error' => 1,
                    'message' => 'Không tìm thấy khách hàng!'
                ];
            }

            if ($user->userDetail && !$user->userDetail->delete()) {
                throw new \Exception('Xóa dữ liệu thất bại!');
            }

            if (!$user->delete()) {
                throw new \Exception('Xóa dữ liệu thất bại!');
            }

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
            if (!$user = $this->findCustomerById($request->id)) {
                return [false, 'Không tìm thấy thông tin khách hàng!'];
            }

            if($request->old_password && $request->password && !\Hash::check($request->old_password, $user->password)) {
                return [false, 'Mật khẩu không đung!'];
            }

            $dataUser = $dataUserInformation = $request->all();
            if ($request->password) {
                $dataUser['password'] = \Hash::make($request->password);
            } else {
                unset($dataUser['password']);
            }

            if (!$user->update($dataUser)) {
                return [false, 'Đã có lỗi xãy ra trong quá trình cập nhật khách hàng!'];
            }

            $dataUserInformation['user_id'] = $user->id;
            $dataUserInformation['date'] = Carbon::parse($request->date)->format('Y-m-d');

            if (!$user->userDetail) {
                $this->user_detail->create($dataUserInformation);
            } else {
                $user->userDetail->update($dataUserInformation);
            }

            return [true, null];
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Lỗi truy vấn đến máy chủ'
            ];
        }
    }

    public function updateStatusCustomer($request)
    {
        try {
            if ($this->findCustomerById($request->id)->update($request->all())) {
                return [
                    'error' => 0,
                    'message' => 'Thay đổi trạng thái thành công!'
                ];
            } else {
                throw new \Exception('Thay đổi trạng thái thất bại!');
            }
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Thay đổi trạng thái thất bại!'
            ];
        }
    }

    public function getInformationUserGroup($userId)
    {
        try {
            $kolPartners = KolParner::all();
            $hirePartners = HirePartner::all();
            $referPartners = ReferPartner::all();
            $kolPartners = $kolPartners->filter(function ($item) use ($userId) {
                $userIds = array_map('intval', explode(',', $item->user_ids)) ?? [];
                if (in_array($userId, $userIds)) {
                    return $item;
                }
            })->values()->pluck('name', 'id')->toArray();

            $hirePartners = $hirePartners->filter(function ($item) use ($userId) {
                $userIds = array_map('intval', explode(',', $item->user_ids)) ?? [];
                if (in_array($userId, $userIds)) {
                    return $item;
                }
            })->values()->pluck('name', 'id')->toArray();
            
            $referPartners = $referPartners->filter(function ($item) use ($userId) {
                $userIds = array_map('intval', explode(',', $item->user_ids)) ?? [];
                if (in_array($userId, $userIds)) {
                    return $item;
                }
            })->values()->pluck('name', 'id')->toArray();

            return [true, null, $kolPartners, $hirePartners, $referPartners];
        } catch (\Exception $e) {
            report($e);
            return [false, 'Lỗi truy vấn đến máy chủ', null, null, null];
        }
    }
}

<?php
namespace App\Repositories\Admin;

use App\Models\KolParner;
use App\Models\LogActivity;
use Illuminate\Support\Str;
use App\Models\User;

Class KolPartnerRepository
{
    protected $kolPartner;
    protected $log_activity;
    protected $user;

    public function __construct()
    {
        $this->kolPartner = new KolParner();
        $this->log_activity = new LogActivity();
        $this->user = new User();
    }

    public function listKol($request) : array
    {
        try {
            $qtt = !empty($request['qtt']) ? $request['qtt'] : 20;
            $q = !empty($request['q']) ? $request['q'] : '';
            $data = ['data' => []];

            $listKolPartner = $this->kolPartner->when($q, function ($query, $q)
            {
                $query->where('name', 'like', '%'. $q . '%');
            })->paginate($qtt);

            foreach ($listKolPartner as $kolPartner)
            {
                $kolPartnerIds = $kolPartner->user_ids ? array_map('intval', explode(',', $kolPartner->user_ids)) : [];

                if (!empty($kolPartnerIds)) {
                    $kolPartner->number_user = $this->user->whereIn('id', $kolPartnerIds)->count();
                } else {
                    $kolPartner->number_user = 0;
                }
                $data['data'][] = $kolPartner;
            }
            // Dữ liệu phân trang
            $data['total'] = $listKolPartner->total();
            $data['perPage'] = $listKolPartner->perPage();
            $data['current_page'] = $listKolPartner->currentPage();
            $data['firstItem'] = $listKolPartner->firstItem();
            $data['lastItem'] = $listKolPartner->lastItem();

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

    public function store($data) {
        return $this->kolPartner->create($data);
    }

    public function findKolById($id) {
        try {
            return $this->kolPartner->find($id);
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function deleteKolById($id) {
        try {
            $this->kolPartner->destroy($id);

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

    public function createOrUpdate($request)
    {
        try {
            $data = $request->all();
            $data['user_ids'] = $request->user_ids ? implode(',', $request->user_ids) : null;

            if ($kol = $this->findKolById($request->id)) {
                $kol->update($data);
            } else {
                $data['token'] = Str::random(32);

                $this->kolPartner->create($data); 
            }
            return [
                'error' => 0,
                'message' => 'Lưu dữ liệu thành công!'
            ];
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Lưu dữ liệu thất bại!'
            ];
        }     
    }
}

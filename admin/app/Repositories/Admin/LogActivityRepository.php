<?php
namespace App\Repositories\Admin;

use App\Models\LogActivity;
use Illuminate\Http\Request;

Class LogActivityRepository
{
    protected $log_activity;

    public function __construct()
    {
        $this->log_activity = new LogActivity();
    }

    public function listLogActivity($request) : array
    {
        try {
            $qtt = !empty($request['qtt']) ? $request['qtt'] : 20;
            $q = !empty($request['q']) ? $request['q'] : '';
            $data = ['data' => []];

            $listLogActivity = $this->log_activity->when($q, function ($query, $q)
            {
                $query->where('name', 'like', '%'. $q . '%');
            })->orderBy('id', 'desc')->paginate($qtt);

            foreach ($listLogActivity as $log_activity)
            {
                $log_activity->is_user = !empty($log_activity->nguoi_dung) ? true : false;

                if(!empty($log_activity->nguoi_dung->first_name) && !empty($log_activity->nguoi_dung->last_name)){
                    $log_activity->userName = $log_activity->nguoi_dung->first_name . ' ' . $log_activity->nguoi_dung->last_name;
                }

                $data['data'][] = $log_activity;
            }

            //dd($category->count_products);
            $data['total'] = $listLogActivity->total();
            $data['perPage'] = $listLogActivity->perPage();
            $data['current_page'] = $listLogActivity->currentPage();
            $data['firstItem'] = $listLogActivity->firstItem();
            $data['lastItem'] = $listLogActivity->lastItem();

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
}

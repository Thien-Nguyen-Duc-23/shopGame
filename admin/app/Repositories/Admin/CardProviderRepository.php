<?php
namespace App\Repositories\Admin;

use App\Models\CardProvider;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Class CardProviderRepository
{
    protected $cardProvider;
    protected $logActivity;

    public function __construct()
    {
        $this->cardProvider = new CardProvider();
        $this->logActivity = new LogActivity();
    }

    public function listCardProvider($request) : array
    {
        try {
            $qtt = !empty($request['qtt']) ? $request['qtt'] : 20;
            $q = !empty($request['q']) ? $request['q'] : '';
            $data = ['data' => []];

            $listCardProvider = $this->cardProvider->when($q, function ($query, $q)
            {
                $query->where('name', 'like', '%'. $q . '%');
            })->paginate($qtt);

            foreach ($listCardProvider as $cardProvider)
            {
                $cardProvider->rate = $cardProvider->rate ? $cardProvider->rate : 0;
                $data['data'][] = $cardProvider;
            }
            $data['total'] = $listCardProvider->total();
            $data['perPage'] = $listCardProvider->perPage();
            $data['current_page'] = $listCardProvider->currentPage();
            $data['firstItem'] = $listCardProvider->firstItem();
            $data['lastItem'] = $listCardProvider->lastItem();

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

    public function getDetailCardProvider($request)
    {
        try {
            if (!empty($request['id'])) {
                $cardProvider = $this->cardProvider->find($request['id']);
                if (!empty($cardProvider)) {

                    return [
                        'error' => 0,
                        'message' => '',
                        'cardProvider' => $cardProvider
                    ];
                } else {
                    return [
                        'error' => 1,
                        'message' => 'Nhà cung cấp không tồn tại'
                    ];
                }
            } else {
                return [
                    'error' => 1,
                    'message' => 'Truy vấn nhà cung cấp không có trường truy vấn'
                ];
            }
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Truy vấn đến nhà cung cấp thất bại'
            ];
        }
    }

    private function validate($request) : array
    {
        if (empty($request['name'])) {
            return [
                'error' => 1,
                'message' => 'Tên nhà cung cấp không được để trống'
            ];
        } elseif (strlen($request['name']) < 2 || strlen($request['name']) > 255) {
            return [
                'error' => 1,
                'message' => 'Tên nhà cung cấp không được nhỏ hơn 2 ký tự hoặc lớn hơn 255 ký tự'
            ];
        } elseif (!empty($request['rate']) && $request['rate'] > 100) {
            return [
                'error' => 1,
                'message' => 'Chiết khấu không được quá 100%'
            ];
        }

        return [ 'error' => 0 ];
    }

    public function actionCardProvider($request) : array
    {
        $action = !empty($request['action']) ? $request['action'] : '';
        switch ($action) {
            case 'create':
                return $this->createCardProvider($request);
            case 'edit':
                return $this->updateCardProvider($request);
            case 'delete':
                return $this->deleteCardProvider($request);
            default:
                return [
                    'error' => 1,
                    'message' => 'Hành động không có trong dữ liệu hệ thống'
                ];
        }
    }

    private function createCardProvider($request) : array
    {
        $validate = $this->validate($request);
        if ($validate['error']) {
            return $validate;
        }

        // create data
        $this->cardProvider->create([
            'name' => $request['name'],
            'rate' => $request['rate'] ?? null
        ]);

        // ghi log
        $this->logActivity->create([
            'user_id' => Auth::id(),
            'action' => 'tạo',
            'model' => 'Admin/CardProvider',
            'admin' => ' Nhà cung cấp ' . $request['name'],
        ]);

        return [
            'error' => 0,
            'message' => 'Tạo nhà cung cấp thành công'
        ];
    }

    private function updateCardProvider($request) : array
    {
        try {
            if (!empty($request['id'])) {
                $cardProvider = $this->cardProvider->find($request['id']);
                if (!empty($cardProvider)) {
                    $validate = $this->validate($request);
                    if ($validate['error']) {
                        return $validate;
                    }

                    // ghi log
                    $this->logActivity->create([
                        'user_id' => Auth::id(),
                        'action' => 'chỉnh sửa',
                        'model' => 'Admin/CardProvider',
                        'admin' => ' Nhà cung cấp ' . $cardProvider->name,
                    ]);

                    $cardProvider->update([
                        'name' => $request['name'],
                        'rate' => $request['rate']
                    ]);

                    return [
                        'error' => 0,
                        'message' => 'Chỉnh sửa nhà cung cấp thành công'
                    ];
                } else {
                    return [
                        'error' => 1,
                        'message' => 'Nhà cung cấp không tồn tại'
                    ];
                }
            } else {
                return [
                    'error' => 1,
                    'message' => 'Truy vấn cung cấp không có trường truy vấn'
                ];
            }
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Truy vấn đến nhà cung cấp'
            ];
        }
    }

    private function deleteCardProvider($request) : array
    {
        try {
            if (!empty($request['id'])) {
                $cardProvider = $this->cardProvider->find($request['id']);
                if (!empty($cardProvider)) {

                    // ghi log
                    $data_log = [
                        'user_id' => Auth::id(),
                        'action' => 'xóa',
                        'model' => 'Admin/CardProvider',
                        'admin' => ' nhà cung cấp ' . $cardProvider->name,
                    ];
                    $this->logActivity->create($data_log);

                    $cardProvider->delete();

                    return [
                        'error' => 0,
                        'message' => 'Xóa nhà cung cấp thành công'
                    ];
                } else {
                    return [
                        'error' => 1,
                        'message' => 'Nhà cung cấp không tồn tại'
                    ];
                }
            } else {
                return [
                    'error' => 1,
                    'message' => 'Truy vấn nhà cung cấp không có trường truy vấn'
                ];
            }
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Truy vấn đến nhà cung cấp thất bại'
            ];
        }
    }
}

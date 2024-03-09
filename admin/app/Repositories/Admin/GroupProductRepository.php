<?php
namespace App\Repositories\Admin;

use App\Models\GroupProduct;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;

Class GroupProductRepository
{
    protected $groupProduct;
    protected $logActivity;

    public function __construct()
    {
        $this->groupProduct = new GroupProduct();
        $this->logActivity = new LogActivity();
    }
    
    /**
     * get Model
     */
    public function getModel(): string
    {
        return $this->groupProduct;
    }

    /**
     * get all group product no condition
     */
    public function getAllGroupProduct()
    {
        return $this->groupProduct->all();
    }

    public function getGroupProductSearch($request)
    {
        try {
            $q = !empty($request['q']) ? $request['q'] : '';
            $qtt = !empty($request['sl']) ? $request['sl'] : '';
            $data = ['error' => 0, 'data' => []];

            $listGroupProduct = $this->groupProduct->when($q, function ($query, $q)
            {
                $query->where('first_name', 'like', '%'. $q . '%')->where('email', 'like', '%'. $q . '%');
            })
            ->paginate($qtt);

            foreach ($listGroupProduct as $groupProduct)
            {
                $groupProduct->is_avatar = !empty($groupProduct->library->link) ? 1 : 0;
                $groupProduct->avatar = !empty($groupProduct->library->link) ? $groupProduct->library->link : '';

                $data['data'][] = $groupProduct;
            }
            $data['total'] = $listGroupProduct->total();
            $data['perPage'] = $listGroupProduct->perPage();
            $data['current_page'] = $listGroupProduct->currentPage();
            $data['firstItem'] = $listGroupProduct->firstItem();
            $data['lastItem'] = $listGroupProduct->lastItem();

            return $data;
        } catch (\Exception $e)
        {
            report($e);
            return [
                'error' => 1,
                'message' => 'Truy vấn đến nhóm sản phẩm thất bại'
            ];
        }
    }

    public function getDetailGroupProduct($request)
    {
        try {
            if (!empty($request['id'])) {
                $groupProduct = $this->groupProduct->find($request['id']);
                if (!empty($groupProduct)) {
                    $groupProduct->is_avatar = !empty($groupProduct->library->link) ? 1 : 0;
                    $groupProduct->avatar = !empty($groupProduct->library->link) ? $groupProduct->library->link : '';

                    return [
                        'error' => 0,
                        'message' => '',
                        'groupProduct' => $groupProduct
                    ];
                }
                else {
                    return [
                        'error' => 1,
                        'message' => 'Nhóm sản phẩm không tồn tại'
                    ];
                }
            }
            else {
                return [
                    'error' => 1,
                    'message' => 'Truy vấn nhóm sản phẩm không có trường truy vấn'
                ];
            }
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Truy vấn đến nhóm sản phẩm thất bại'
            ];
        }
    }

    private function validate($request) : array
    {
        if (empty($request['name'])) {
            return [
                'error' => 1,
                'message' => 'Tên nhóm sản phẩm không được để trống'
            ];
        } elseif (strlen($request['name']) < 2 || strlen($request['name']) > 255) {
            return [
                'error' => 1,
                'message' => 'Tên nhóm sản phẩm không được nhỏ hơn 2 ký tự hoặc lớn hơn 255 ký tự'
            ];
        } elseif (empty($request['description'])) {
            return [
                'error' => 1,
                'message' => 'Mô tả sản phẩm không được để trống'
            ];
        } elseif (strlen($request['description']) < 2 || strlen($request['description']) > 255) {
            return [
                'error' => 1,
                'message' => 'Mô tả sản phẩm không được nhỏ hơn 2 ký tự hoặc lớn hơn 255 ký tự'
            ];
        }

        return [ 'error' => 0 ];
    }

    public function actionGroupProduct($request) : array
    {
        $action = !empty($request['action']) ? $request['action'] : '';
        switch ($action) {
            case 'create':
                return $this->createCategory($request);
            case 'edit':
                return $this->updateCategory($request);
            case 'delete':
                return $this->deleteCategory($request);
            default:
                return [
                    'error' => 1,
                    'message' => 'Hành động không có trong dữ liệu hệ thống'
                ];
        }
    }

    private function createCategory($request) : array
    {
        $validate = $this->validate($request);
        if ($validate['error']) {
            return $validate;
        }

        $data_create = [
            'name' => $request['name'],
            'description' => $request['description'],
            'library_id' => $request['library_id'],
        ];
        $this->groupProduct->create($data_create);

        // ghi log
        $data_log = [
            'user_id' => Auth::id(),
            'action' => 'tạo',
            'model' => 'Admin/GroupProduct',
            'admin' => ' nhóm sản phẩm ' . $request['name'],
        ];
        $this->logActivity->create($data_log);

        return [
            'error' => 0,
            'message' => 'Tạo nhóm sản phẩm thành công'
        ];
    }

    private function updateCategory($request) : array
    {
        try {
            if (!empty($request['id'])) {
                $groupProduct = $this->groupProduct->find($request['id']);
                if (!empty($groupProduct)) {
                    $validate = $this->validate($request);
                    if ($validate['error']) {
                        return $validate;
                    }

                    // ghi log
                    $data_log = [
                        'user_id' => Auth::id(),
                        'action' => 'chỉnh sửa',
                        'model' => 'Admin/GroupProduct',
                        'admin' => ' chuyên mục bài viết ' . $groupProduct->name,
                    ];
                    $this->logActivity->create($data_log);

                    $data_create = [
                        'name' => $request['name'],
                        'description' => $request['description'],
                        'library_id' => $request['library_id'],
                    ];
                    $groupProduct->update($data_create);

                    return [
                        'error' => 0,
                        'message' => 'Chỉnh sửa nhóm sản phẩm thành công'
                    ];
                }
                else {
                    return [
                        'error' => 1,
                        'message' => 'Nhóm sản phẩm không tồn tại'
                    ];
                }
            }
            else {
                return [
                    'error' => 1,
                    'message' => 'Truy vấn nhóm sản phẩm không có trường truy vấn'
                ];
            }
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Truy vấn đến nhóm sản phẩm'
            ];
        }

    }

    private function deleteCategory($request) : array
    {
        try {
            if (!empty($request['id'])) {
                $groupProduct = $this->groupProduct->find($request['id']);
                if (!empty($groupProduct)) {

                    // ghi log
                    $data_log = [
                        'user_id' => Auth::id(),
                        'action' => 'xóa',
                        'model' => 'Admin/GroupProduct',
                        'admin' => ' nhóm sản phẩm ' . $groupProduct->name,
                    ];
                    $this->logActivity->create($data_log);

                    $groupProduct->delete();

                    return [
                        'error' => 0,
                        'message' => 'Xóa nhóm sản phẩm thành công'
                    ];
                }
                else {
                    return [
                        'error' => 1,
                        'message' => 'Nhóm sản phẩm không tồn tại'
                    ];
                }
            }
            else {
                return [
                    'error' => 1,
                    'message' => 'Truy vấn nhóm sản phẩm không có trường truy vấn'
                ];
            }
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Truy vấn đến nhóm sản phẩm thất bại'
            ];
        }
    }
}

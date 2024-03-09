<?php
namespace App\Repositories\Admin;

use App\Models\Slider;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;
use App\Enums\SliderStatus;

Class SliderRepository
{
    protected $slider;
    protected $logActivity;

    public function __construct()
    {
        $this->slider = new Slider();
        $this->logActivity = new LogActivity();
    }
    
    /**
     * get Model
     */
    public function getModel(): string
    {
        return $this->slider;
    }

    /**
     * get all slider no condition
     */
    public function getAllSlider()
    {
        return $this->slider->all();
    }

    public function getSliderSearch($request, $isApi = false)
    {
        try {
            $q = !empty($request['q']) ? $request['q'] : '';
            $qtt = !empty($request['sl']) ? $request['sl'] : '';
            $pageNo = !empty($request['pn']) ? $request['pn'] : '';
            $data = ['error' => 0, 'data' => []];

            $listSlider = $this->slider->when($q, function ($query, $q) {
                $query->where('first_name', 'like', '%'. $q . '%')->where('email', 'like', '%'. $q . '%');
            })
                ->when($isApi, function ($query) {
                    $query->where('status', SliderStatus::Public_Type);
                })
                ->orderBy('sort_number', 'asc')
                ->paginate($qtt, ['*'], 'page', $pageNo);

            foreach ($listSlider as $slider) {
                $slider->is_avatar = !empty($slider->library->link) ? 1 : 0;
                $slider->avatar = !empty($slider->library->link) ? $slider->library->link : '';
                $slider->unsetRelation('library');
                $data['data'][] = $slider;
            }

            $data['total'] = $listSlider->total();
            $data['perPage'] = $listSlider->perPage();
            $data['current_page'] = $listSlider->currentPage();
            $data['firstItem'] = $listSlider->firstItem();
            $data['lastItem'] = $listSlider->lastItem();

            return $data;
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'data' => [],
                'message' => 'Truy vấn đến slider thất bại'
            ];
        }
    }

    public function sliderAction($request) : array
    {
        try {
            $action = !empty($request['action']) ? $request['action'] : '';
            switch ($action) {
                case 'create':
                    return $this->createSlider($request);
                case 'edit':
                    return $this->updateSlider($request);
                case 'delete':
                    return $this->deleteSlider($request);
                default:
                    return [
                        'error' => 1,
                        'message' => 'Hành động không có trong dữ liệu hệ thống'
                    ];
            }
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Đã có lỗi xãy ra trong hệ thống!'
            ];
        }
    }

    public function validate($request) : array
    {
        if (empty($request['name'])) {
            return [
                'error' => 1,
                'message' => 'Tên slider không được để trống'
            ];
        } elseif (strlen($request['name']) < 2 || strlen($request['name']) > 255) {
            return [
                'error' => 1,
                'message' => 'Tên slider không được nhỏ hơn 2 ký tự hoặc lớn hơn 255 ký tự'
            ];
        } elseif (empty($request['description'])) {
            return [
                'error' => 1,
                'message' => 'Mô tả slider không được để trống'
            ];
        } elseif (strlen($request['url']) > 255) {
            return [
                'error' => 1,
                'message' => 'Url không được lớn hơn 255 ký tự'
            ];
        }

        return [ 'error' => 0 ];
    }

    public function createSlider($request) : array
    {
        $validate = $this->validate($request);
        if ($validate['error']) {
            return $validate;
        }

        $this->slider->create($request);

        // ghi log
        $data_log = [
            'user_id' => Auth::id(),
            'action' => 'tạo',
            'model' => 'Admin/Slider',
            'admin' => ' slider ' . $request['name'],
        ];
        $this->logActivity->create($data_log);

        return [
            'error' => 0,
            'message' => 'Tạo slider thành công'
        ];
    }

    public function updateSlider($request) : array
    {
        if (!empty($request['id'])) {
            $slider = $this->slider->find($request['id']);
            if (!empty($slider)) {
                $validate = $this->validate($request);
                if ($validate['error']) {
                    return $validate;
                }

                // ghi log
                $data_log = [
                    'user_id' => Auth::id(),
                    'action' => 'chỉnh sửa',
                    'model' => 'Admin/Slider',
                    'admin' => ' chuyên mục bài viết ' . $slider->name,
                ];
                $this->logActivity->create($data_log);

                $slider->update($request);

                return [
                    'error' => 0,
                    'message' => 'Chỉnh sửa slider thành công'
                ];
            }
            else {
                return [
                    'error' => 1,
                    'message' => 'Slider không tồn tại'
                ];
            }
        }
        else {
            return [
                'error' => 1,
                'message' => 'Truy vấn slider không có trường truy vấn'
            ];
        }
    }

    public function deleteSlider($request) : array
    {
        if (!empty($request['id'])) {
            $slider = $this->slider->find($request['id']);
            if (!empty($slider)) {

                // ghi log
                $data_log = [
                    'user_id' => Auth::id(),
                    'action' => 'xóa',
                    'model' => 'Admin/Slider',
                    'admin' => ' slider ' . $slider->name,
                ];
                $this->logActivity->create($data_log);

                $slider->delete();

                return [
                    'error' => 0,
                    'message' => 'Xóa slider thành công'
                ];
            }
            else {
                return [
                    'error' => 1,
                    'message' => 'Slider không tồn tại'
                ];
            }
        }
        else {
            return [
                'error' => 1,
                'message' => 'Truy vấn slider không có trường truy vấn'
            ];
        }
    }

    public function getDetailSlider($request)
    {
        try {
            if (!empty($request['id'])) {
                $slider = $this->slider->find($request['id']);
                if (!empty($slider)) {
                    $slider->is_avatar = !empty($slider->library->link) ? 1 : 0;
                    $slider->avatar = !empty($slider->library->link) ? $slider->library->link : '';

                    return [
                        'error' => 0,
                        'message' => '',
                        'slider' => $slider
                    ];
                }
                else {
                    return [
                        'error' => 1,
                        'message' => 'Slider không tồn tại'
                    ];
                }
            }
            else {
                return [
                    'error' => 1,
                    'message' => 'Truy vấn slider không có trường truy vấn'
                ];
            }
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Truy vấn đến slider thất bại'
            ];
        }
    }

    public function updateSliderByCondition($request) : array
    {
        if (!empty($request['id'])) {
            $slider = $this->slider->find($request['id']);
            if (!empty($slider)) {
                // ghi log
                $data_log = [
                    'user_id' => Auth::id(),
                    'action' => 'chỉnh sửa',
                    'model' => 'Admin/Slider',
                    'admin' => ' chuyên mục bài viết ' . $slider->name,
                ];
                $this->logActivity->create($data_log);

                $slider->update($request);

                return [
                    'error' => 0,
                    'message' => 'Lưu thành công.'
                ];
            }
            else {
                return [
                    'error' => 1,
                    'message' => 'Lưu thất bại!'
                ];
            }
        }
        else {
            return [
                'error' => 1,
                'message' => 'Truy vấn slider không có trường truy vấn'
            ];
        }
    }

    public function getDataPreviewSlider()
    {
        return $this->slider->with('library')
            ->where('is_preview', 1)
            ->whereNotNull('library_id')
            ->get();
    }
}

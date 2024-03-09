<?php
namespace App\Repositories\Admin;

use App\Models\Category;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use App\Enums\CategoryStatus;

Class CategoryRepository
{
    protected $category;
    protected $log_activity;

    public function __construct()
    {
        $this->category = new Category();
        $this->log_activity = new LogActivity();
    }

    public function listCategory($request) : array
    {
        try {
            $qtt = !empty($request['qtt']) ? $request['qtt'] : 20;
            $q = !empty($request['q']) ? $request['q'] : '';
            $data = ['data' => []];

            $listCategory = $this->category->when($q, function ($query, $q)
            {
                $query->where('name', 'like', '%'. $q . '%');
            })->orderBy('id', 'desc')->paginate($qtt);

            foreach ($listCategory as $category)
            {
                $category->is_avatar = !empty($category->library->link) ? 1 : 0;
                $category->avatar = !empty($category->library->link) ? asset($category->library->link) : '';
                $category->count_products = !empty($category->products) ? $category->products->count() : 0;

                $data['data'][] = $category;
            }

            //dd($category->count_products);
            $data['total'] = $listCategory->total();
            $data['perPage'] = $listCategory->perPage();
            $data['current_page'] = $listCategory->currentPage();
            $data['firstItem'] = $listCategory->firstItem();
            $data['lastItem'] = $listCategory->lastItem();

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
        try {
            $data = $request->all();
            $data['status'] = $request->status == 'on' ? CategoryStatus::Public_Type->value : CategoryStatus::Private_Type->value;

            $this->category->create($data);
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function update($request, $category)
    {
        try {
            $data = $request->all();
            $data['status'] = $request->status == 'on' ? CategoryStatus::Public_Type->value : CategoryStatus::Private_Type->value;

            $category->update($data);
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function delete($id)
    {
        try {
            Category::destroy($id);
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function getParentCategory()
    {
        return $this->category->whereNull('parent_id')->get();
    }

    public function findCategoryById($id) {
        try {
            return $this->category->find($id);
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function updateByCondition($request)
    {
        try {
            $this->findCategoryById($request->id)->update($request->all());

            return [
                'error' => 0,
                'message' => 'Lưu thành công!'
            ];
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Lưu liệu thất bại!'
            ];
        }
    }
}

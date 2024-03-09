<?php

namespace App\Http\Controllers\admin;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    protected $home;
    protected $category;

    public function __construct()
    {
        $this->home = AdminFactory::homeRepository();
        $this->category = AdminFactory::categoryRepository();
    }

    public function index()
    {
        return view('admins.categories.index');
    }

    public function listCategory(Request $request)
    {
        return response()->json($this->category->listCategory($request->all()));
    }

    public function create()
    {
        return view('admins.categories.create', [
            'categories'=> $this->category->getParentCategory()->pluck('name', 'id')->toArray(),
        ]);
    }

    public function store(StoreCategoryRequest $request)
    {
        if($this->category->store($request))
        {
            return redirect()->route('admin.category')->with('success', 'Thêm ngành hàng thành công');
        }else{
            return redirect()->route('admin.category')->with('error', 'Có lỗi xảy ra trong quá trình thêm mới ngành hàng');
        }
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        $categories = $this->category->getParentCategory()->pluck('name', 'id')->toArray();

        return view('admins.categories.update', compact('category', 'categories'));
    }

    public function update(UpdateCategoryRequest $request, $id){
        $category = Category::findOrFail($id);
        
        if($this->category->update($request, $category))
        {
            return redirect()->route('admin.category')->with('success', 'Cập nhật ngành hàng thành công');
        }else{
            return redirect()->route('admin.category')->with('error', 'Có lỗi xảy ra trong quá trình cập nhật ngành hàng');
        }
    }

    public function delete($id){
        if($this->category->delete($id))
        {
            return redirect()->route('admin.category')->with('success', 'Xóa ngành hàng thành công');
        }else{
            return redirect()->route('admin.category')->with('error', 'Có lỗi xảy ra trong quá trình xoá ngành hàng');
        }
    }

    public function search(Request $request){
        return response()->json($this->category->listCategory($request->all()));
    }

    public function inforOfCategory(Request $request, $id){
        try {
            $category = Category::findOrFail($id);

            return view('admins.categories.inforOfCategory', compact('category'));
        } catch (\Exception $e) {
            report($e);

            return redirect()->route('admin.category')->with('error', 'Không tìm thấy ngành hàng!');
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            if (!$this->category->findCategoryById($request->id)) {

                return response()->json([
                    'error' => 1,
                    'message' => 'Không tìm thấy dữ liệu!'
                ], 400);
            }

            return response()->json($this->category->updateByCondition($request));
        } catch (\Exception $e) {

            return response()->json([
                'error' => 1,
                'message' => 'Lưu thất bại!'
            ], 400);
        }
    }
}

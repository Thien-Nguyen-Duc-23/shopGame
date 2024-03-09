<?php

namespace App\Http\Controllers\Admin;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $home;
    protected $product;
    protected $categories;

    public function __construct()
    {
        $this->home = AdminFactory::homeRepository();
        $this->product = AdminFactory::productRepository();
    }

    public function index()
    {
        return view('admins.products.index');
    }

    public function listProduct(Request $request)
    {
        return response()->json($this->product->listProduct($request->all()));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admins.products.create', compact('categories'));
    }
    public function store(Request $request)
    {
        if($this->product->store($request))
        {
            return redirect()->route('admin.product')->with('success', 'Thêm thành công');
        }else{
            return redirect()->route('admin.product')->with('error', 'Thêm thất bại');
        }
    }

    public function edit($id){
        $categories = Category::all();
        $product = Product::findOrFail($id);

        return view('admins.products.update', compact('product', 'categories'));
    }

    public function update(Request $request, $id){
        $product = Product::findOrFail($id);

        //dd($category);

        if($this->product->update($request, $product))
        {
            return redirect()->route('admin.product')->with('success', 'Cập nhật thành công');
        }else{
            return redirect()->route('admin.product')->with('error', 'Cập nhật thất bại');
        }
    }

    public function delete($id){
        if($this->product->delete($id))
        {
            return redirect()->route('admin.product')->with('success', 'Xóa thành công');
        }else{
            return redirect()->route('admin.product')->with('error', 'Xóa thất bại');
        }
    }

    public function getProductById($id)
    {
        try {
            return response()->json($this->product->getProductById($id));
        } catch (\Exception $e) {
            return response()->json([
                'error' => 1,
                'message' => 'Lỗi truy vấn đến máy chủ!'
            ], 400);
        }
    }
    
    public function changeStatusProduct(Request $request){
        return response()->json($this->product->changeStatusProduct($request->all()));
    }

    public function search(Request $request){
        return response()->json($this->product->listProduct($request->all()));
    }

    public function inforOfProduct(Request $request, $id){
        try {
            $product = Product::findOrFail($id);

            return view('admins.products.inforOfProduct', compact('product'));
        } catch (\Exception $e) {
            report($e);

            return redirect()->route('admin.products')->with('error', 'Không tìm thấy sản phẩm!');
        }
    }
}

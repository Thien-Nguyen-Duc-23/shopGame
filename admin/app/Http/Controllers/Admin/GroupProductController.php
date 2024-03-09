<?php

namespace App\Http\Controllers\admin;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class GroupProductController extends Controller
{
    protected $groupProduct;
    public function __construct()
    {
        $this->groupProduct = AdminFactory::groupProductRepository();
    }

    public function index()
    {
        return view('admins.group_product.index');
    }

    public function getGroupProductSearch(Request $request)
    {
        return response()->json($this->groupProduct->getGroupProductSearch($request->all()));
    }

    public function getDetailGroupProduct(Request $request)
    {
        return response()->json($this->groupProduct->getDetailGroupProduct($request->all()));
    }

    public function actionGroupProduct(Request $request)
    {
        return response()->json($this->groupProduct->actionGroupProduct($request->all()));
    }
}

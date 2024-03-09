<?php

namespace App\Http\Controllers\Api;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct()
    {
        $this->categoryRepository = AdminFactory::categoryClientRepository();
    }

    public function index(Request $request)
    {
        return response()->json($this->categoryRepository->getListCategory($request->all()));
    }

    public function detail(Request $request, $id)
    {
        return response()->json($this->categoryRepository->getDetailCategory($request));
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    protected $blogCategoryRepository;
    public function __construct()
    {
        $this->blogCategoryRepository = AdminFactory::blogCategoryRepository();
    }

    public function index(Request $request)
    {
        return response()->json($this->blogCategoryRepository->getListBlogCategory($request->all()));
    }

    public function detail(Request $request, $id)
    {
        return response()->json($this->blogCategoryRepository->getDetailBlogCategory($request));
    }
}

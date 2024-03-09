<?php

namespace App\Http\Controllers\Admin;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $post;
    protected $config_system;

    public function __construct()
    {
        $this->post = AdminFactory::postRepository();
        $this->config_system = AdminFactory::configSystemRepository();
    }

    public function categoryPost()
    {
        return view('admins.posts.category.index');
    }

    public function getCategoryPost(Request $request)
    {
        return response()->json($this->post->getGroupPost($request->all()));
    }

    public function actionCategoryPost(Request $request)
    {
        return response()->json($this->post->actionCategoryPost($request->all()));
    }

    public function getDetailGroupPost(Request $request)
    {
        return response()->json($this->post->getDetailGroupPost($request->all()));
    }

    public function tabPost()
    {
        return view('admins.posts.tabs.index');
    }

    public function getTabPost()
    {
        return response()->json($this->post->getTabPost());
    }

    public function actionTabPost(Request $request)
    {
        return response()->json($this->post->actionTabPost($request->all()));
    }

    public function getDetailTabPost(Request $request)
    {
        return response()->json($this->post->getDetailTabPost($request->all()));
    }

    public function viewPost(Request $request)
    {
        return view('admins.posts.index');
    }

    public function createPost()
    {
        $listCategory = $this->post->getCategoryPost();
        $listTab = $this->post->getBlogTab();
        return view('admins.posts.create_post', compact('listCategory', 'listTab'));
    }

    public function editPost($post_id)
    {
        $post = $this->post->getDetailPost($post_id);
        if (!empty($post)) {
            $listCategory = $this->post->getCategoryPost();
            $listTab = $this->post->getBlogTab();
            $listPostTab = $this->post->getPostTab($post_id);
            $configSystem = $this->config_system->systemConfig();
            return view('admins.posts.edit_post', compact('listCategory', 'listTab', 'listPostTab', 'post', 'configSystem'));
        }
        else {
            return redirect()->back()->with('fails', 'Bài viết không tồn tại');
        }
    }

    public function getPost(Request $request)
    {
        return response()->json($this->post->getPost($request->all()));
    }

    public function storagePost(Request $request)
    {
        $storage = $this->post->storagePost($request->all());
        if ($storage) {
            return redirect()->route('admin.viewPost')->with('success', 'Tạo bài viết thành công');
        }
        else {
            return redirect()->back()->with('fails', 'Tạo bài viết thất bại');
        }
    }

    public function updatePost(Request $request)
    {
        $storage = $this->post->updatePost($request->all());
        if ($storage) {
            return redirect()->route('admin.viewPost')->with('success', 'Chỉnh sửa bài viết thành công');
        }
        else {
            return redirect()->back()->with('fails', 'Chỉnh sửa bài viết thất bại');
        }
    }

    public function actionPost(Request $request)
    {
        return response()->json($this->post->actionPost($request->all()));
    }

}

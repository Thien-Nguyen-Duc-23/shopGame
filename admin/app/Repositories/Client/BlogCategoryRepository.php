<?php
namespace App\Repositories\Client;

use App\Models\BlogCategory;
use App\Models\LogActivity;
use App\Enums\BlogCategoryStatus;
use App\Models\BlogPost;

Class BlogCategoryRepository
{
    protected $blogCategory;
    protected $logActivity;
    protected $blogPost;


    public function __construct()
    {
        $this->blogCategory = new BlogCategory();
        $this->logActivity = new LogActivity();
        $this->blogPost = new BlogPost();
    }
    
    /**
     * get Model
     */
    public function getModel(): string
    {
        return $this->blogCategory;
    }

    public function getListBlogCategory($request)
    {
        try {
            $pageSize = !empty($request['page_size']) ? $request['page_size'] : '';
            $data = ['error' => 0, 'data' => []];

            $blogCategories = $this->blogCategory
                ->where('hidden', BlogCategoryStatus::Public_Type->value)
                ->when(isset($request['keywords']), function ($query) use ($request) {
                    $query->where('name', 'like', '%'. $request['keywords'] . '%');
                })
                ->orderBy('stt', 'asc')
                ->paginate($pageSize);
            
            $dataBlogCategory = [];
            foreach ($blogCategories as $blogCategory) {
                array_push($dataBlogCategory, [
                    'id' => $blogCategory->id,
                    'name' => $blogCategory->name,
                    'description' => $blogCategory->description,
                    'avatar' => !empty($blogCategory->library->link) ? $blogCategory->library->link : null,
                    'quantity_blog_post' => !empty($blogCategory->blog_posts) ? $blogCategory->blog_posts->count() : null,
                    'created_at' => $blogCategory->created_at
                ]);
            }

            $data['data'] = $dataBlogCategory;
            $data['total'] = $blogCategories->total();
            $data['per_page'] = $blogCategories->perPage();
            $data['current_page'] = $blogCategories->currentPage();
            $data['first_item'] = $blogCategories->firstItem();
            $data['last_item'] = $blogCategories->lastItem();

            return $data;
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'data' => [],
                'message' => 'Truy vấn đến chuyên mục bài viết thất bại!'
            ];
        }
    }

    public function getDetailBlogCategory($request)
    {
        try {
            $pageSize = !empty($request['page_size']) ? $request['page_size'] : '';

            // get infor blog category
            $blogCategory = $this->blogCategory
                ->where('id', $request->id)
                ->where('hidden', BlogCategoryStatus::Public_Type->value)
                ->first();

            if (!$blogCategory) {
                return [
                    'error' => 1,
                    'data' => [],
                    'message' => 'Không tìm thấy thể loại!'
                ];
            }

            // get blog post
            $blogPosts = $this->blogPost->where ('blog_category_id', $blogCategory->id)
                ->where('hidden', BlogCategoryStatus::Public_Type->value)
                ->when(isset($request['keywords']), function ($query) use ($request) {
                    $query->where('name', 'like', '%'. $request['keywords'] . '%');
                })
                ->orderBy('stt', 'asc')
                ->paginate($pageSize);
        
            $dataBlogPost = [];
            // set data in blog post
            if ($blogPosts->isNotEmpty()) {
                foreach ($blogPosts as $blogPost) {
                    array_push($dataBlogPost, [
                        'title' => $blogPost->title,
                        'avatar' => !empty($blogPost->library->link) ? $blogPost->library->link : null,
                        'content' => $blogPost->content,
                        'author' => !empty($blogPost->author) ? $blogPost->author->full_name : null,
                        'created_at' => $blogPost->created_at
                    ]);
                }
            }

            return [
                'error' => 0,
                'data' => [
                    'id' => $blogCategory->id,
                    'name' => $blogCategory->name,
                    'description' => $blogCategory->description,
                    'avatar' => !empty($blogCategory->library->link) ? $blogCategory->library->link : null,
                    'quantity_blog_post' => !empty($blogCategory->blog_posts) ? $blogCategory->blog_posts->count() : null,
                    'created_at' => $blogCategory->created_at,
                    'blog_posts' => $dataBlogPost
                ],
                'total' => $blogPosts->total(),
                'per_page' => $blogPosts->perPage(),
                'current_page' => $blogPosts->currentPage(),
                'first_item' => $blogPosts->firstItem(),
                'last_item' => $blogPosts->lastItem(),
                'message' => null
            ];
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'data' => [],
                'message' => 'Truy vấn đến thể loại thất bại!'
            ];
        }
    }
}

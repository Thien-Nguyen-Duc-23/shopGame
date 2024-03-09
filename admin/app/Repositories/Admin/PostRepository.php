<?php

namespace App\Repositories\Admin;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogPostTab;
use App\Models\BlogTab;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostRepository
{
    protected $category;
    protected $post;
    protected $log_activity;
    protected $tab;
    protected $post_tab;

    public function __construct()
    {
        $this->post = new BlogPost();
        $this->log_activity = new LogActivity();
        $this->category = new BlogCategory();
        $this->tab = new BlogTab();
        $this->post_tab = new BlogPostTab();
    }

    public function getCategoryPost()
    {
        return $this->category->orderBy('stt', 'asc')->get();
    }

    public function getBlogTab()
    {
        return $this->tab->orderBy('id', 'desc')->get();
    }

    public function getGroupPost($request)
    {
        try {
            $q = !empty($request['q']) ? $request['q'] : '';
            $qtt = !empty($request['sl']) ? $request['sl'] : '';
            $data = ['error' => 0, 'data' => []];

            $listCategory = $this->category->when($q, function ($query, $q)
            {
                $query->where('first_name', 'like', '%'. $q . '%')->where('email', 'like', '%'. $q . '%');
            })
                ->orderBy('stt', 'asc')->paginate($qtt);

            foreach ($listCategory as $category)
            {
                $category->is_avatar = !empty($category->library->link) ? 1 : 0;
                $category->avatar = !empty($category->library->link) ? $category->library->link : '';
                $category->qtt_post = !empty($category->blog_posts->count()) ? $category->blog_posts->count() : 0;

                $data['data'][] = $category;
            }
            $data['total'] = $listCategory->total();
            $data['perPage'] = $listCategory->perPage();
            $data['current_page'] = $listCategory->currentPage();
            $data['firstItem'] = $listCategory->firstItem();
            $data['lastItem'] = $listCategory->lastItem();

            return $data;
        }
        catch (\Exception $e)
        {
            report($e);
            return [
                'error' => 1,
                'message' => 'Truy vấn đến chuyên mục thất bại'
            ];
        }
    }

    public function actionCategoryPost($request) : array
    {
        $action = !empty($request['action']) ? $request['action'] : '';
        switch ($action) {
            case 'create':
                return $this->createCategory($request);
            case 'edit':
                return $this->updateCategory($request);
            case 'delete':
                return $this->deleteCategory($request);
            case 'change-status':
                return $this->changeStatusCategory($request);
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
            'name' => $request['title'],
            'description' => $request['description'],
            'stt' => !empty($request['stt']) ? $request['stt'] : 20,
            'status' => !empty($request['status']) ? 0 : 1,
            'library_id' => $request['avatar'],
        ];
        $this->category->create($data_create);

        // ghi log
        $data_log = [
            'user_id' => Auth::id(),
            'action' => 'tạo',
            'model' => 'Admin/Post',
            'admin' => ' chuyên mục bài viết ' . $request['title'],
        ];
        $this->log_activity->create($data_log);

        return [
            'error' => 0,
            'message' => 'Tạo chuyên mục bài viết thành công'
        ];
    }

    private function updateCategory($request) : array
    {

        try {
            if (!empty($request['id'])) {
                $category = $this->category->find($request['id']);
                if (!empty($category)) {
                    $validate = $this->validate($request);
                    if ($validate['error']) {
                        return $validate;
                    }

                    // ghi log
                    $data_log = [
                        'user_id' => Auth::id(),
                        'action' => 'chỉnh sửa',
                        'model' => 'Admin/Post',
                        'admin' => ' chuyên mục bài viết ' . $category->name,
                    ];
                    $this->log_activity->create($data_log);

                    $data_create = [
                        'name' => $request['title'],
                        'description' => $request['description'],
                        'stt' => !empty($request['stt']) ? $request['stt'] : 20,
                        'status' => !empty($request['status']) ? 0 : 1,
                        'library_id' => $request['avatar'],
                    ];
                    $category->update($data_create);

                    return [
                        'error' => 0,
                        'message' => 'Chỉnh sửa chuyên mục bài viết thành công'
                    ];
                }
                else {
                    return [
                        'error' => 1,
                        'message' => 'Chuyên mục bài viết không tồn tại'
                    ];
                }
            }
            else {
                return [
                    'error' => 1,
                    'message' => 'Truy vấn chuyên mục không có trường truy vấn'
                ];
            }
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Truy vấn đến chuyên mục thất bại'
            ];
        }

    }

    private function deleteCategory($request) : array
    {

        try {
            if (!empty($request['id'])) {
                $category = $this->category->find($request['id']);
                if (!empty($category)) {

                    // ghi log
                    $data_log = [
                        'user_id' => Auth::id(),
                        'action' => 'xóa',
                        'model' => 'Admin/Post',
                        'admin' => ' chuyên mục bài viết ' . $category->name,
                    ];
                    $this->log_activity->create($data_log);

                    $category->delete();

                    return [
                        'error' => 0,
                        'message' => 'Xóa chuyên mục bài viết thành công'
                    ];
                }
                else {
                    return [
                        'error' => 1,
                        'message' => 'Chuyên mục bài viết không tồn tại'
                    ];
                }
            }
            else {
                return [
                    'error' => 1,
                    'message' => 'Truy vấn chuyên mục không có trường truy vấn'
                ];
            }
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Truy vấn đến chuyên mục thất bại'
            ];
        }

    }

    private function changeStatusCategory($request) : array
    {

        try {
            if (!empty($request['id'])) {
                $category = $this->category->find($request['id']);
                if (!empty($category)) {
                    if ($request['type']) {
                        // ghi log
                        $data_log = [
                            'user_id' => Auth::id(),
                            'action' => 'bật',
                            'model' => 'Admin/Post',
                            'admin' => ' chuyên mục bài viết ' . $category->name,
                        ];
                        $this->log_activity->create($data_log);

                        $category->hidden = 0;
                        $category->save();

                        return [
                            'error' => 0,
                            'message' => 'Bật chuyên mục bài viết thành công'
                        ];
                    }
                    else {
                        // ghi log
                        $data_log = [
                            'user_id' => Auth::id(),
                            'action' => 'ẩn',
                            'model' => 'Admin/Post',
                            'admin' => ' chuyên mục bài viết ' . $category->name,
                        ];
                        $this->log_activity->create($data_log);

                        $category->hidden = 1;
                        $category->save();

                        return [
                            'error' => 0,
                            'message' => 'Ẩn chuyên mục bài viết thành công'
                        ];
                    }
                }
                else {
                    return [
                        'error' => 1,
                        'message' => 'Chuyên mục bài viết không tồn tại'
                    ];
                }
            }
            else {
                return [
                    'error' => 1,
                    'message' => 'Truy vấn chuyên mục không có trường truy vấn'
                ];
            }
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Truy vấn đến chuyên mục thất bại'
            ];
        }

    }

    private function validate($request) : array
    {
        if (empty($request['title'])) {
            return [
                'error' => 1,
                'message' => 'Tiêu đề chuyên mục không được để trống'
            ];
        }
        elseif (strlen($request['title']) < 2 || strlen($request['title']) > 255)
        {
            return [
                'error' => 1,
                'message' => 'Tiêu đề chuyên mục không được nhỏ hơn 2 ký tự hoặc lớn hơn 255 ký tự'
            ];
        }

        return [ 'error' => 0 ];
    }

    public function getDetailGroupPost($request)
    {
        try {
            if (!empty($request['id'])) {
                $category = $this->category->find($request['id']);
                if (!empty($category)) {
                    $category->is_avatar = !empty($category->library->link) ? 1 : 0;
                    $category->avatar = !empty($category->library->link) ? $category->library->link : '';

                    return [
                        'error' => 0,
                        'message' => '',
                        'category' => $category
                    ];
                }
                else {
                    return [
                        'error' => 1,
                        'message' => 'Chuyên mục bài viết không tồn tại'
                    ];
                }
            }
            else {
                return [
                    'error' => 1,
                    'message' => 'Truy vấn chuyên mục không có trường truy vấn'
                ];
            }
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Truy vấn đến chuyên mục thất bại'
            ];
        }
    }

    public function actionTabPost($requesst) : array
    {
        $action = !empty($requesst['action']) ? $requesst['action'] : '';
        switch ($action) {
            case 'create':
                return $this->createTab($requesst);
            case 'edit':
                return $this->updateTab($requesst);
            case 'delete':
                return $this->deleteTab($requesst);
            default:
                return [
                    'error' => 1,
                    'message' => 'Hành động không có trong dữ liệu hệ thống'
                ];
        }
    }

    private function createTab($request)
    {
        $validate = $this->validateTab($request);
        if ($validate['error']) {
            return $validate;
        }
        $data_create = [
            'name' => $request['name'],
            'description' => $request['description'],
        ];
        $this->tab->create($data_create);

        // ghi log
        $data_log = [
            'user_id' => Auth::id(),
            'action' => 'tạo',
            'model' => 'Admin/Post',
            'admin' => ' nhãn bài viết ' . $request['name'],
        ];
        $this->log_activity->create($data_log);

        return [
            'error' => 0,
            'message' => 'Tạo chuyên mục bài viết thành công'
        ];
    }

    private function updateTab($request) : array
    {

        try {
            if (!empty($request['id'])) {
                $tab = $this->tab->find($request['id']);
                if (!empty($tab)) {
                    $validate = $this->validateTab($request);
                    if ($validate['error']) {
                        return $validate;
                    }

                    // ghi log
                    $data_log = [
                        'user_id' => Auth::id(),
                        'action' => 'chỉnh sửa',
                        'model' => 'Admin/Post',
                        'admin' => ' nhãn bài viết ' . $tab->name,
                    ];
                    $this->log_activity->create($data_log);

                    $data_create = [
                        'name' => $request['name'],
                        'description' => $request['description']
                    ];
                    $tab->update($data_create);

                    return [
                        'error' => 0,
                        'message' => 'Chỉnh sửa nhãn bài viết thành công'
                    ];
                }
                else {
                    return [
                        'error' => 1,
                        'message' => 'Nhãn bài viết không tồn tại'
                    ];
                }
            }
            else {
                return [
                    'error' => 1,
                    'message' => 'Truy vấn nhãn không có trường truy vấn'
                ];
            }
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Truy vấn đến chuyên mục thất bại'
            ];
        }

    }

    private function deleteTab($request) : array
    {

        try {
            if (!empty($request['id'])) {
                $tab = $this->tab->find($request['id']);
                if (!empty($tab)) {

                    // ghi log
                    $data_log = [
                        'user_id' => Auth::id(),
                        'action' => 'xóa',
                        'model' => 'Admin/Post',
                        'admin' => ' nhãn bài viết ' . $tab->name,
                    ];
                    $this->log_activity->create($data_log);

                    $tab->delete();

                    return [
                        'error' => 0,
                        'message' => 'Xóa nhãn bài viết thành công'
                    ];
                }
                else {
                    return [
                        'error' => 1,
                        'message' => 'Nhãn bài viết không tồn tại'
                    ];
                }
            }
            else {
                return [
                    'error' => 1,
                    'message' => 'Truy vấn nhãn không có trường truy vấn'
                ];
            }
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Truy vấn đến chuyên mục thất bại'
            ];
        }

    }

    private function validateTab($request) : array
    {
        if (empty($request['name'])) {
            return [
                'error' => 1,
                'message' => 'Tên không được để trống'
            ];
        }
        elseif (strlen($request['name']) < 2 || strlen($request['name']) > 255)
        {
            return [
                'error' => 1,
                'message' => 'Tên không được nhỏ hơn 2 ký tự hoặc lớn hơn 255 ký tự'
            ];
        }

        return [ 'error' => 0 ];
    }

    public function getTabPost() : array
    {
        return [
            'error' => 0,
            'data' => $this->tab->orderBy('id', 'desc')->get(),
        ];
    }

    public function getDetailTabPost($request) : array
    {
        try {
            if (!empty($request['id'])) {
                $tab = $this->tab->find($request['id']);
                if (!empty($tab)) {
                    return [
                        'error' => 0,
                        'message' => '',
                        'tab' => $tab
                    ];
                }
                else {
                    return [
                        'error' => 1,
                        'message' => 'Nhãn bài viết không tồn tại'
                    ];
                }
            }
            else {
                return [
                    'error' => 1,
                    'message' => 'Truy vấn nhãn không có trường truy vấn'
                ];
            }
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Truy vấn đến nhãn thất bại'
            ];
        }
    }

    public function storagePost($request) : bool
    {
        try {
            $data_post = [
                'title' => !empty($request['title']) ? $request['title'] : '',
                'content' => !empty($request['content']) ? $request['content'] : '',
                'hidden' => !empty($request['hidden']) ? 0 : 1,
                'blog_category_id' => !empty($request['category_id']) ? $request['category_id'] : null,
                'library_id' => !empty($request['post-avatar']) ? $request['post-avatar'] : null,
                'stt' => !empty($request['stt']) ? $request['stt'] : 20,
                'author_id' => Auth::id(),
            ];
            $post = $this->post->create($data_post);

            if (!empty($request['tabs'])) {
                foreach ($request['tabs'] as $tab)
                {
                    $data_post_tab = [
                        'blog_post_id' => $post->id,
                        'blog_tab_id' => $tab
                    ];
                    $this->post_tab->create($data_post_tab);
                }
            }

            // ghi log
            $data_log = [
                'user_id' => Auth::id(),
                'action' => 'tạo',
                'model' => 'Admin/Post',
                'admin' => ' bài viết ' . !empty($request['title']) ? $request['title'] : '(Không có tiêu đề)',
            ];
            $this->log_activity->create($data_log);

            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function updatePost($request) : bool
    {
        try {
            $post = $this->post->find($request['post_id']);
            if (!empty($post)) {
                // ghi log
                $data_log = [
                    'user_id' => Auth::id(),
                    'action' => 'chỉnh sửa',
                    'model' => 'Admin/Post',
                    'admin' => ' bài viết ' . !empty($post->title) ? $post->title : '(Không có tiêu đề)',
                ];
                $this->log_activity->create($data_log);

                $data_post = [
                    'title' => !empty($request['title']) ? $request['title'] : '',
                    'content' => !empty($request['content']) ? $request['content'] : '',
                    'hidden' => !empty($request['hidden']) ? 0 : 1,
                    'blog_category_id' => !empty($request['category_id']) ? $request['category_id'] : null,
                    'library_id' => !empty($request['post-avatar']) ? $request['post-avatar'] : null,
                    'stt' => !empty($request['stt']) ? $request['stt'] : 20,
                ];
                $post->update($data_post);

                if (!empty($request['tabs'])) {
                    $this->post_tab->where('blog_post_id', $post->id)->delete();
                    foreach ($request['tabs'] as $tab)
                    {
                        $data_post_tab = [
                            'blog_post_id' => $post->id,
                            'blog_tab_id' => $tab
                        ];
                        $this->post_tab->create($data_post_tab);
                    }
                }
            }
            else {
                return false;
            }

            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function getPost($request) : array
    {
        try {
            $q = !empty($request['q']) ? $request['q'] : '';
            $qtt = !empty($request['sl']) ? $request['sl'] : '';
            $category_id = !empty($request['category_id']) ? $request['category_id'] : '';
            $data = ['error' => 0, 'data' => []];

            $listPost = $this->post
                ->when($q, function ($query, $q)
                {
                    $query->where('first_name', 'like', '%'. $q . '%')->where('email', 'like', '%'. $q . '%');
                })
                ->when($category_id, function ($query, $category_id)
                {
                    $query->where('blog_category_id', $category_id);
                })
                ->orderBy('id', 'desc')->paginate($qtt);

            foreach ($listPost as $post)
            {
                $post->is_avatar = !empty($post->library->link) ? 1 : 0;
                $post->avatar = !empty($post->library->link) ? $post->library->link : '';
                $text_category = '';
                if (!empty($post->blog_category_id)) {
                    if (!empty($post->blog_category)) {
                        $text_category = '<a href="#">'. $post->blog_category->name .'</a>';
                    }
                    else {
                        $text_category = '<span class="text-danger">Đã xóa</span>';
                    }
                }
                $post->category_name = $text_category;
                if (!empty($post->author)) {
                    // '. route('', $post->author->id) .'
                    $text_author = '<a href="#">'. $post->author->getFullNameAttribute() .'</a>';
                }
                else {
                    $text_author = '<span class="text-danger">Đã xóa</span>';
                }
                $post->text_author = $text_author;
                $post->text_time = date('H:i:s d-m-Y', strtotime($post->updated_at));

                $data['data'][] = $post;
            }
            $data['total'] = $listPost->total();
            $data['perPage'] = $listPost->perPage();
            $data['current_page'] = $listPost->currentPage();
            $data['firstItem'] = $listPost->firstItem();
            $data['lastItem'] = $listPost->lastItem();

            return $data;
        }
        catch (\Exception $e)
        {
            report($e);
            return [
                'error' => 1,
                'message' => 'Truy vấn đến chuyên mục thất bại'
            ];
        }
    }

    public function getDetailPost($postId)
    {
        $post = $this->post->find($postId);
        if ( !empty($post) ) {
            $post->slug = $post->title;
            $unicode = array(
                'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
                'd'=>'đ|Đ',
                'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
                'i'=>'í|ì|ỉ|ĩ|ị|I|Ì|Í|Ị|Ỉ|Ĩ',
                'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ọ|Ó|Ò|Ỏ|Õ|Ô|Ồ|Ố|Ổ|Ỗ|Ộ|Ơ|Ờ|Ớ|Ở|Ỡ|Ợ',
                'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ụ|Ũ|Ư|Ừ|Ứ|Ử|Ữ|Ự',
                'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
            );
            foreach($unicode as $nonUnicode => $uni){
                $post->slug = preg_replace( "/($uni)/i" , $nonUnicode , $post->slug);
            }
            $post->slug = $this->remove_char_html($post->slug);
            $post->slug = str_replace(' ', '-', $post->slug);
            return $post;
        } else {
            return false;
        }
    }

    // xoa cac ky tự không can thiet
    public function remove_char_html($content)
    {
        $content= strip_tags($content,"");
        // $content = preg_replace('/[^A-Za-z0-9\s.\s-]/','',$content);
        $content = str_replace( array( '!', '#', '$', '%', '^', '&', '*', '(', ')',
            '+', '=', '|', '\\', '[', ']', '{', '}', ':', ';', '\'', ',', '<', '>', '?', '/' ), '', $content);
        return $content;
    }

    public function getPostTab($postId)
    {
        return $this->post_tab->where('blog_post_id', $postId)->get();
    }

    public function actionPost($request) : array
    {
        try {
            $action = !empty($request['action']) ? $request['action'] : '';
            switch ($action) {
                case 'change-status':
                    if (!empty($request['id'])) {
                        $post = $this->post->find($request['id']);
                        if ( !empty($post) ) {
                            if ( !empty($request['type']) ) {
                                $post->hidden = 0;
                                $post->save();

                                // ghi log
                                $data_log = [
                                    'user_id' => Auth::id(),
                                    'action' => 'bật',
                                    'model' => 'Admin/Post',
                                    'admin' => ' bài viết ' . !empty($post->title) ? $post->title : '(Không có tiêu đề)',
                                ];
                                $this->log_activity->create($data_log);

                                return [
                                    'error' => 0,
                                    'message' => 'Bật bài viết thành công'
                                ];
                            }
                            else {
                                $post->hidden = 1;
                                $post->save();

                                // ghi log
                                $data_log = [
                                    'user_id' => Auth::id(),
                                    'action' => 'tắt',
                                    'model' => 'Admin/Post',
                                    'admin' => ' bài viết ' . !empty($post->title) ? $post->title : '(Không có tiêu đề)',
                                ];
                                $this->log_activity->create($data_log);

                                return [
                                    'error' => 0,
                                    'message' => 'Tắt bài viết thành công'
                                ];
                            }
                        } else {
                            return [
                                'error' => 1,
                                'message' => 'Bài viết không tồn tại'
                            ];
                        }
                    }
                    else
                    {
                        return [
                            'error' => 1,
                            'message' => 'Không tồn tại trường truy vấn'
                        ];
                    }
                    break;
                case 'delete':
                    if (!empty($request['id'])) {
                        $post = $this->post->find($request['id']);
                        if ( !empty($post) ) {
                            // ghi log
                            $data_log = [
                                'user_id' => Auth::id(),
                                'action' => 'xóa',
                                'model' => 'Admin/Post',
                                'admin' => ' bài viết ' . !empty($post->title) ? $post->title : '(Không có tiêu đề)',
                            ];
                            $this->log_activity->create($data_log);

                            // XÓA BLOG POST TAB
                            $this->post_tab->where('blog_post_id', $post->id)->delete();
                            // XÓA BLOG POST
                            $post->delete();

                            return [
                                'error' => 0,
                                'message' => 'Xóa bài viết thành công'
                            ];
                        } else {
                            return [
                                'error' => 1,
                                'message' => 'Bài viết không tồn tại'
                            ];
                        }
                    }
                    else
                    {
                        return [
                            'error' => 1,
                            'message' => 'Không tồn tại trường truy vấn'
                        ];
                    }
                    break;
                default:
                    return [
                        'error' => 1,
                        'message' => 'Hành động không có trong thư viện'
                    ];
            }
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Truy vấn thất bại'
            ];
        }
    }

}

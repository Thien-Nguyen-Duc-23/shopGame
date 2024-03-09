<?php

namespace App\Repositories\Admin;

use App\Models\ConfigSystem;
use App\Models\Library;
use App\Models\User;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;

class LibraryRepository
{
    protected $user;
    protected $log_activity;
    protected $library;

    public function __construct()
    {
        $this->user = new User();
        $this->log_activity = new LogActivity();
        $this->library = new Library();
    }

    public function loadLibrarybyUser($request)
    {
        $listLibrary = $this->library->where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        if ( $listLibrary->count() ) {
            $data = [];
            foreach ($listLibrary as $library) {
                $data[] = [
                    'id' => $library->id,
                    'name' => $library->name,
                    'alt' => $library->alt,
                    'link' => $library->link,
                    'title' => $library->title,
                    'qtt' => $library->qtt,
                ];
            }
            return [
                'error' => 0,
                'message' => '',
                'data' => $data
            ];
        }
        else {
            return [
                'error' => 1,
                'message' => 'Không có hình ảnh trong thư viện'
            ];
        }
    }


    public function updateLoadFile($request)
    {
        try {
            $validate = $this->validateFile($request['file']);
            if ( !empty($validate['error']) ) {
                return $validate;
            }
            // Lưu ảnh
            $file = preg_replace('/\s+/', '', $request['file']->getClientOriginalName());
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
                $file = preg_replace( "/($uni)/i" , $nonUnicode , $file);
            }
            $file = $this->remove_char_html($file);
            $title = str_replace(' ', '-', $file);

            $ext = $request['file']->getClientOriginalExtension();
            $title = str_replace([$ext, '.'], '', $title);

            $path2 = $request['file']->storeAs('public/images/libraries', $file);
            $file_storage_link = url('').'/storage/images/libraries/' . $file;

            $dataFile = [
                'user_id' => Auth::id(),
                'name' => $file,
                'alt' => $title,
                'title' => $title,
                'type' => $request['type'],
                'link' => $file_storage_link,
            ];
            $this->library->create($dataFile);
            // ghi log
            $data_log = [
                'user_id' => Auth::id(),
                'action' => 'thêm',
                'model' => 'Admin/Event',
                'admin' => ' hình ảnh ' . $file,
            ];
            $this->log_activity->create($data_log);
            return [
                'error' => 0,
                'message' => 'Tải lên hình ảnh thành công'
            ];
        } catch (\Throwable $th) {
            //throw $th;
            report($th);
            return [
                'error' => 1,
                'message' => 'Lỗi tải hình ảnh lên máy chủ'
            ];
        }
    }

    // xoa cac ky tự không can thiet
    public function remove_char_html($content)
    {
        $content= strip_tags($content,"");
        // $content = preg_replace('/[^A-Za-z0-9\s.\s-]/','',$content);
        $content = str_replace( array( '!', '', '#', '$', '%', '^', '&', '*', '(', ')',
            '+', '=', '|', '\\', '[', ']', '{', '}', ':', ';', '\'', ',', '<', '>', '?', '/' ), '', $content);
        return $content;
    }

    public function validateFile($file) {
        // Log::info($file->getClientMimeType());
        // Log::info($file->getClientOriginalExtension());
        if ( $file->getSize() > 67000000 ) {
            return [
                'error' => 1,
                'message' => 'Kích thước của file không được lớn hơn 64 MB',
            ];
        }
        elseif ( $file->getClientOriginalExtension() != 'jpg' && $file->getClientOriginalExtension() != 'jpeg'
            && $file->getClientOriginalExtension() != 'png' && $file->getClientOriginalExtension() != 'gif'
            && $file->getClientOriginalExtension() != 'ico'
        ) {
            return [
                'error' => 1,
                'message' => 'File được tải lên không đúng định dạng (jpg, jpeg, png, gif)',
            ];
        }
        return [ 'error' => 0 ];
    }

}

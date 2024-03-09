<?php

namespace App\Http\Controllers\Admin;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\KolPartnerService;
use App\Http\Requests\Admin\Kol\StoreKolRequest;
use App\Http\Requests\Admin\Kol\UpdateKolRequest;

class KolPartnerController extends Controller
{
    protected $refer;
    protected $user;

    public function __construct(
        protected KolPartnerService $kolPartnerService
    )
    {
        $this->refer = AdminFactory::kolPartnerRepository();
        $this->user = AdminFactory::userReposiroty();
    }

    public function index()
    {
        // get user
        $users = $this->user->getAllUser()->pluck('full_name', 'id')->toArray();

        return view('admins.kolPartners.index', [
            'users' => $users
        ]);
    }

    public function listKol(Request $request)
    {
        return response()->json($this->refer->listKol($request->all()));
    }

    public function create()
    {
        return view('admins.kolPartners.create');
    }

    public function createOrUpdate(Request $request)
    {
        try {
            return response()->json($this->refer->createOrUpdate($request));
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                'error' => 1,
                'message' => 'Lưu dữ liệu thất bại!'
            ], 400);
        }
    }

    public function edit($id)
    {
        try {
            return view('admins.kolPartners.edit', [
                'kolPartner' => $this->refer->findKolById($id)
            ]);
        } catch (\Exception $e) {
            return redirect()->route('admin.kol')->with('error', 'Lấy thông tin thất bại');
        }
    }

    public function update(UpdateKolRequest $request)
    {
        try {
            if (!$this->refer->findKolById($request->id)) {
                return redirect()->route('admin.kol')->with('error', 'Không tìm thấy kol!');
            }
            $this->kolPartnerService->update($request);

            return redirect()->route('admin.kol')->with('success', 'Cập nhật thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.kol')->with('error', 'Cập nhật thất bại');
        }
    }

    public function delete($id)
    {
        try {
            if (!$this->refer->findKolById($id)) {

                return response()->json([
                    'error' => 1,
                    'message' => 'Không tìm thấy kol!'
                ], 400);
            }

            return response()->json($this->refer->deleteKolById($id));
        } catch (\Exception $e) {

            return response()->json([
                'error' => 1,
                'message' => 'Xóa dữ liệu thất bại!'
            ], 400);
        }
    }

    public function listUserOfKol($id)
    {
        try {
            if (!$kolPartner = $this->refer->findKolById($id)) {
                return redirect()->route('admin.kol')->with('error', 'Không tìm thấy kol!');
            }

            $userIds = $kolPartner->user_ids ? explode(",", $kolPartner->user_ids) : [];

            return view('admins.kolPartners.user_of_kol', [
                'kolPartner' => $kolPartner,
                'userIds' => $this->user->getUserByIds($userIds)
            ]);
        } catch (\Exception $e) {
            report($e);
            return redirect()->route('admin.kol')->with('error', 'Không tìm thấy kol!');
        }
    }
}

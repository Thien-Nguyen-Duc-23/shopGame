<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PromoCode\StorePromoCodeRequest;
use App\Factories\AdminFactory;
use App\Http\Requests\Admin\PromoCode\UpdatePromoCodeRequest;

class PromoCodeController extends Controller
{
    protected $refer;
    protected $promoCode;
    protected $product;
    protected $user;
    protected $groupProduct;

    public function __construct()
    {
        $this->refer = AdminFactory::promoCodeRepository();
        $this->promoCode = AdminFactory::promoCodeRepository();
        $this->product = AdminFactory::productRepository();
        $this->user = AdminFactory::userReposiroty();
        $this->groupProduct = AdminFactory::groupProductRepository();
    }

    public function getInformationForSelect()
    {
        // get group product
        $groupProducts = $this->groupProduct->getAllGroupProduct()->pluck('name', 'id')->toArray();
        
        // get product
        $products = $this->product->getAllProduct()->pluck('name', 'id')->toArray();

        // get user
        $users = $this->user->getAllUser()->pluck('full_name', 'id')->toArray();

        return [
            $groupProducts,
            $products,
            $users
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.promoCode.index');
    }

    public function listPromoCode(Request $request)
    {
        return response()->json($this->refer->listPromoCode($request->all()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            // get infor will render
            list($groupProducts, $products, $users) = $this->getInformationForSelect();

            return view('admins.promoCode.create', [
                'groupProducts' => $groupProducts,
                'products' => $products,
                'users' => $users
            ]);
        } catch (\Exception $e) {
            report($e);
            return redirect()->route('admin.promo_code')->with('error', 'Lấy thông tin thất bại');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePromoCodeRequest $request)
    {
        try {
            $this->refer->store($request);
            
            return redirect()->route('admin.promo_code')->with('success', 'Thêm thành công');
        } catch (\Exception $e) {
            report($e);
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            if (!$promoCode = $this->refer->findPromoCodeById($id)) {
                return redirect()->route('admin.promo_code')->with('error', 'Lấy thông tin thất bại');
            }

            // get infor will render
            list($groupProducts, $products, $users) = $this->getInformationForSelect();

            return view('admins.promoCode.edit', [
                'groupProducts' => $groupProducts,
                'products' => $products,
                'users' => $users,
                'promoCode' => $promoCode
            ]);
        } catch (\Exception $e) {
            return redirect()->route('admin.promo_code')->with('error', 'Lấy thông tin thất bại');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromoCodeRequest $request, string $id)
    {
        try {
            if (!$this->refer->findPromoCodeById($request->id)) {
                return redirect()->back()->with('error', 'Không tìm thấy mã giảm giá!');
            }
            $this->refer->update($request);

            return redirect()->route('admin.promo_code')->with('success', 'Cập nhật thành công');
        } catch (\Exception $e) {
            report($e);
            return redirect()->back()->with('error', 'Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        try {
            if (!$this->refer->findPromoCodeById($id)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy mã giảm giá!'
                ], 400);
            }

            $this->refer->deletePromoCodeById($id);
            
            return response()->json([
                'success' => true,
                'message' => 'Xóa thành công!'
            ]);
        } catch (\Exception $e) {
            report($e);
            return redirect()->route('admin.kol')->with('error', 'Xóa thất bại');
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            if (!$this->refer->findPromoCodeById($request->id)) {

                return response()->json([
                    'error' => 1,
                    'message' => 'Không tìm thấy dữ liệu!'
                ], 400);
            }

            return response()->json($this->refer->updateByCondition($request));
        } catch (\Exception $e) {

            return response()->json([
                'error' => 1,
                'message' => 'Lưu thất bại!'
            ], 400);
        }
    }
}

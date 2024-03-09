<?php

namespace App\Repositories\Admin;

use App\Models\Category;
use App\Models\LogActivity;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Enums\ProductStatus;

class ProductRepository
{
    protected $product;
    protected $log_activity;

    public function __construct()
    {
        $this->product = new Product();
        $this->log_activity = new LogActivity();
    }

    public function listProduct($request): array
    {
        try {
            $qtt = !empty($request['qtt']) ? $request['qtt'] : 20;
            $q = !empty($request['q']) ? $request['q'] : '';
            $data = ['data' => []];

            $listProduct = $this->product->when($q, function ($query, $q) {
                $query->where('name', 'like', '%' . $q . '%')
                    ->orWhere('pricing', 'like', '%' . $q . '%')
                    ->orWhere('sale_pricing', 'like', '%' . $q . '%')
                    ->orWhere('card_pricing', 'like', '%' . $q . '%')
                    ->orWhereHas('category', function ($categoryQuery) use ($q) {
                        $categoryQuery->where('name', 'like', '%' . $q . '%');
                    });
            })->orderBy('id', 'desc')->paginate($qtt);

            foreach ($listProduct as $product) {
                $product->is_avatar = !empty($product->library->link) ? 1 : 0;
                $product->avatar = !empty($product->library->link) ? asset($product->library->link) : '';
                $product->is_category = false;

                // Kiểm tra danh mục có tồn tại hay không
                if(Category::where('id', $product->category_id)->exists()) {
                    $product->is_category = true;
                    $product->name_category = $product->category->name;
                }
                
                $data['data'][] = $product;
            }
            $data['total'] = $listProduct->total();
            $data['perPage'] = $listProduct->perPage();
            $data['current_page'] = $listProduct->currentPage();
            $data['firstItem'] = $listProduct->firstItem();
            $data['lastItem'] = $listProduct->lastItem();

            return [
                'error' => 0,
                'message' => '',
                'data' => $data
            ];
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Lỗi truy vấn đến máy chủ'
            ];
        }
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $message = [
            'category_id.required' => 'Tên danh mục không được để trống',
            'category_id.exists' => 'Danh mục không tồn tại',
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.string' => 'Tên sản phẩm phải là chuỗi',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự',
            //'name.unique' => 'Tên sản phẩm đã tồn tại',
            'description.string' => 'Mô tả phải là chuỗi',
            'pricing.required' => 'Giá không được để trống',
            //'pricing.numeric' => 'Giá phải là số',
            'sale_pricing.required' => 'Giá khuyến mãi không được để trống',
            //'sale_pricing.numeric' => 'Giá khuyến mãi phải là số',
            'card_pricing.required' => 'Giá thẻ không được để trống',
            //'card_pricing.numeric' => 'Giá thẻ phải là số',
        ];

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'pricing' => 'required',
            'sale_pricing' => 'required',
            'card_pricing' => 'required',
        ], $message);

        try {
            $this->product->create([
                'category_id' => $request['category_id'],
                'library_id' => $request['product-avatar'],
                'name' => $request['name'],
                'description' => $request['description'],
                'pricing' => intval(str_replace(',', '', $request['pricing'])),
                'sale_pricing' => intval(str_replace(',', '', $request['sale_pricing'])),
                'card_pricing' => intval(str_replace(',', '', $request['card_pricing'])),
                'status' => $request['status'] == 'on' ? ProductStatus::Public_Type->value : ProductStatus::Private_Type->value
            ]);
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function update($request, $product)
    {
        $message = [
            'category_id.required' => 'Tên danh mục không được để trống',
            'category_id.exists' => 'Danh mục không tồn tại',
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.string' => 'Tên sản phẩm phải là chuỗi',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự',
            //'name.unique' => 'Tên sản phẩm đã tồn tại',
            'description.string' => 'Mô tả phải là chuỗi',
            'pricing.required' => 'Giá không được để trống',
            //'pricing.numeric' => 'Giá phải là số',
            'sale_pricing.required' => 'Giá khuyến mãi không được để trống',
            //'sale_pricing.numeric' => 'Giá khuyến mãi phải là số',
            'card_pricing.required' => 'Giá thẻ không được để trống',
            //'card_pricing.numeric' => 'Giá thẻ phải là số',
        ];

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'pricing' => 'required',
            'sale_pricing' => 'required',
            'card_pricing' => 'required',
        ], $message);

        try {
            $product->update([
                'category_id' => $request['category_id'],
                'library_id' => $request['product-avatar'] ? $request['product-avatar'] : $request['old_avatar'],
                'name' => $request['name'],
                'description' => $request['description'],
                'pricing' => intval(str_replace(',', '', $request['pricing'])),
                'sale_pricing' => intval(str_replace(',', '', $request['sale_pricing'])),
                'card_pricing' => intval(str_replace(',', '', $request['card_pricing'])),
                'status' => $request['status'] == 'on' ? ProductStatus::Public_Type->value : ProductStatus::Private_Type->value
            ]);
            return true;
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function delete($id)
    {
        try {
            Product::destroy($id);
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    /**
     * get Model
     */
    public function getModel(): string
    {
        return $this->product;
    }

    /**
     * get all product no condition
     */
    public function getAllProduct()
    {
        return $this->product->all();
    }

    public function getProductById($id)
    {
        try {
            return [
                'error' => 0,
                'message' => '',
                'data' => $this->product->find($id)
            ];
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Lỗi truy vấn đến máy chủ!'
            ];
        }
    }
    public function changeStatusProduct($request): array
    {
        try {
            if (!empty($request['id'])) {
                $product = $this->product->find($request['id']);

                if (!empty($product)) {
                    if ($request['type'] == 1) {
                        $product->hidden = 0;
                        $message = 'Đã bật sản phẩm thành công!!';
                    } else {
                        $product->hidden = 1;
                        $message = 'Ẩn sản phẩm thành công!!';
                    }

                    $product->save();

                    return [
                        'error' => 0,
                        'message' => $message
                    ];
                } else {
                    return [
                        'error' => 1,
                        'message' => 'Sản phẩm không tồn tại!!'
                    ];
                }
            } else {
                return [
                    'error' => 1,
                    'message' => 'Truy vấn sản phẩm không có trường truy vấn!!'
                ];
            }
        } catch (\Exception $e) {
            report($e);

            return [
                'error' => 1,
                'message' => 'Truy vấn đếm sản phẩm thất bại!!'
            ];
        }
    }
}

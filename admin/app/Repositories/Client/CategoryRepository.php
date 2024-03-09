<?php
namespace App\Repositories\Client;

use App\Models\Category;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;
use App\Enums\CategoryStatus;
use App\Enums\ProductStatus;
use App\Models\Product;

Class CategoryRepository
{
    protected $category;
    protected $logActivity;
    protected $product;

    public function __construct()
    {
        $this->category = new Category();
        $this->logActivity = new LogActivity();
        $this->product = new Product();
    }
    
    /**
     * get Model
     */
    public function getModel(): string
    {
        return $this->category;
    }

    public function getListCategory($request)
    {
        try {
            $pageSize = !empty($request['page_size']) ? $request['page_size'] : '';
            $data = ['error' => 0, 'data' => []];

            $listCategories = $this->category->with('children:id,library_id,parent_id,uri,name,description,created_at')
                ->select('id', 'library_id', 'parent_id', 'uri', 'name', 'description', 'created_at')
                ->where('status', CategoryStatus::Public_Type->value)
                ->whereNull('parent_id')
                ->orderBy('created_at', 'desc')
                ->paginate($pageSize);

            foreach ($listCategories as $category) {
                $category->avatar = !empty($category->library->link) ? $category->library->link : null;
                $category->quantity_product = !empty($category->library->link) ? $category->library->link : null;

                if ($category->children->isNotEmpty()) {
                    foreach ($category->children as &$children) {
                        $children->avatar = !empty($children->library->link) ? $children->library->link : null;
                        $children->unsetRelation('library');
                    }
                }
                $category->unsetRelation('library');
                $data['data'][] = $category;
            }

            $data['total'] = $listCategories->total();
            $data['per_page'] = $listCategories->perPage();
            $data['current_page'] = $listCategories->currentPage();
            $data['first_item'] = $listCategories->firstItem();
            $data['last_item'] = $listCategories->lastItem();

            return $data;
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'data' => [],
                'message' => 'Truy vấn đến thể loại thất bại!'
            ];
        }
    }

    public function getDetailCategory($request)
    {
        try {
            $pageSize = !empty($request['page_size']) ? $request['page_size'] : '';

            // get category
            $category = $this->category->where('id',$request->id)
                ->where('status', CategoryStatus::Public_Type->value)
                ->first();

            // check have category
            if (!$category) {
                return [
                    'error' => 1,
                    'data' => [],
                    'message' => 'Không tìm thấy thể loại!'
                ];
            }

            // get product of category
            $products = $this->product
                ->where('category_id', $category->id)
                ->where('status', ProductStatus::Public_Type->value)
                ->when(isset($request['keywords']), function ($query) use ($request) {
                    $query->where('name', 'like', '%'. $request['keywords'] . '%')
                        ->orWhere('description', 'like', '%'. $request['keywords'] . '%');
                })
                ->orderBy('created_at', 'desc')
                ->paginate($pageSize);

            $dataProduct = [];
            // set avatar in product
            if ($products->isNotEmpty()) {
                foreach ($products as $product) {
                    array_push($dataProduct, [
                        'id' => $product->id,
                        'uri' => $product->uri,
                        'name'=> $product->name,
                        'description'=> $product->description,
                        'avatar' => !empty($product->library->link) ? $product->library->link : null,
                        'pricing' => $product->pricing,
                        'sale_pricing' => $product->sale_pricing,
                        'card_pricing' => $product->card_pricing
                    ]);
                }
            }

            return [
                'error' => 0,
                'data' => [
                    'id' => $category->id,
                    'uri' => $category->uri,
                    'name' => $category->name,
                    'description' => $category->description,
                    'avatar' => !empty($category->library->link) ? $category->library->link : null,
                    'products' => $dataProduct
                ],
                'total' => $products->total(),
                'per_page' => $products->perPage(),
                'current_page' => $products->currentPage(),
                'first_item' => $products->firstItem(),
                'last_item' => $products->lastItem(),
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

    public function getListCategoryHomePage($request)
    {
        $pageSize = !empty($request['page_size']) ? $request['page_size'] : '';

        return $this->category->with(['children' => function ($query) {
                $query->where('status', CategoryStatus::Public_Type->value);
            },
            'products' => function ($query) {
                $query->where('status', ProductStatus::Public_Type->value);
            }])
            ->where('status', CategoryStatus::Public_Type->value)
            ->whereNull('parent_id')
            ->orderBy('created_at', 'desc')
            ->paginate($pageSize);
    }

    public function getDetailCategoryByUri($uriCategory)
    {
        return $this->category->where('uri', $uriCategory)->first();
    }
}

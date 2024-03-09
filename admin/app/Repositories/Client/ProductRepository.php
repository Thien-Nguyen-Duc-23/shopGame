<?php
namespace App\Repositories\Client;

use App\Models\Product;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;
use App\Enums\ProductStatus;
use App\Constants;

Class ProductRepository
{
    protected $product;
    protected $logActivity;

    public function __construct()
    {
        $this->product = new Product();
        $this->logActivity = new LogActivity();
    }
    
    /**
     * get Model
     */
    public function getModel(): string
    {
        return $this->product;
    }

    public function getListProductOfCategorySearch($request, $categoryId)
    {
        return $this->product->where("category_id", $categoryId)
            ->where("status", ProductStatus::Public_Type->value)
            ->when($request->keywords, function ($query) use ($request) {
                $query->where('name', 'like', '%'. $request->keywords . '%')
                    ->orWhere('description', 'like', '%'. $request->keywords . '%');
            })
            ->when($request->pricing, function ($query) use ($request) {
                if ($request->pricing == Constants::UPTO_10TR_KEY) {
                    $query->where('pricing', '>=', $request->pricing);
                } else {
                    $query->whereBetween('pricing', Constants::SELECT_PRICE_PRODUCT_VALUE[$request->pricing]);
                }
            })
            ->orderBy("created_at","desc")
            ->paginate(16);
    }

    public function getDetailProductById($uriProduct)
    {
        return $this->product->with("category")
            ->where("uri", $uriProduct)
            ->where("status", ProductStatus::Public_Type->value)
            ->first();
    }

    public function getListProductSamePrice($pricing)
    {
        return $this->product->with("category")
            ->where("pricing", $pricing)
            ->where("status", ProductStatus::Public_Type->value)
            ->limit(4)
            ->get();
    }
}

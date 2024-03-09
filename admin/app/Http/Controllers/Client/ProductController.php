<?php

namespace App\Http\Controllers\Client;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productClientRepository;
    protected $categoryRepository;
    public function __construct()
    {
        $this->productClientRepository = AdminFactory::productClientRepository();
        $this->categoryRepository = AdminFactory::categoryClientRepository();
    }

    public function list(Request $request, $uriParent, $uriChildren)
    {
        if (!$category = $this->categoryRepository->getDetailCategoryByUri($uriChildren)) {
            return back();
        }

        $products = $this->productClientRepository->getListProductOfCategorySearch($request, $category->id);

        return view("clients.products.list", [
            'products' => $products,
            'category' => $category
        ]);
    }

    public function detail(Request $request, $uriCategory, $uriProduct)
    {
        $product = $this->productClientRepository->getDetailProductById($uriProduct);
        if (!$product) {
            return back();
        }

        $listProductSamePrice = $this->productClientRepository->getListProductSamePrice($product->pricing);
        
        return view("clients.products.detail", [
            'product' => $product,
            'listProductSamePrice' => $listProductSamePrice
        ]);
    }
}

<?php

namespace App\Http\Controllers\Client;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $sliderRepository;
    protected $categoryRepository;
    public function __construct()
    {
        $this->sliderRepository = AdminFactory::sliderClientRepository();
        $this->categoryRepository = AdminFactory::categoryClientRepository();
    }

    public function home(Request $request)
    {
        // dd(md5('e3bd72f7dff16c795bbb872cf9cf38c2'.'86321077117'.'buycard'.'32464'));
        return view("clients.home", [
            'sliders' => $this->sliderRepository->getSliderListHome(),
            'categories' => $this->categoryRepository->getListCategoryHomePage($request)
        ]);
    }
}

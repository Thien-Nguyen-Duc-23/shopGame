<?php

namespace App\Http\Controllers\Api;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $sliderRepository;
    public function __construct()
    {
        $this->sliderRepository = AdminFactory::sliderClientRepository();
    }

    public function index(Request $request)
    {
        return response()->json($this->sliderRepository->getSliderSearch($request->all()));
    }
}

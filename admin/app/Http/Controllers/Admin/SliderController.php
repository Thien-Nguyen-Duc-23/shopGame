<?php

namespace App\Http\Controllers\admin;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $sliderRepository;
    public function __construct()
    {
        $this->sliderRepository = AdminFactory::sliderRepository();
    }

    public function index()
    {
        return view('admins.slider.index');
    }

    public function getSliderSearch(Request $request)
    {
        return response()->json($this->sliderRepository->getSliderSearch($request->all()));
    }

    public function getDetailSlider(Request $request)
    {
        return response()->json($this->sliderRepository->getDetailSlider($request->all()));
    }

    public function sliderAction(Request $request)
    {
        return response()->json($this->sliderRepository->sliderAction($request->all()));
    }

    public function updateStatusSlider(Request $request)
    {
        try {
            return response()->json($this->sliderRepository->updateSliderByCondition($request->all()));
        } catch (\Exception $e) {

            report($e);
            return response()->json([
                'error' => 1,
                'message' => 'Lưu thất bại!'
            ], 400);
        }
    }

    public function getPreviewSlider()
    {
        return view('admins.slider.preview', [
            'sliders' => $this->sliderRepository->getDataPreviewSlider()
        ]);
    }
}

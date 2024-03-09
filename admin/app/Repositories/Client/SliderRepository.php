<?php
namespace App\Repositories\Client;

use App\Models\Slider;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;
use App\Enums\SliderStatus;

Class SliderRepository
{
    protected $slider;
    protected $logActivity;

    public function __construct()
    {
        $this->slider = new Slider();
        $this->logActivity = new LogActivity();
    }
    
    /**
     * get Model
     */
    public function getModel(): string
    {
        return $this->slider;
    }

    public function getSliderSearch($request)
    {
        try {
            $pageSize = !empty($request['page_size']) ? $request['page_size'] : '';
            $data = ['error' => 0, 'data' => []];

            $listSlider = $this->slider->where('status', SliderStatus::Public_Type)
                ->orderBy('sort_number', 'asc')
                ->paginate($pageSize);

            foreach ($listSlider as $slider) {
                $slider->is_avatar = !empty($slider->library->link) ? 1 : 0;
                $slider->avatar = !empty($slider->library->link) ? $slider->library->link : '';
                $slider->unsetRelation('library');
                $data['data'][] = $slider;
            }

            $data['total'] = $listSlider->total();
            $data['per_page'] = $listSlider->perPage();
            $data['current_page'] = $listSlider->currentPage();
            $data['first_item'] = $listSlider->firstItem();
            $data['last_item'] = $listSlider->lastItem();

            return $data;
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'data' => [],
                'message' => 'Truy vấn đến slider thất bại'
            ];
        }
    }

    public function getSliderListHome()
    {
        return $this->slider->where('status', SliderStatus::Public_Type->value)->orderBy('sort_number', 'asc')->get();
    }
}

<?php
namespace App\Repositories\Admin;

use App\Models\CardExchanger;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use App\Enums\CardExchangerStatus;

Class CardExchangerRepository
{
    protected $card_exchanger;
    protected $log_activity;

    public function __construct()
    {
        $this->card_exchanger = new CardExchanger();
        $this->log_activity = new LogActivity();
    }

    public function listCardExchanger($request) : array
    {
        try {
            $qtt = !empty($request['qtt']) ? $request['qtt'] : 20;
            $q = !empty($request['q']) ? $request['q'] : '';
            $data = ['data' => []];

            $listCardExchanger = $this->card_exchanger->when($q, function ($query, $q)
            {
                $query->where('name', 'like', '%'. $q . '%');
            })->paginate($qtt);

            foreach ($listCardExchanger as $cardExchanger)
            {
                $cardExchanger->send_url = $cardExchanger->send_url ? $cardExchanger->send_url : '';
                $cardExchanger->get_rate_url = $cardExchanger->get_rate_url ? $cardExchanger->get_rate_url : '';

                $data['data'][] = $cardExchanger;
            }
            $data['total'] = $listCardExchanger->total();
            $data['perPage'] = $listCardExchanger->perPage();
            $data['current_page'] = $listCardExchanger->currentPage();
            $data['firstItem'] = $listCardExchanger->firstItem();
            $data['lastItem'] = $listCardExchanger->lastItem();

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
        $message = [
            'name.required' => 'Tên cổng đổi thẻ không được để trống',
            'name.string' => 'Tên cổng đổi thẻ phải là chuỗi',
            'name.max' => 'Tên cổng đổi thẻ không được vượt quá 255 ký tự',
            'send_url.string' => 'Địa chỉ gửi phải là chuỗi',
            'send_url.max' => 'Địa chỉ gửi không được vượt quá 255 ký tự',
            'get_rate_url.required' => 'Địa chỉ lấy tỉ lệ không được để trống',
            'get_rate_url.string' => 'Địa chỉ lấy tỉ lệ phải là chuỗi',
            'get_rate_url.max' => 'Địa chỉ lấy tỉ lệ không được vượt quá 255 ký tự',
            'partner_id.required' => 'Mã đối tác không được để trống',
            'partner_id.string' => 'Mã đối tác phải là chuỗi',
            'partner_id.max' => 'Mã đối tác không được vượt quá 255 ký tự',
        ];

        $request->validate([
            'name' => 'required|string|max:255',
            'send_url' => 'nullable|string|max:255',
            'get_rate_url' => 'required|string|max:255',
            'partner_id' => 'required|string|max:255',
        ], $message);

        try {
            $data = $request->all();
            $data['status'] = $request->status == 'on' ? CardExchangerStatus::ON_Type->value : CardExchangerStatus::OFF_Type->value;

            $this->card_exchanger->create($data);

            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function update($request, $card_exchanger)
    {
        $message = [
            'name.required' => 'Tên cổng đổi thẻ không được để trống',
            'name.string' => 'Tên cổng đổi thẻ phải là chuỗi',
            'name.max' => 'Tên cổng đổi thẻ không được vượt quá 255 ký tự',
            'send_url.string' => 'Địa chỉ gửi phải là chuỗi',
            'send_url.max' => 'Địa chỉ gửi không được vượt quá 255 ký tự',
            'get_rate_url.required' => 'Địa chỉ lấy tỉ lệ không được để trống',
            'get_rate_url.string' => 'Địa chỉ lấy tỉ lệ phải là chuỗi',
            'get_rate_url.max' => 'Địa chỉ lấy tỉ lệ không được vượt quá 255 ký tự',
            'partner_id.required' => 'Mã đối tác không được để trống',
            'partner_id.string' => 'Mã đối tác phải là chuỗi',
            'partner_id.max' => 'Mã đối tác không được vượt quá 255 ký tự',
        ];

        $request->validate([
            'name' => 'required|string|max:255',
            'send_url' => 'nullable|string|max:255',
            'get_rate_url' => 'required|string|max:255',
            'partner_id' => 'required|string|max:255',
        ], $message);

        try {
            $data = $request->all();
            $data['status'] = $request->status == 'on' ? CardExchangerStatus::ON_Type : CardExchangerStatus::OFF_Type;

            $card_exchanger->update($data);

            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function delete($id)
    {
        try {
            CardExchanger::destroy($id);
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function findCardExchangerById($id) {
        try {
            return $this->card_exchanger->find($id);
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }

    public function updateByCondition($request)
    {
        try {
            $this->findCardExchangerById($request->id)->update($request->all());

            return [
                'error' => 0,
                'message' => 'Lưu thành công!'
            ];
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Lưu liệu thất bại!'
            ];
        }
    }
}

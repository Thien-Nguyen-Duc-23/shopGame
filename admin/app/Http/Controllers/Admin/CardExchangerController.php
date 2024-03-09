<?php

namespace App\Http\Controllers\Admin;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use App\Models\CardExchanger;
use Illuminate\Http\Request;

class CardExchangerController extends Controller
{
    protected $home;
    protected $card_exchanger;
    protected $cardExchangerRate;


    public function __construct()
    {
        $this->home = AdminFactory::homeRepository();
        $this->card_exchanger = AdminFactory::cardExchangerRepository();
        $this->cardExchangerRate = AdminFactory::cardExchangerRateRepository();
    }

    public function index()
    {
        return view('admins.card_exchangers.index');
    }

    public function listCardExchanger(Request $request)
    {
        return response()->json($this->card_exchanger->listCardExchanger($request->all()));
    }

    public function create()
    {
        return view('admins.card_exchangers.create');
    }

    public function store(Request $request)
    {
        if($this->card_exchanger->store($request))
        {
            return redirect()->route('admin.card-exchanger')->with('success', 'Thêm thành công');
        }else{
            return redirect()->route('admin.card-exchanger')->with('error', 'Thêm thất bại');
        }
    }

    public function edit($id)
    {
        $card_exchanger = CardExchanger::findOrFail($id);

        return view('admins.card_exchangers.update', compact('card_exchanger'));
    }

    public function update(Request $request, $id)
    {
        $card_exchanger = CardExchanger::findOrFail($id);

        if($this->card_exchanger->update($request, $card_exchanger))
        {
            return redirect()->route('admin.card-exchanger')->with('success', 'Cập nhật thành công');
        }else{
            return redirect()->route('admin.card-exchanger')->with('error', 'Cập nhật thất bại');
        }
    }

    public function delete($id)
    {
        if($this->card_exchanger->delete($id))
        {
            return redirect()->route('admin.card-exchanger')->with('success', 'Xóa thành công');
        }else{
            return redirect()->route('admin.card-exchanger')->with('error', 'Xóa thất bại');
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            if (!$this->card_exchanger->findCardExchangerById($request->id)) {

                return response()->json([
                    'error' => 1,
                    'message' => 'Không tìm thấy dữ liệu!'
                ], 400);
            }

            return response()->json($this->card_exchanger->updateByCondition($request));
        } catch (\Exception $e) {

            return response()->json([
                'error' => 1,
                'message' => 'Lưu thất bại!'
            ], 400);
        }
    }

    public function detail(Request $request, $id)
    {
        return view('admins.card_exchangers.detail', [
            'cardExchanger'=> $this->card_exchanger->findCardExchangerById($id),
            'cardExchangerRates' => $this->cardExchangerRate->listCardExchangerRateByConditions(['card_exchanger_id' => $id]),
        ]);
    }
}

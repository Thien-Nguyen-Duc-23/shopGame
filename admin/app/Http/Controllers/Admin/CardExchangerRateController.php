<?php

namespace App\Http\Controllers\Admin;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardExchangerRateController extends Controller
{
    protected $home;
    protected $card_exchanger_rate;

    public function __construct()
    {
        $this->home = AdminFactory::homeRepository();
        $this->card_exchanger_rate = AdminFactory::cardExchangerRateRepository();
    }

    public function index()
    {
        return view('admins.card_exchanger_rates.index');
    }

    public function listCardExchangerRate(Request $request)
    {
        return response()->json($this->card_exchanger_rate->listCardExchangerRate($request->all()));
    }
}

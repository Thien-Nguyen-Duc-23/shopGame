<?php

namespace App\Http\Controllers\Admin;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use App\Models\CardProvider;
use Illuminate\Http\Request;

class CardProviderController extends Controller
{
    protected $home;
    protected $cardProvider;

    public function __construct()
    {
        $this->home = AdminFactory::homeRepository();
        $this->cardProvider = AdminFactory::cardProviderRepository();
    }

    public function index()
    {
        return view('admins.card_providers.index');
    }

    public function listCardProvider(Request $request)
    {
        return response()->json($this->cardProvider->listCardProvider($request->all()));
    }

    public function create()
    {
        return view('admins.cardProviders.create');
    }

    public function getDetailCardProvider(Request $request)
    {
        return response()->json($this->cardProvider->getDetailCardProvider($request->all()));
    }

    public function actionCardProvider(Request $request)
    {
        return response()->json($this->cardProvider->actionCardProvider($request->all()));
    }
}

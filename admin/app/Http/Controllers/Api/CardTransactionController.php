<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Factories\AdminFactory;

class CardTransactionController extends Controller
{
    protected $cardTransactionRepository;
    public function __construct()
    {
        $this->cardTransactionRepository = AdminFactory::cardTransactionClientRepository();
    }

    public function index(Request $request)
    {
        return response()->json($this->cardTransactionRepository->getListCardTransaction($request->all()));
    }
}

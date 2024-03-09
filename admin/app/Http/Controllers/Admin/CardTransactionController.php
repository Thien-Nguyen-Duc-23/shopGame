<?php

namespace App\Http\Controllers\Admin;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardTransactionController extends Controller
{
    protected $home;
    protected $card_transaction;

    public function __construct()
    {
        $this->home = AdminFactory::homeRepository();
        $this->card_transaction = AdminFactory::cardTransactionRepository();
    }

    public function index()
    {
        return view('admins.card_transactions.index');
    }

    public function listCardTransaction(Request $request)
    {
        return response()->json($this->card_transaction->listCardTransaction($request->all()));
    }
}

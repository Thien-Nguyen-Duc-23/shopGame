<?php

namespace App\Http\Controllers\Admin;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $home;
    protected $payment;

    public function __construct()
    {
        $this->home = AdminFactory::homeRepository();
        $this->payment = AdminFactory::categoryRepository();
    }

    public function index()
    {
        return view('admins.payments.index');
    }

    public function listCategory(Request $request)
    {
        return response()->json($this->payment->listCategory($request->all()));
    }
}

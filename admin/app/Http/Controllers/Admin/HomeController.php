<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Factories\AdminFactory;

class HomeController extends Controller
{
    protected $home;

    public function __construct()
    {
        $this->home = AdminFactory::homeRepository();
    }

    public function index()
    {
        $totalUser = $this->home->getTotalUser();
        return view('admins.index', compact('totalUser'));
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use Illuminate\Http\Request;

class LogActivityController extends Controller
{
    protected $home;
    protected $log_activity;

    public function __construct()
    {
        $this->home = AdminFactory::homeRepository();
        $this->log_activity = AdminFactory::logActivityRepository();
    }

    public function index()
    {
        return view('admins.log_activities.index');
    }

    public function listLogActivity(Request $request)
    {
        return response()->json($this->log_activity->listLogActivity($request->all()));
    }

    // public function edit($id){
    //     $log_activity = LogActivity::findOrFail($id);
    //     dd($log_activity->nguoi_dung);
    // }
}

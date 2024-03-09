<?php

namespace App\Repositories\Admin;

use App\Models\User;
use App\Models\LogActivity;

class HomeRepository
{

    protected $user;
    protected $log_activity;

    public function __construct()
    {
        $this->user = new User();
        $this->log_activity = new LogActivity();
    }

    public function getTotalUser()
    {
        return $this->user->count();
    }

}

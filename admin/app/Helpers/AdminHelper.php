<?php
namespace App\Helpers;

use App\Factories\AdminFactory;

class AdminHelper
{

    public static function getConfigSystem() : array
    {
        $repo = AdminFactory::configSystemRepository();
        return $repo->systemConfig();
    }

}

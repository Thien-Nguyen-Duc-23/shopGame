<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin'; // admin - 1
    case SuperAdmin = 'super_admin'; // super_admin - 2
    case Customer = 'customer'; // Customer - 3

    const ROLE = [
        self::Admin->value => 'Admin',
        self::Customer->value => 'Khách hàng',
    ];
}

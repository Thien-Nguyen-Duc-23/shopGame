<?php

namespace App\Enums;

enum UserGender: int
{
    case Male = 1; // nam
    case Female = 2; // nữ
    case Other = 3; // khác

    const GENDER = [
        self::Male->value => 'Nam',
        self::Female->value => 'Nữ',
        self::Other->value => 'Khác',
    ];
}

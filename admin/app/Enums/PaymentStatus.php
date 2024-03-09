<?php

namespace App\Enums;

enum PaymentStatus: int
{
    case Pending = 0;
    case Unpaid = 1;
    case Paid = 2;

    const PAYMENT = [
        self::Pending->value => 'Pending',
        self::Unpaid->value => 'Unpaid',
        self::Paid->value => 'Paid',
    ];
}

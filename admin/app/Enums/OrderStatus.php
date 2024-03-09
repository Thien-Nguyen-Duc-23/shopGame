<?php

namespace App\Enums;

enum OrderStatus: int
{
    case Processing = 0; // Chờ giao hàng
    case Success = 1; // Đã giao hàng
    case Canceled = 2; // Thất bại
    case Refunded = 3; // Đã hoàn tiền
    const ORDER_STATUS = [
        self::Processing->value => 'Chờ giao hàng',
        self::Success->value => 'Đã giao hàng',
        self::Canceled->value => 'Thất bại',
        self::Refunded->value => 'Đã hoàn tiền'
    ];
}

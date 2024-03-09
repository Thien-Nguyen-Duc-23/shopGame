<?php

namespace App\Enums;

enum CardTransactionStatus: int
{
    case Processing = 0; // Chờ phê duyệt thẻ
    case Success = 1; // Thành công
    case Canceled = 2; // Thất bại
    const ORDER_STATUS = [
        self::Processing->value => 'Chờ duyệt',
        self::Success->value => 'Thành công',
        self::Canceled->value => 'Thất bại',
    ];
}

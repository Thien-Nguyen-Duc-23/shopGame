<?php

namespace App\Enums;

enum FeedbackStatus: int
{
    case Pending = 0; // chưa kiểm tra (feedback mới)
    case Reject = 1; // từ chối
    case Approved = 2; // chấp nhận

    const FEEDBACK_STATUS = [
        self::Pending->value => 'Chờ duyệt',
        self::Reject->value => 'Từ chối',
        self::Approved->value => 'Chấp nhận'
    ];
}

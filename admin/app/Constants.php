<?php

namespace App;

class Constants
{
    const BELOW_50 = [0, 50000]; // dưới 50k
    const FROM_50K_TO_200K = [50000, 200000]; // từ 50k -> 200k
    const FROM_200K_TO_500K = [200000, 500000]; // từ 200k -> 500k
    const FROM_500K_TO_1TR = [500000, 1000000]; // từ 500k -> 1tr
    const FROM_1TR_TO_5TR = [1000000, 5000000]; // từ 1TR -> 5TR
    const FROM_5TR_TO_10TR = [5000000, 10000000]; // từ 5TR -> 10TR
    const UPTO_10TR = 10000000; // từ 5TR -> 10TR

    const UPTO_10TR_KEY = 6; // từ 5TR -> 10TR

    const SELECT_PRICE_PRODUCT = [
        'Dưới 50k',
        'Từ 50k - 200k',
        'Từ 200k - 500k',
        'Từ 500k - 1 Triệu',
        'Trên 1 triệu',
        'Trên 5 triệu',
        'Trên 10 triệu'
    ];

    const SELECT_PRICE_PRODUCT_VALUE = [
        self::BELOW_50,
        self::FROM_50K_TO_200K,
        self::FROM_200K_TO_500K,
        self::FROM_500K_TO_1TR,
        self::FROM_1TR_TO_5TR,
        self::FROM_5TR_TO_10TR,
        self::UPTO_10TR
    ];
}

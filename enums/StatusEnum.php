<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 10 2023 16:47:42
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\enums;

interface StatusEnum
{
    public const INACTIVE = 0;
    public const ACTIVE = 1;

    public const LABEL = [
        self::ACTIVE => "Active",
        self::INACTIVE => "In active",
    ];
}
<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 10 2023 16:47:42
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\enums;

interface UserEnum
{
    public const USER = 'user';
    public const MANAGER = 'manager';
    public const ADMINISTRATOR = 'administrator';

    public const LIST = [
        self::USER => "User",
        self::MANAGER => "Manager",
        self::ADMINISTRATOR => "Administrator",
    ];
}
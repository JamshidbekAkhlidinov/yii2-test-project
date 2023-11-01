<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 10 2023 16:47:42
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\enums;

interface UserRoleEnum
{
    public const USER = 'user';
    public const MANAGER = 'manager';
    public const ADMINISTRATOR = 'administrator';
    public const LIST = [
        self::ADMINISTRATOR => "Administrator",
        self::MANAGER => "Manager",
        self::USER => "User",
    ];
}
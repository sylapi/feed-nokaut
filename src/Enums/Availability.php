<?php
namespace Sylapi\Feeds\Nokaut\Enums;

class Availability
{

    const IN_STOCK = 0;
    const UP_7_DAYS  = 1;
    const FROM_7_DAYS  = 2;
    const UPON_REQUEST = 3;
    const CHECK_IN_STORE = 4;

    private static $availabilities = [
        0 => 'dostępny od ręki',
        1 => 'dostępny do tygodnia',
        2 => 'dostępny powyżej tygodnia',
        3 => 'dostępny na życzenie',
        4 => 'sprawdź w sklepie'
    ];

    public static function isCorrectStatus($status) 
    {
        return (in_array($status, static::$availabilities) 
            || in_array($status, array_keys(static::$availabilities)));
    }
}
<?php

namespace Portal\Services;

class DateService
{
    private const YEAR_MONTH_DAY ='Y/m/d';
    public static function getTodaysDateAsString()
    {
        $date = new \DateTimeImmutable("now");
        return $date->format(self::YEAR_MONTH_DAY);
    }
}
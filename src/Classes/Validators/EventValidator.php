<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 28/11/2018
 * Time: 09:56
 */

namespace Portal\Validators;


class EventValidator
{
    const TIMEREGEX = '/([0-1][0-9]|[1-2][0-3]):([0-1][0-9]|[1-5][0-9])/';

    public static function validTime($time) {
        return preg_match(self::TIMEREGEX, $time);
    }
}
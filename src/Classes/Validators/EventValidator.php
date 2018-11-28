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

    public static function validTime(string $time) {
        return preg_match(self::TIMEREGEX, $time);
    }

    public static function startAfterEndTime(string $startTime, string $endTime) {

        $startIntegers = str_replace(':', '', $startTime);
        $endIntegers = str_replace(':', '', $endTime);

        return ((int)$startIntegers >= (int)$endIntegers);
    }

    public static function dateNotInPast(string $date) {

        $date = \DateTime::createFromFormat('Y-m-d', $date);

        return (date_diff($date, new \DateTime()) < 0);

    }

    public static function checkFieldNotEmpty(string $location, string $eventName) {

        $trimLocation = trim($location);
        $trimEventName = trim($eventName);

        return (empty($trimLocation) || empty($trimEventName));
    }

}
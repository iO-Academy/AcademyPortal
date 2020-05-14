<?php


namespace Portal\Validators;


class DateTimeValidator
{
    private const TIME_REGEX = '/([01][0-9]|2[0-3]):[0-5][0-9]/';
    private const DATE_REGEX = '/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/';

    /**
     * Sanitise as a date in the event table as data.
     *
     * @param string $date
     *
     * @return bool|string
     */
    public static function validateDate(string $date)
    {
        if (!preg_match(self::DATE_REGEX, $date)) {
            throw new \Exception('Please enter correct date');
        } else {
            return $date;
        }
    }

    /**
     * Sanitise as a time in the event table as data.
     *
     * @param string $time
     * @return bool|string
     */
    public static function validateTime(string $time)
    {
        if (!preg_match(self::TIME_REGEX, $time)
        ) {
            throw new \Exception('Please enter correct time');
        } else {
            return $time;
        }
    }

    /**
     * Validate that end time is later than start time
     *
     * @param $startTime
     * @param $endTime
     * @return bool
     * @throws \Exception
     */
    public static function validateStartEndTime($startTime, $endTime)
    {
        if ($startTime >= $endTime) {
            throw new \Exception('End time should be later than start time');
        } else {
            return true;
        }
    }
}
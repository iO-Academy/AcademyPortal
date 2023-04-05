<?php

namespace Portal\Validators;

use Exception;

class CourseValidator
{
    /**
     * validates data in course array
     * @throws Exception
     * @params array of course data
     * @returns bool
     */
    public static function validate(array $course): bool
    {
        DateTimeValidator::validateDate($course['startDate']);
        DateTimeValidator::validateDate($course['endDate']);
        DateTimeValidator::validateStartEndTime($course['startDate'], $course['endDate']);
        if (!is_null($course['in_person_spaces'])) {
            $inPersonInput = intval($course['in_person_spaces']);
            IntegerValidator::validateInteger($inPersonInput, 1, 999);
        }
        if (!is_null($course['remote_spaces'])) {
            $remoteInput = intval($course['remote_spaces']);
            IntegerValidator::validateInteger($remoteInput, 1, 999);
        }
        if (!is_null($course['notes'])) {
            StringValidator::validateLength($course['notes'], 500, 'notes');
        }
        return true;
    }
}

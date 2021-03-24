<?php

namespace Portal\Validators;

class CourseValidator
{
    public static function validate(array $course): bool
    {
        DateTimeValidator::validateDate($course['startDate']);
        DateTimeValidator::validateDate($course['endDate']);
        DateTimeValidator::validateStartEndTime($course['startDate'], $course['endDate']);
        if (!is_null($course['notes'])) {
            StringValidator::validateLength($course['notes'], 500, 'notes');
        }

        return true;
    }
}

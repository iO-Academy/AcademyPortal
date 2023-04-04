<?php

namespace Portal\Validators;

class CourseValidator
{
    public static function validate(array $course): bool
    {
        DateTimeValidator::validateDate($course['startDate']);
        DateTimeValidator::validateDate($course['endDate']);
        DateTimeValidator::validateStartEndTime($course['startDate'], $course['endDate']);
        if (!is_null($course['in_person_spaces_input'])) {
            IntegerValidator::validateInteger($course['in_person_spaces_input'], 1, 999);
        }
        if (!is_null($course['remote_spaces_input'])) {
            IntegerValidator::validateInteger($course['remote_spaces_input'], 1, 999);
        }
        if (!is_null($course['notes'])) {
            StringValidator::validateLength($course['notes'], 500, 'notes');
        }
        return true;
    }
}

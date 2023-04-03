<?php

namespace Portal\Validators;

class CourseValidator
{
    public static function validate(array $course): bool
    {
        DateTimeValidator::validateDate($course['startDate']);
        DateTimeValidator::validateDate($course['endDate']);
        DateTimeValidator::validateStartEndTime($course['startDate'], $course['endDate']);
//        if (!is_null($course['in_person_input'])) {
//            IntegerValidator::validateInteger($course['in_person_input'], 1, 200);
//        }
//        if (!is_null($course['remote_input'])) {
//            IntegerValidator::validateInteger($course['remote_input'], 1, 200);
//        }
        if (!is_null($course['notes'])) {
            StringValidator::validateLength($course['notes'], 500, 'notes');
        }

        return true;
    }
}

<?php

namespace Portal\Sanitisers;

class CourseSanitiser
{
    public static function sanitise(array $course): array
    {
        $course['courseName'] = StringSanitiser::sanitiseString($course['courseName']);
        $course['notes'] = StringSanitiser::sanitiseString($course['notes']);
        $course['in_person_spaces'] = IntegerSanitiser::sanitiseInt($course['in_person_spaces']);
        $course['remote_spaces'] = IntegerSanitiser::sanitiseInt($course['remote_spaces']);

        return $course;
    }
}

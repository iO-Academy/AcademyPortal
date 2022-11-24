<?php

namespace Portal\Sanitisers;

class CourseSanitiser
{
    public static function sanitise(array $course): array
    {
        $course['courseName'] = StringSanitiser::sanitiseString($course['courseName']);
        $course['notes'] = StringSanitiser::sanitiseString($course['notes']);

        return $course;
    }
}

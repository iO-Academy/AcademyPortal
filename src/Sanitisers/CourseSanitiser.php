<?php

namespace Portal\Sanitisers;

class CourseSanitiser
{
    public static function sanitise(array $course): array
    {
        $course['name'] = StringSanitiser::sanitiseString($course['name']);
        $course['notes'] = StringSanitiser::sanitiseString($course['notes']);

        return $course;
    }
}

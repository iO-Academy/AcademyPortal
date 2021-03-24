<?php

namespace Portal\Sanitisers;

class CourseSanitiser
{
    public static function sanitise(array $course): array
    {
        $course['name'] = StringSanitiser::sanitiseString($course['name']);
        $course['trainer'] = StringSanitiser::sanitiseString($course['trainer']);
        $course['notes'] = StringSanitiser::sanitiseString($course['notes']);
        $course['id'] = (int)$course['id'];

        return $course;
    }
}

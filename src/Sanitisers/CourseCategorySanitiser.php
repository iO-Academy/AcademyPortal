<?php

namespace Portal\Sanitisers;

class CourseCategorySanitiser
{
    public static function sanitise(array $category): array
    {
        $category['courseCategory'] = StringSanitiser::sanitiseString($category['courseCategory']);
        return $category;
    }
}

<?php

namespace Portal\Sanitisers;

class TrainerSanitiser
{
    public static function sanitise(array $trainer): array
    {
        $trainer['name'] = StringSanitiser::sanitiseString($trainer['name']);
        $trainer['email'] = StringSanitiser::sanitiseString($trainer['email']);
        $trainer['notes'] = StringSanitiser::sanitiseString($trainer['notes']);

        return $trainer;
    }
}

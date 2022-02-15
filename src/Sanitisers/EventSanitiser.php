<?php

namespace Portal\Sanitisers;

class EventSanitiser
{
    public static function sanitise(array $event): array
    {
        $event['name'] = StringSanitiser::sanitiseString($event['name']);
        $event['notes'] = StringSanitiser::sanitiseString($event['notes']);
        $event['location'] = StringSanitiser::sanitiseString($event['location']);
        return $event;
    }
}

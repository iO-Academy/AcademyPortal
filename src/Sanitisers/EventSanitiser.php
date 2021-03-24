<?php

namespace Portal\Sanitisers;

class EventSanitiser
{
    public static function sanitise(array $event): array
    {
        $event['event_id'] = (int)$event['event_id'];
        $event['name'] = StringSanitiser::sanitiseString($event['name']);
        $event['notes'] = StringSanitiser::sanitiseString($event['notes']);
        $event['location'] = StringSanitiser::sanitiseString($event['location']);
        return $event;
    }
}

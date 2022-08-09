<?php

namespace Portal\Sanitisers;

class ContactSanitiser
{
    public static function sanitise(array $contact): array
    {
        $contact['contactName'] = StringSanitiser::sanitiseString($contact['contactName']);
        $contact['contactEmail'] = StringSanitiser::sanitiseString($contact['contactEmail']);
        $contact['contactJobTitle'] = StringSanitiser::sanitiseString($contact['contactJobTitle']);
        $contact['contactPhone'] = StringSanitiser::sanitiseString($contact['contactPhone']);
        $contact['contactCompanyId'] = (int)$contact['contactCompanyId'];
        $contact['contactIsPrimary'] = (int)$contact['contactIsPrimary'];

        return $contact;
    }
}

<?php

namespace Portal\Sanitisers;

class HiringPartnerSanitiser
{
    public static function sanitise(array $hiringPartner): array
    {
        $hiringPartner['companyId'] = (int)$hiringPartner['companyId'];
        $hiringPartner['name'] = StringSanitiser::sanitiseString($hiringPartner['name']);
        $hiringPartner['companySize'] = (int)$hiringPartner['companySize'];
        $hiringPartner['techStack'] = StringSanitiser::sanitiseString($hiringPartner['techStack']);
        $hiringPartner['postcode'] = StringSanitiser::sanitiseString($hiringPartner['postcode']);
        $hiringPartner['phoneNumber'] = StringSanitiser::sanitiseString($hiringPartner['phoneNumber']);
        $hiringPartner['companyUrl'] = StringSanitiser::sanitiseString($hiringPartner['companyUrl']);
        return $hiringPartner;
    }
}

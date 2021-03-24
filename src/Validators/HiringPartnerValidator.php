<?php

namespace Portal\Validators;

class HiringPartnerValidator
{
    public static function validate(array $hiringPartner): bool
    {
        StringValidator::validateExistsAndLength(
            $hiringPartner['name'],
            StringValidator::MAXVARCHARLENGTH,
            'Company name'
        );
        StringValidator::validateExistsAndLength($hiringPartner['techStack'], 600, 'TechStack');
        StringValidator::validateExistsAndLength($hiringPartner['postcode'], 10, 'Postcode');
        StringValidator::validateLength($hiringPartner['phoneNumber'], 20, 'Phone number');
        StringValidator::validateLength($hiringPartner['companyUrl'], StringValidator::MAXVARCHARLENGTH, 'Website URL');
        return true;
    }
}

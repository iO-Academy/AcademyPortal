<?php

namespace Portal\Validators;


class HiringPartnerValidator
{

    private const POSTCODEREGEX = '#^([Gg][Ii][Rr] 0[Aa]{2})|((([A-Za-z][0-9]{1,2})|(([A-Za-z][A-Ha-hJ-Yj-y][0-9]{1,2})|(([A-Za-z][0-9][A-Za-z])|([A-Za-z][A-Ha-hJ-Yj-y][0-9][A-Za-z]?))))\s?[0-9][A-Za-z]{2})$#';

    public static function isValidCompanySize(int $size, array $availableSizes)
    {
        return in_array($size, $availableSizes);
    }

    public static function isValidHiringPartner($hiringPartnerArray)
    {
        $hiringPartnerArray['phoneNo'] = ($hiringPartnerArray['phoneNo'] ?? '');
        return (
            is_string($hiringPartnerArray['companyName']) && //needs to be required currently allowing empty string
            is_string($hiringPartnerArray['techStack']) &&
            is_numeric($hiringPartnerArray['size']) && //needs to be required currently allowing empty string
            preg_match(self::POSTCODEREGEX, $hiringPartnerArray['postcode']) &&
            is_string($hiringPartnerArray['phoneNo']) &&
            (!empty($hiringPartnerArray['url']) ? self::isValidURL($hiringPartnerArray['url']) : TRUE)
        );
    }

    public static function isValidURL($url)
    {
        return (filter_var($url, FILTER_VALIDATE_URL) !== FALSE);
    }

}
<?php

namespace Portal\Validators;

use Exception;

class PhoneNumberValidator
{
    private const PATTERN = '/^(([+][(]?[0-9]{1,3}[)]?)|([(]?[0-9]{4}[)]?))\s*[)]?[-\s\.]?' .
    '[(]?[0-9]{1,3}[)]?([-\s\.]?[0-9]{3})([-\s\.]?[0-9]{3,4})$/';

    /**
     * Make sure the phone Number is valid
     *
     * @param string $phoneNumber
     * @return string|null
     * @throws Exception
     */
    public static function validatePhoneNumber(string $phoneNumber): string
    {
        if (preg_match(self::PATTERN, $phoneNumber)) {
            return $phoneNumber;
        } else {
            throw new Exception('Invalid phone number');
        }
    }
}

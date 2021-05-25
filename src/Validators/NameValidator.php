<?php

namespace Portal\Validators;

use Exception;

class NameValidator
{
    private const PATTERN = "/^[a-z ,.'-]+$/i";

    /**
     * Make sure the Name is valid
     *
     * @param string $name
     * @return string|null
     * @throws Exception
     */
    public static function validateName(string $name): string
    {
        if (preg_match(self::PATTERN, $name)) {
            return $name;
        } else {
            throw new Exception('Please use alpha characters only');
        }
    }
}

<?php

namespace Portal\Validators;

class StringValidator
{
    public const MAXVARCHARLENGTH = 255;
    public const MAXTEXTLENGTH = 10000;
    private const ALPHAREGEXPATTERN = "/^[a-z ,.'-]+$/i";

    /**
     * Validate that a string exists and is within length allowed, throws an error if not
     *
     * @param string $validateData
     * @param int $characterLength
     * @param string $fieldName
     * @return string, which will return the validateData
     * @throws \Exception if the array is empty
     */
    public static function validateExistsAndLength(
        string $validateData,
        int $characterLength,
        string $fieldName = 'An'
    ): string {
        if (empty($validateData) == false && strlen($validateData) <= $characterLength) {
            return $validateData;
        } else {
            throw new \Exception('You have either not inputted any information for ' . $fieldName . ' or ' . '
            it exceeds our character limits');
        }
    }

    /**
     * Validate that a string is not empty and is within length allowed, throws an error if not
     *
     * @param string $validateData
     * @param int $characterLength
     * @param string $fieldName
     * @return bool which will return the validateData or assigns to null
     * @throws \Exception if the data exceeds max length
     *
     */
    public static function validateLength(
        string $validateData,
        int $characterLength,
        string $fieldName = 'Unknown'
    ): bool {
        if (strlen($validateData) > $characterLength) {
            throw new \Exception('You have either not inputted any information for ' . $fieldName . ' or ' . '
            it exceeds our character limits');
        }
        return true;
    }

    /**
     * Make sure the alpha string is valid
     *
     * @param string $alpha
     * @return string|null
     * @throws \Exception
     */
    public static function validateAlpha(string $alpha): string
    {
        if (preg_match(self::ALPHAREGEXPATTERN, $alpha)) {
            return $alpha;
        } else {
            throw new \Exception('Please use alpha characters only');
        }
    }
}

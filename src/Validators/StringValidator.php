<?php

namespace Portal\Validators;

class StringValidator
{
    /**
     * Validate that a string exists and is within length allowed, throws an error if not
     *
     * @param string $validateData
     * @param int $characterLength
     * @return string, which will return the validateData
     * @throws \Exception if the array is empty
     */
    public static function validateExistsAndLength(string $validateData, int $characterLength)
    {
        if (empty($validateData) == false && strlen($validateData) <= $characterLength) {
            return $validateData;
        } else {
            throw new \Exception('An input string does not exist or is too long');
        }
    }

    /**
     * Validate that a string is not empty and is within length allowed, throws an error if not
     *
     * @param string $validateData
     * @param int $characterLength
     * @return string, which will return the validateData or assigns to null
     * @throws \Exception if the array is empty
     *
     */
    public static function validateLength(string $validateData, int $characterLength)
    {
        if ($validateData == '') {
            return null;
        } elseif (strlen($validateData) <= $characterLength) {
            return $validateData;
        } else {
            throw new \Exception('An input string does not exist or is too long');
        }
    }

    /**
     * Sanitise as a string in the database table as data.
     *
     * @param $validateData . Type hinting removed here on purpose.
     * (type hinting as string causes errors in ApplicantEntity)
     *
     * @return string, which will return the validateData.
     */
    public static function sanitiseString($validateData)
    {
        $clean = filter_var($validateData, FILTER_SANITIZE_STRING);
        $clean = trim($clean);
        return $clean;
    }
}

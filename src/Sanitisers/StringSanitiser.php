<?php

namespace Portal\Sanitisers;

class StringSanitiser
{
    /**
     * Sanitise as a string in the database table as data.
     *
     * @param ?string $validateData string to be sanitised
     *
     * @return string the sanitised string.
     */
    public static function sanitiseString(?string $validateData): string
    {
        if ($validateData === null) {
            return '';
        }
        $clean = filter_var($validateData, FILTER_SANITIZE_STRING);
        $clean = trim($clean);
        return $clean;
    }
}

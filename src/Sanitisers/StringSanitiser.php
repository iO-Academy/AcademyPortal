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
        $clean = htmlspecialchars($validateData);
        return trim($clean);
    }
}

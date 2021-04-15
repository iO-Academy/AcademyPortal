<?php

namespace Portal\Validators;

class PleskValidator
{
    private const REGEX = '/^https:\/\/[0-9]{4}-[a-zA-Z]+\.dev.io-academy.uk[\/]?$/';

    public static function validate(string $url): bool
    {
        if (preg_match(self::REGEX, $url) != 1) {
            throw new \Exception('Invalid Plesk URL');
        }
        return true;
    }
}

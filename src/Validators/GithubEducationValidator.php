<?php

namespace Portal\Validators;

class GithubEducationValidator
{
    private const REGEX =
        '/^https:\/\/education.github.com\/student\/verify\?school_id=22531&student_id=[0-9]+&signature=[a-z0-9]+$/';

    public static function validate(string $url): bool
    {
        if (preg_match(self::REGEX, $url) != 1) {
            throw new \Exception('Invalid Github Education URL');
        }
        return true;
    }
}

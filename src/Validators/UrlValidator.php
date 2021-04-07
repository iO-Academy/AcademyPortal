<?php


namespace Portal\Validators;


class UrlValidator
{
    /**
     * Sanitise the applicant's url from the applicant's data.
     *
     * @param string $url
     *
     * @return string $url, returns valid url.
     * @return bool, returns false if invalid url.
     */
    public static function validateUrl($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }
}
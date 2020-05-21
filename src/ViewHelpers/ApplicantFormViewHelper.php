<?php

namespace Portal\ViewHelpers;

use Portal\Interfaces\ApplicantEntityInterface;

class ApplicantFormViewHelper
{
    public static function runMethod($applicantEntity, string $methodName): string
    {
        if (method_exists($applicantEntity, $methodName)) {
            return $applicantEntity->$methodName();
        }
        return '';
    }
}

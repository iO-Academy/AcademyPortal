<?php

namespace Portal\ViewHelpers;

class ApplicantFormViewHelper
{
    public static function runMethod($object, string $methodName)
    {
        if (method_exists($object, $methodName)) {
            return $object->$methodName();
        }
        return '';
    }
}

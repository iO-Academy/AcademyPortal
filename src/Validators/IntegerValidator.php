<?php

namespace Portal\Validators;

use phpDocumentor\Reflection\Types\Integer;

class IntegerValidator
{
    public static function validateInteger(int $integer, int $min, int $max) : Integer
    {
        if (filter_var($integer, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
            throw new Exception('Invalid number');;
        } else {
            return $integer;
        }
    }
}
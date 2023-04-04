<?php

namespace Portal\Validators;

class IntegerValidator
{
    public static function validateInteger(string $unvalidated, int $min, int $max): int
    {
//        int $test = $unvalidated;

        if (filter_var(intval($unvalidated), FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) !== false) {
            return $unvalidated;
        } else {
            throw new \Exception('Invalid number');
        }
    }
}
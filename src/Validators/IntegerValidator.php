<?php

namespace Portal\Validators;

class IntegerValidator
{
    /**
     * Validates that an integer is within the $min and $max range
     *
     * @throws \Exception if number out of range
     */
    public static function validateInteger(int $unvalidated, int $min, int $max): int
    {
        $options = ["options" => ["min_range" => $min, "max_range" => $max]];
        if (filter_var($unvalidated, FILTER_VALIDATE_INT, $options) !== false) {
            return $unvalidated;
        } else {
            throw new \Exception('Number out of range');
        }
    }
}

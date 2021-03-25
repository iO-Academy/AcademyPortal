<?php

namespace Portal\Validators;

class OptionsValidator
{
    /**
     * Takes a new option and validates the stageId exists, and is a number, and that optionTitle has content.
     * If all pass, returns true.
     * @param array $option
     * @return bool
     */
    public static function validateOption(array $option): bool
    {
        return (
            !empty($option['option']) &&
            (
                isset($option['stageId']) && is_numeric($option['stageId'])
            ) ||
            (
                isset($option['optionId']) && is_numeric($option['optionId'])
            )
        );
    }
}

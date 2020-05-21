<?php

namespace Portal\Validators;

class OptionsValidator
{

    /**
     * Takes an edited option and validates the optionId exists, and is a number, and that optionTitle has content.
     * If all pass, returns true.
     * @param array $option
     * @return bool
     */
    public static function validateOptionUpdate(array $option) : bool
    {
        return (isset($option['optionId']) && is_numeric($option['optionId']) && !empty($option['optionTitle']));
    }

    /**
     * Takes a new option and validates the stageId exists, and is a number, and that optionTitle has content.
     * If all pass, returns true.
     * @param array $option
     * @return bool
     */
    public static function validateOptionAdd(array $option) : bool
    {
        return (isset($option['stageId']) && is_numeric($option['stageId']) && !empty($option['title']));
    }
}

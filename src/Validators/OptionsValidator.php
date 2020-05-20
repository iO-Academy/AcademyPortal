<?php

namespace Portal\Validators;

class OptionValidator
{
    private static function validateOptionUpdate(array $option)
    {
        return (isset($option['optionId']) && is_numeric($option['optionId']) && !empty($option['option'])); //potential error option/optionTitle
    }

    private static function validateOptionAdd(array $option)
    {
        return (isset($option['stageId']) && is_numeric($option['stageId']) && !empty($option['optionTitle'])); //potential error option/optionTitle
    }
}

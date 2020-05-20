<?php

namespace Portal\Validators;

class OptionValidator
{
    private static function validateOption(array $option)
    {
        return (isset($option['optionId']) && is_numeric($option['optionId']) && !empty($option['optionTitle']));
    }
}

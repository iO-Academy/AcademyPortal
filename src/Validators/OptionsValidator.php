<?php

namespace Portal\Validators;

class OptionValidator
{
    private static function validateOption(array $option)
    {
        return (isset($option['id']) && is_numeric($option['id']) && !empty($option['option']) && !empty($option['order']));
    }
}

<?php

namespace Portal\Sanitisers;

use Portal\Validators\StringValidator;

class OptionsSanitiser
{
    public static function sanitise(array $option): array
    {
        $option['stageId'] = (int)$option['stageId'];
        $option['stageId'] = (int)$option['stageId'];
        $option['deleted'] = (int)$option['deleted'];
        try {
            StringValidator::validateLength($option['option'], StringValidator::MAXVARCHARLENGTH);
        } catch (\Exception $exception) {
            $option['option'] = substr($option['option'], 0, 254);
        }
        return $option;
    }
}

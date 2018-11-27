<?php

namespace Portal\ViewHelpers;

class AddHiringPartnerPageViewHelper
{
    public static function outputSizeBrackets($dropdownData) {
        $return = '';
        foreach ($dropdownData as $bracket) {
            $return .= '<option value="' . $bracket['id'] . '">' . $bracket['size'] . '</option>';
        }
        return $return;
    }
}
<?php

namespace Portal\ViewHelpers;

class AddHiringPartnerPageViewHelper
{
    /**
     * Creates a select option for each size bracket
     * @param array $dropdownData is data from database
     * @return string html to go in select tag
     */
    public static function outputSizeBrackets(array $dropdownData)
    {
        $return = '';
        foreach ($dropdownData as $bracket) {
            $return .= '<option value="' . $bracket['id'] . '">' . $bracket['size'] . '</option>';
        }
        return $return;
    }
}
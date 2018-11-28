<?php

namespace Portal\ViewHelpers;

class AddEventPageViewHelper
{
    public static function populateDropdown($dropdownData)
    {
        $return = '';
        foreach ($dropdownData as $eventType) {
            $return .= '<option value="' . $eventType['id'] . '">' . $eventType['type'] . '</option>';
        }
        return $return;
    }
}
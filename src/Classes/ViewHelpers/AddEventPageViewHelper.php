<?php

namespace Portal\ViewHelpers;

class AddEventPageViewHelper
{
    /**
     * populates options for a select dropdown with event types
     * @param array $dropdownData contains id and type name for each event type
     * @return string html to output into select dropdown
     */
    public static function populateDropdown(array $dropdownData)
    {
        $return = '';
        foreach ($dropdownData as $eventType) {
            $return .= '<option value="' . $eventType['id'] . '">' . $eventType['type'] . '</option>';
        }
        return $return;
    }
}
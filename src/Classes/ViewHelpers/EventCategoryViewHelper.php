<?php

namespace Portal\ViewHelpers;

class EventCategoryViewHelper
{
    public static function eventCategoryDropdown($data)
    {
        $eventCategoryDropdown = '';
        foreach ($data['eventCategories'] as $eventCategory) {
            $eventCategoryDropdown .= 
            '<option value=' . $eventCategory['id'] . '>' . $eventCategory['name'] . '</option>';
        }
        return $eventCategoryDropdown;
    }
}

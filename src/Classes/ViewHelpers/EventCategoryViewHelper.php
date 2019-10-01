<?php

namespace Portal\ViewHelpers;

class EventCategoryViewHelper
{

    /**
     * Takes event category data and renderers html elemt for events category dropdown
     *
     * @param array $data
     * @return string
     */
    public static function eventCategoryDropdown(array $data) : string
    {
        $eventCategoryDropdown = '';
        foreach ($data['eventCategories'] as $eventCategory) {
            $eventCategoryDropdown .=
            '<option value=' . $eventCategory['id'] . '>' . $eventCategory['name'] . '</option>';
        }
        return $eventCategoryDropdown;
    }
}

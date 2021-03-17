<?php

namespace Portal\ViewHelpers;

class EventCategoryViewHelper
{

    /**
     * Takes event category data and returns html for events category dropdown in an <option> format
     *
     * @param array $data
     * @return string
     */
    public static function eventCategoryDropdown(array $data): string
    {
        $eventCategoryDropdown = '';
        if (!empty($data['eventCategories'])) {
            foreach ($data['eventCategories'] as $eventCategory) {
                $eventCategoryDropdown .=
                    '<option value="' . $eventCategory['id'] . '">' . $eventCategory['name'] . '</option>';
            }
        }
        return $eventCategoryDropdown;
    }
}

<?php

namespace Portal\ViewHelpers;

class AddCourseViewHelper
{
    public static function courseCategoryDropdown(array $categories): string
    {
        $courseCategoryDropdown = '';
        foreach ($categories as $category) {
                $courseCategoryDropdown .=
                    '<option value="' . $category['id'] . '">'
                    . $category['category'] . '</option>';
        }
        return $courseCategoryDropdown;
    }
}

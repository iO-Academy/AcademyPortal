<?php

namespace Portal\ViewHelpers;

class AddCourseViewHelper
{
    public static function courseCategoryDropdown(array $categories, $courseCatId): string
    {
        $courseCategoryDropdown = '';
        foreach ($categories as $category) {
            $selected = $category['id'] === $courseCatId;
            $courseCategoryDropdown .=
                '<option selected="' . $selected . '" value="' . $category['id'] . '">
                ' . $category['category'] . '</option>';
            var_dump($category);
        }
        return $courseCategoryDropdown;
    }
}


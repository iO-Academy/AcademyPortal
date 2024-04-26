<?php

namespace Portal\ViewHelpers;

class AddCourseViewHelper
{
    public static function courseCategoryDropdown(array $categories, int $courseCatId = -1): string
    {
        $courseCategoryDropdown = '';
        foreach ($categories as $category) {
            if ($courseCatId === -1) {
                $courseCategoryDropdown .=
                    '<option value="' . $category['id'] . '">'
                    . $category['category'] . '</option>';
            } else {
                $selected = $category['id'] === $courseCatId ? 'selected' : '';
                $courseCategoryDropdown .=
                    '<option selected="' . $selected . '" value="' . $category['id'] . '">'
                    . $category['category'] . '</option>';
            }
        }
        return $courseCategoryDropdown;
    }
}

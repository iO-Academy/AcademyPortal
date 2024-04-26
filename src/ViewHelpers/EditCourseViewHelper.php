<?php

namespace Portal\ViewHelpers;

class EditCourseViewHelper
{
    public static function courseEditCategoryDropdown(array $categories, int $courseCatId): string
    {
        $courseCategoryDropdown = '';
        foreach ($categories as $category) {
            $selected = $category['id'] === $courseCatId ? 'selected' : '';
            $courseCategoryDropdown .=
                '<option selected="' . $selected . '" value="' . $category['id'] . '">'
                . $category['category'] . '</option>';
        }
        return $courseCategoryDropdown;
    }
}

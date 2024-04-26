<?php

namespace Portal\ViewHelpers;

class EditCourseViewHelper
{
    public static function courseEditCategoryDropdown(array $categories, string $courseCatId): string
    {
        $courseCategoryDropdown = '';
        foreach ($categories as $category) {
            $selected = $category['id'] == $courseCatId ? 'selected' : '';
            $courseCategoryDropdown .=
                '<option ' . $selected . ' value="' . $category['id'] . '">'
                . $category['category'] . '</option>';
        }
        return $courseCategoryDropdown;
    }
}

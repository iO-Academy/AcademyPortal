<?php

namespace Portal\ViewHelpers;

class AddCourseViewHelper
{
    public static function courseCategoryDropdown(array $categories, string $selectedCategory = null): string
    {
        $courseCategoryDropdown = '';
        foreach ($categories as $category) {
            $courseCategoryDropdown .=
                '<option value="' . $category['id'] . '"';
            if ($selectedCategory && $category['category'] === $selectedCategory) {
                $courseCategoryDropdown .= 'selected';
            }
                $courseCategoryDropdown .=  '>' . $category['category'] . '</option>';
        }
        return $courseCategoryDropdown;
    }
}

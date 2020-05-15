<?php

namespace Portal\Validators;

class EventValidator
{
    /**
     * Make sure that the category exists
     *
     * @param int $category
     * @param array $categoryList
     */
    public static function validateCategoryExists(int $category, array $categoryList)
    {
        $zeroIndexCat = intval($category) - 1;
        if (array_key_exists($zeroIndexCat, $categoryList)) {
            return $category;
        } else {
            throw new \Exception('Category is not valid.');
        }
    }
}

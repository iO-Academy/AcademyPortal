<?php

namespace Portal\Validators;

class EventValidator
{
    public static function validate(array $event): bool
    {
        StringValidator::validateExistsAndLength($event['name'], StringValidator::MAXVARCHARLENGTH, 'name');
        StringValidator::validateExistsAndLength($event['location'], StringValidator::MAXVARCHARLENGTH, 'location');
        DateTimeValidator::validateDate($event['date']);
        DateTimeValidator::validateTime($event['startTime']);
        DateTimeValidator::validateTime($event['endTime']);
        DateTimeValidator::validateStartEndTime($event['startTime'], $event['endTime']);
        if (!is_null($event['notes'])) {
            StringValidator::validateLength($event['notes'], 5000, 'notes');
        }
        return true;
    }

    /**
     * Make sure that the category exists
     *
     * @param int $category
     * @param array $categoryList
     */
    public static function validateCategoryExists(int $category, array $categoryList): bool
    {
        $zeroIndexCat = intval($category) - 1;
        if (array_key_exists($zeroIndexCat, $categoryList)) {
            return true;
        } else {
            throw new \Exception('Category is not valid.');
        }
    }
}

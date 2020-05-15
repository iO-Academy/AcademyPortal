<?php

namespace Tests\Validators;

use Portal\Validators\EventValidator;
use Tests\TestCase;

class EventValidatorTest extends TestCase
{
    public function testValidateCategoryExistsSuccess()
    {
        $category = 3;
        $categoryList = ['1' => 'Other', '2' => 'Tasty', '3' => 'Armageddon', '4' => 'Visit'];
        $expected = 3;
        $result = EventValidator::validateCategoryExists($category, $categoryList);
        $this->assertEquals($expected, $result);
    }

    public function testValidateCategoryExistsInvalidCategory()
    {
        $category = 9;
        $categoryList = ['1' => 'Other', '2' => 'Tasty', '3' => 'Armageddon', '4' => 'Visit'];
        $this->expectException(\Exception::class);
        EventValidator::validateCategoryExists($category, $categoryList);
    }
}

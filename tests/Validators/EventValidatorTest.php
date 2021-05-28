<?php

namespace Tests\Validators;

use Portal\Validators\EventValidator;
use Tests\TestCase;

class EventValidatorTest extends TestCase
{
    public function testValidate()
    {
        $this->markTestSkipped('Cannot unit test as method calls other methods');
    }

    public function testValidateCategoryExistsSuccess()
    {
        $category = 3;
        $categoryList = ['1' => 'Other', '2' => 'Tasty', '3' => 'Armageddon', '4' => 'Visit'];
        $result = EventValidator::validateCategoryExists($category, $categoryList);
        $this->assertTrue($result);
    }

    public function testValidateCategoryExistsInvalidCategory()
    {
        $category = 9;
        $categoryList = ['1' => 'Other', '2' => 'Tasty', '3' => 'Armageddon', '4' => 'Visit'];
        $this->expectException(\Exception::class);
        EventValidator::validateCategoryExists($category, $categoryList);
    }
}

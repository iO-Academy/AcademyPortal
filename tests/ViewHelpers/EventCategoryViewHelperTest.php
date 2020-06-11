<?php

namespace Tests\ViewHelpers;

use PHPUnit\Framework\TestCase;
use Portal\ViewHelpers\EventCategoryViewHelper;

class EventCategoryViewHelperTest extends TestCase
{
    public function testSuccessEventCategoryDropdown()
    {
        $expected = '<option value="1">Name 1</option><option value="2">Name 2</option>';

        $data = [
            'eventCategories' => [
                ['id' => 1, 'name' => 'Name 1'],
                ['id' => 2, 'name' => 'Name 2']
            ]
        ];
        $result = EventCategoryViewHelper::eventCategoryDropdown($data);
        $this->assertEquals($expected, $result);
    }

    public function testFailureEventCategoryDropdownIncorrectData()
    {
        $result = EventCategoryViewHelper::eventCategoryDropdown([]);
        $this->assertEquals('', $result);
    }

    public function testFailureEventCategoryDropdownIncorrectData2()
    {
        $data = [
            'eventCategories' => []
        ];
        $result = EventCategoryViewHelper::eventCategoryDropdown($data);
        $this->assertEquals('', $result);
    }
}

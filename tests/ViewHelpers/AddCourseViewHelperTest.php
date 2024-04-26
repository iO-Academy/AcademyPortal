<?php

namespace Tests\ViewHelpers;

use Portal\ViewHelpers\AddCourseViewHelper;
use PHPUnit\Framework\TestCase;

class AddCourseViewHelperTest extends TestCase
{
    public function testCourseCategoryDropdownSuccess()
    {
        $categories = [
            ['id' => 1, 'category' => 'Gladiator', 'deleted' => 0],
            ['id' => 2, 'category' => '300', 'deleted' => 0]
        ];
        $courseCatId = 1;
        $expected = '<option selected="selected" value="1">Gladiator</option>'
                    . '<option selected="" value="2">300</option>';
        $result = AddCourseViewHelper::courseCategoryDropdown($categories, $courseCatId);
        $this->assertSame($expected, $result);
    }

    public function testCourseCategoryDropdownMalformed()
    {
        $categories = 5;
        $this->expectException(\TypeError::class);
        $result = AddCourseViewHelper::courseCategoryDropdown($categories, $courseCatId);
    }
}

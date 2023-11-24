<?php

namespace Tests\ViewHelpers;

use Portal\ViewHelpers\CourseCategoriesViewHelper;
use PHPUnit\Framework\TestCase;

class CourseCategoriesHelperTest extends TestCase
{
    public function testDisplayCourseCategoriesSuccess()
    {
        $categories = [
            ['id' => 1, 'category' => 'Gladiator', 'deleted' => 0]
        ];
        $expected =
            '<tr>
                    <td>Gladiator</td>
                    <td> <a
                            href="#"
                            type="delete"
                            class="btn btn-danger delete deleteCatBtn"
                            data-id="1">
                            Delete
                         </a>
                     </td>
                 </tr>';
        $result = CourseCategoriesViewHelper::displayCourseCategories($categories);
        $this->assertSame($expected, $result);
    }

    public function testDisplayCourseCategoriesMalformed()
    {
        $categories = 5;
        $this->expectException(\TypeError::class);
        $result = CourseCategoriesViewHelper::displayCourseCategories($categories);
    }
}

<?php

namespace Tests\ViewHelpers;

use PHPUnit\Framework\TestCase;
use Portal\Entities\CourseEntity;
use Portal\ViewHelpers\DisplayCoursesViewHelper;

class DisplayCoursesViewHelperTest extends TestCase
{
    public function testSuccessDisplayCourse()
    {
        $expected = '<tr>
                    <td>1</td>
                    <td>1 January 2021</td>
                    <td>30 March 2021</td>
                    <td>Defence Against the Dark JSON</td>
                    <td>Harry Potter</td>
                    <td></td>
                </tr>';
        $entityMock = $this->createMock(CourseEntity::class);
        $entityMock->method('getId')->willReturn(1);
        $entityMock->method('getStartDate')->willReturn('1 January 2021');
        $entityMock->method('getEndDate')->willReturn('30 March 2021');
        $entityMock->method('getName')->willReturn('Defence Against the Dark JSON');
        $entityMock->method('getTrainer')->willReturn('Harry Potter');
        $entityMock->method('getNotes')->willReturn('');
        $data = [$entityMock];
        $result = DisplayCoursesViewHelper::displayCourses($data);
        $this->assertEquals($expected, $result);
    }

    public function testFailureDisplayCourse()
    {
        $expected = '<tr><td colspan="6"><h5 class="text-danger text-center">No Courses Found.</h5></td></tr>';
        $result = DisplayCoursesViewHelper::displayCourses([]);
        $this->assertEquals($expected, $result);
    }
}

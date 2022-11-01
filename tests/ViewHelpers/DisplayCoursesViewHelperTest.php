<?php

namespace Tests\ViewHelpers;

use PHPUnit\Framework\TestCase;
use Portal\Entities\CourseEntity;
use Portal\ViewHelpers\DisplayCoursesViewHelper;

class DisplayCoursesViewHelperTest extends TestCase
{
    public function testSuccessOneTrainerDisplayCourse()
    {
        $expected = '<tr>
                    <td>1</td>
                    <td>1 January 2021</td>
                    <td>30 March 2021</td>
                    <td>Defence Against the Dark JSON</td>
                    <td><p>Charlie</p></td>
                    <td></td>
                    <td>&#x2713;</td>
                    <td>&#x10102</td>
                </tr>';
        $entityMock = $this->createMock(CourseEntity::class);
        $entityMock->method('getId')->willReturn(1);
        $entityMock->method('getStartDate')->willReturn('1 January 2021');
        $entityMock->method('getEndDate')->willReturn('30 March 2021');
        $entityMock->method('getName')->willReturn('Defence Against the Dark JSON');
        $entityMock->method('getNotes')->willReturn('');
        $entityMock->method('getRemote')->willReturn('0');
        $entityMock->method('getInPerson')->willReturn('1');
        $courses = [$entityMock];
        $trainers = [['course_id' => '1', 'name' => 'Charlie', 'deleted' => '0'] ];
        $result = DisplayCoursesViewHelper::displayCourses($courses, $trainers);
        $this->assertEquals($expected, $result);
    }

    public function testSuccessTwoTrainersDisplayCourse()
    {
        $expected = '<tr>
                    <td>1</td>
                    <td>1 January 2021</td>
                    <td>30 March 2021</td>
                    <td>Defence Against the Dark JSON</td>
                    <td><p>Charlie</p><p>Neal</p></td>
                    <td></td>
                    <td>&#x2713;</td>
                    <td>&#x10102</td>
                </tr>';
        $entityMock = $this->createMock(CourseEntity::class);
        $entityMock->method('getId')->willReturn(1);
        $entityMock->method('getStartDate')->willReturn('1 January 2021');
        $entityMock->method('getEndDate')->willReturn('30 March 2021');
        $entityMock->method('getName')->willReturn('Defence Against the Dark JSON');
        $entityMock->method('getNotes')->willReturn('');
        $entityMock->method('getRemote')->willReturn('0');
        $entityMock->method('getInPerson')->willReturn('1');
        $courses = [$entityMock];
        $trainers = [
            ['course_id' => '1', 'name' => 'Charlie', 'deleted' => '0'],
            ['course_id' => '1', 'name' => 'Neal', 'deleted' => '0']
        ];
        $result = DisplayCoursesViewHelper::displayCourses($courses, $trainers);
        $this->assertEquals($expected, $result);
    }

    public function testSuccessOneDeletedTrainerDisplayCourse()
    {
        $expected = '<tr>
                    <td>1</td>
                    <td>1 January 2021</td>
                    <td>30 March 2021</td>
                    <td>Defence Against the Dark JSON</td>
                    <td><p class="trainer-deleted-indicator">Charlie</p></td>
                    <td></td>
                    <td>&#x2713;</td>
                    <td>&#x10102</td>
                </tr>';
        $entityMock = $this->createMock(CourseEntity::class);
        $entityMock->method('getId')->willReturn(1);
        $entityMock->method('getStartDate')->willReturn('1 January 2021');
        $entityMock->method('getEndDate')->willReturn('30 March 2021');
        $entityMock->method('getName')->willReturn('Defence Against the Dark JSON');
        $entityMock->method('getNotes')->willReturn('');
        $entityMock->method('getRemote')->willReturn('0');
        $entityMock->method('getInPerson')->willReturn('1');
        $courses = [$entityMock];
        $trainers = [['course_id' => '1', 'name' => 'Charlie', 'deleted' => '1'] ];
        $result = DisplayCoursesViewHelper::displayCourses($courses, $trainers);
        $this->assertEquals($expected, $result);
    }

    public function testSuccessOneDeletedTwoTrainersDisplayCourse()
    {
        $expected = '<tr>
                    <td>1</td>
                    <td>1 January 2021</td>
                    <td>30 March 2021</td>
                    <td>Defence Against the Dark JSON</td>
                    <td><p class="trainer-deleted-indicator">Charlie</p><p>Neal</p></td>
                    <td></td>
                    <td>&#x2713;</td>
                    <td>&#x10102</td>
                </tr>';
        $entityMock = $this->createMock(CourseEntity::class);
        $entityMock->method('getId')->willReturn(1);
        $entityMock->method('getStartDate')->willReturn('1 January 2021');
        $entityMock->method('getEndDate')->willReturn('30 March 2021');
        $entityMock->method('getName')->willReturn('Defence Against the Dark JSON');
        $entityMock->method('getNotes')->willReturn('');
        $entityMock->method('getRemote')->willReturn('0');
        $entityMock->method('getInPerson')->willReturn('1');
        $courses = [$entityMock];
        $trainers = [
            ['course_id' => '1', 'name' => 'Charlie', 'deleted' => '1'],
            ['course_id' => '1', 'name' => 'Neal', 'deleted' => '0']
        ];
        $result = DisplayCoursesViewHelper::displayCourses($courses, $trainers);
        $this->assertEquals($expected, $result);
    }

    public function testSuccessZeroTrainersDisplayCourse()
    {
        $expected = '<tr>
                    <td>1</td>
                    <td>1 January 2021</td>
                    <td>30 March 2021</td>
                    <td>Defence Against the Dark JSON</td>
                    <td>No trainers assigned</td>
                    <td></td>
                    <td>&#x2713;</td>
                    <td>&#x10102</td>
                </tr>';
        $entityMock = $this->createMock(CourseEntity::class);
        $entityMock->method('getId')->willReturn(1);
        $entityMock->method('getStartDate')->willReturn('1 January 2021');
        $entityMock->method('getEndDate')->willReturn('30 March 2021');
        $entityMock->method('getName')->willReturn('Defence Against the Dark JSON');
        $entityMock->method('getNotes')->willReturn('');
        $entityMock->method('getRemote')->willReturn('0');
        $entityMock->method('getInPerson')->willReturn('1');
        $courses = [$entityMock];
        $trainers = [];
        $result = DisplayCoursesViewHelper::displayCourses($courses, $trainers);
        $this->assertEquals($expected, $result);
    }

    public function testMalformedDisplayCourse()
    {
        $input = '';
        $input2 = '1';
        $this->expectException(\Error::class);
        $actual = DisplayCoursesViewHelper::displayCourses($input, $input2);
    }

    public function testFailureDisplayCourse()
    {
        $expected = '<tr><td colspan="6"><h5 class="text-danger text-center">No Courses Found.</h5></td></tr>';
        $result = DisplayCoursesViewHelper::displayCourses([], []);
        $this->assertEquals($expected, $result);
    }

    public function testSuccessFilterCoursesByTrainers()
    {
        $input = [
            ['course_id' => '1', 'name' => 'Charlie'],
            ['course_id' => '1', 'name' => 'Neal'],
            ['course_id' => '2', 'name' => 'Charlie']
        ];
        $input2 = '1';
        $exp = [
            ['course_id' => '1', 'name' => 'Charlie'],
            ['course_id' => '1', 'name' => 'Neal']
        ];
        $result = DisplayCoursesViewHelper::filterCoursesByTrainers($input, $input2);
        $this->assertEquals($exp, $result);
    }

    public function testFailureFilterCoursesByTrainers()
    {
        $input = [];
        $input2 = '1';
        $exp = [];
        $result = DisplayCoursesViewHelper::filterCoursesByTrainers($input, $input2);
        $this->assertEquals($exp, $result);
    }

    public function testMalformedFilterCoursesByTrainers()
    {
        $input = '';
        $input2 = '1';
        $this->expectException(\Error::class);
        $actual = DisplayCoursesViewHelper::filterCoursesByTrainers($input, $input2);
    }
}

<?php

namespace Tests\ViewHelpers;

use PHPUnit\Framework\TestCase;
use Portal\Entities\CourseEntity;
use Portal\Entities\CompleteCourseEntity;
use Portal\ViewHelpers\DisplayCoursesViewHelper;

class DisplayCoursesViewHelperTest extends TestCase
{
    /**
     * This test is actually an integration test written by a previous group
     * */
    public function testSuccessOneTrainerDisplayFutureCourses()
    {
        $expected = '<tr>
                    <td>1</td>
                    <td>01/01/2021</td>
                    <td>30/03/2021</td>
                    <td>Defence Against the Dark JSON</td>
                    <td>
                        <span class="badge badge-color-DarkJSON">Dark JSON</span>
                    </td>
                    <td>Charlie</td>
                    <td></td>
                    <td>In-Person</td>
                    <td><span class="filled-places badge">Filled: 4' .
            '</span> <span class="total-places badge">Total: 8' .
            '</span>
                    </td>
                </tr>';
        $entityMock = $this->createMock(CompleteCourseEntity::class);
        $entityMock->method('getId')->willReturn(1);
        $entityMock->method('getStartDate')->willReturn('2021-01-01');
        $entityMock->method('getEndDate')->willReturn('2021-03-30');
        $entityMock->method('getName')->willReturn('Defence Against the Dark JSON');
        $entityMock->method('getCategory')->willReturn('Dark JSON');
        $entityMock->method('getNotes')->willReturn('');
        $entityMock->method('getRemote')->willReturn('0');
        $entityMock->method('getInPerson')->willReturn('1');
        $entityMock->method('getTotalAvailableSpaces')->willReturn('8');
        $entityMock->method('getSpacesTaken')->willReturn('4');
        $courses = [$entityMock];
        $trainers = [['course_id' => '1', 'name' => 'Charlie', 'deleted' => '0']];
        $result = DisplayCoursesViewHelper::displayFutureCourses($courses, $trainers);
        $this->assertEquals($expected, $result);
    }

    /**
     * This test is actually an integration test written by a previous group
     * */
    public function testSuccessTwoTrainersDisplayFutureCourses()
    {
        $expected = '<tr>
                    <td>1</td>
                    <td>01/01/2021</td>
                    <td>30/03/2021</td>
                    <td>Defence Against the Dark JSON</td>
                    <td>
                        <span class="badge badge-color-DarkJSON">Dark JSON</span>
                    </td>
                    <td>Charlie Neal</td>
                    <td></td>
                    <td>In-Person</td>
                    <td><span class="filled-places badge">Filled: 4' .
            '</span> <span class="total-places badge">Total: 8' .
            '</span>
                    </td>
                </tr>';
        $entityMock = $this->createMock(CompleteCourseEntity::class);
        $entityMock->method('getId')->willReturn(1);
        $entityMock->method('getStartDate')->willReturn('2021-01-01');
        $entityMock->method('getEndDate')->willReturn('2021-03-30');
        $entityMock->method('getName')->willReturn('Defence Against the Dark JSON');
        $entityMock->method('getCategory')->willReturn('Dark JSON');
        $entityMock->method('getNotes')->willReturn('');
        $entityMock->method('getRemote')->willReturn('0');
        $entityMock->method('getInPerson')->willReturn('1');
        $entityMock->method('getTotalAvailableSpaces')->willReturn('8');
        $entityMock->method('getSpacesTaken')->willReturn('4');
        $courses = [$entityMock];
        $trainers = [
            ['course_id' => '1', 'name' => 'Charlie', 'deleted' => '0'],
            ['course_id' => '1', 'name' => 'Neal', 'deleted' => '0']
        ];
        $result = DisplayCoursesViewHelper::displayFutureCourses($courses, $trainers);
        $this->assertEquals($expected, $result);
    }

    /**
     * This test is actually an integration test written by a previous group
     * */
    public function testSuccessOneDeletedTrainerDisplayFutureCourses()
    {
        $expected = '<tr>
                    <td>1</td>
                    <td>01/01/2021</td>
                    <td>30/03/2021</td>
                    <td>Defence Against the Dark JSON</td>
                    <td>
                        <span class="badge badge-color-DarkJSON">Dark JSON</span>
                    </td>
                    <td><p class="trainer-deleted-indicator">Charlie</p></td>
                    <td></td>
                    <td>In-Person</td>
                    <td><span class="filled-places badge">Filled: 4' .
            '</span> <span class="total-places badge">Total: 8' .
            '</span>
                    </td>
                </tr>';
        $entityMock = $this->createMock(CompleteCourseEntity::class);
        $entityMock->method('getId')->willReturn(1);
        $entityMock->method('getStartDate')->willReturn('2021-01-01');
        $entityMock->method('getEndDate')->willReturn('2021-03-30');
        $entityMock->method('getName')->willReturn('Defence Against the Dark JSON');
        $entityMock->method('getNotes')->willReturn('');
        $entityMock->method('getCategory')->willReturn('Dark JSON');
        $entityMock->method('getRemote')->willReturn('0');
        $entityMock->method('getInPerson')->willReturn('1');
        $entityMock->method('getTotalAvailableSpaces')->willReturn('8');
        $entityMock->method('getSpacesTaken')->willReturn('4');
        $courses = [$entityMock];
        $trainers = [['course_id' => '1', 'name' => 'Charlie', 'deleted' => '1']];
        $result = DisplayCoursesViewHelper::displayFutureCourses($courses, $trainers);
        $this->assertEquals($expected, $result);
    }

    /**
     * This test is actually an integration test written by a previous group
     * */
    public function testSuccessOneDeletedTwoTrainersDisplayFutureCourse()
    {
        $expected = '<tr>
                    <td>1</td>
                    <td>01/01/2021</td>
                    <td>30/03/2021</td>
                    <td>Defence Against the Dark JSON</td>
                    <td>
                        <span class="badge badge-color-DarkJSON">Dark JSON</span>
                    </td>
                    <td><p class="trainer-deleted-indicator">Charlie</p> Neal</td>
                    <td></td>
                    <td>In-Person</td>
                    <td><span class="filled-places badge">Filled: 4' .
            '</span> <span class="total-places badge">Total: 8' .
            '</span>
                    </td>
                </tr>';
        $entityMock = $this->createMock(CompleteCourseEntity::class);
        $entityMock->method('getId')->willReturn(1);
        $entityMock->method('getStartDate')->willReturn('2021-01-01');
        $entityMock->method('getEndDate')->willReturn('2021-03-30');
        $entityMock->method('getName')->willReturn('Defence Against the Dark JSON');
        $entityMock->method('getCategory')->willReturn('Dark JSON');
        $entityMock->method('getNotes')->willReturn('');
        $entityMock->method('getRemote')->willReturn('0');
        $entityMock->method('getInPerson')->willReturn('1');
        $entityMock->method('getTotalAvailableSpaces')->willReturn('8');
        $entityMock->method('getSpacesTaken')->willReturn('4');
        $courses = [$entityMock];
        $trainers = [
            ['course_id' => '1', 'name' => 'Charlie', 'deleted' => '1'],
            ['course_id' => '1', 'name' => 'Neal', 'deleted' => '0']
        ];
        $result = DisplayCoursesViewHelper::displayFutureCourses($courses, $trainers);
        $this->assertEquals($expected, $result);
    }

    /**
     * This test is actually an integration test written by a previous group
     * */
    public function testSuccessZeroTrainersDisplayFutureCourse()
    {
        $expected = '<tr>
                    <td>1</td>
                    <td>01/01/2021</td>
                    <td>30/03/2021</td>
                    <td>Defence Against the Dark JSON</td>
                    <td>
                        <span class="badge badge-color-DarkJSON">Dark JSON</span>
                    </td>
                    <td>No trainers assigned</td>
                    <td></td>
                    <td>In-Person</td>
                    <td><span class="filled-places badge">Filled: 4' .
            '</span> <span class="total-places badge">Total: 8' .
            '</span>
                    </td>
                </tr>';
        $entityMock = $this->createMock(CompleteCourseEntity::class);
        $entityMock->method('getId')->willReturn(1);
        $entityMock->method('getStartDate')->willReturn('2021-01-01');
        $entityMock->method('getEndDate')->willReturn('2021-03-30');
        $entityMock->method('getName')->willReturn('Defence Against the Dark JSON');
        $entityMock->method('getCategory')->willReturn('Dark JSON');
        $entityMock->method('getNotes')->willReturn('');
        $entityMock->method('getRemote')->willReturn('0');
        $entityMock->method('getInPerson')->willReturn('1');
        $entityMock->method('getTotalAvailableSpaces')->willReturn('8');
        $entityMock->method('getSpacesTaken')->willReturn('4');
        $courses = [$entityMock];
        $trainers = [];
        $result = DisplayCoursesViewHelper::displayFutureCourses($courses, $trainers);
        $this->assertEquals($expected, $result);
    }

    /**
     * This test is actually an integration test written by a previous group
     * */
    public function testMalformedDisplayFutureCourse()
    {
        $input = '';
        $input2 = '1';
        $this->expectException(\Error::class);
        $actual = DisplayCoursesViewHelper::displayFutureCourses($input, $input2);
    }

    /**
     * This test is actually an integration test written by a previous group
     * */
    public function testFailureDisplayFutureCourse()
    {
        $expected = '<tr><td colspan="9"><h5 class="text-danger text-center">No Courses Found</h5></td></tr>';
        $result = DisplayCoursesViewHelper::displayFutureCourses([], []);
        $this->assertEquals($expected, $result);
    }

    public function testSuccessCreateCoursesTableLoop()
    {
        $this->markTestSkipped('Integration Test Required');
    }

    public function testMalformedCreateCoursesTableLoop()
    {
        $this->markTestSkipped('Integration Test Required');
    }

    public function testFailureCreateCoursesTableLoop()
    {
        $this->markTestSkipped('Integration Test Required');
    }

    public function testSuccessDisplayOngoingCourses()
    {
        $this->markTestSkipped('Integration Test Required');
    }

    public function testMalformedDisplayOngoingCourses()
    {
        $this->markTestSkipped('Integration Test Required');
    }

    public function testFailureDisplayOngoingCourses()
    {
        $this->markTestSkipped('Integration Test Required');
    }

    public function testSuccessOngoingCoursesPresentDisplayOngoingCoursesHeading()
    {
        $ongoingCourses = true;
        $result = DisplayCoursesViewHelper::displayOngoingCoursesHeading($ongoingCourses);
        $expected = '<tr><td colspan="9"><h5 class="text-success text-center">Ongoing Courses</h5></td></tr>';
        $this->assertEquals($expected, $result);
    }

    public function testSuccessNoOngoingCoursesDisplayOngoingCoursesHeading()
    {
        $ongoingCourses = false;
        $result = DisplayCoursesViewHelper::displayOngoingCoursesHeading($ongoingCourses);
        $expected = '';
        $this->assertEquals($expected, $result);
    }

    public function testMalformedDisplayOngoingCoursesHeading()
    {
        $this->expectException(\TypeError::class);
        DisplayCoursesViewHelper::displayOngoingCoursesHeading([]);
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

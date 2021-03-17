<?php

namespace Tests\Entities;

use Portal\Entities\CourseEntity;
use Exception;
use Tests\TestCase;
use TypeError;

class CourseEntityTest extends TestCase
{
    public function testGetStartDateSuccess()
    {
        $name = new CourseEntity(
            '2020-02-02',
            '2020-05-01',
            'Course X',
            'Bob',
            'nothing much',
            1
        );
        $result = $name->getStartDate();
        $this->assertEquals($result, '2020-02-02');
    }

    public function testGetEndDateSuccess()
    {
        $name = new CourseEntity(
            '2020-02-02',
            '2020-05-01',
            'Course X',
            'Bob',
            'nothing much',
            1
        );
        $result = $name->getEndDate();
        $this->assertEquals($result, '2020-05-01');
    }

    public function testGetNameSuccess()
    {
        $name = new CourseEntity(
            '2020-02-02',
            '2020-05-01',
            'Course X',
            'Bob',
            'nothing much',
            1
        );
        $result = $name->getName();
        $this->assertEquals($result, 'Course X');
    }

    public function testGetTrainerSuccess()
    {
        $name = new CourseEntity(
            '2020-02-02',
            '2020-05-01',
            'Course X',
            'Bob',
            'nothing much',
            1
        );
        $result = $name->getTrainer();
        $this->assertEquals($result, 'Bob');
    }

    public function testGetNotesSuccess()
    {
        $name = new CourseEntity(
            '2020-02-02',
            '2020-05-01',
            'Course X',
            'Bob',
            'nothing much',
            1
        );
        $result = $name->getNotes();
        $this->assertEquals($result, 'nothing much');
    }

    public function testGetIdSuccess()
    {
        $name = new CourseEntity(
            '2020-02-02',
            '2020-05-01',
            'Course X',
            'Bob',
            'nothing much',
            1
        );
        $result = $name->getId();
        $this->assertEquals($result, 1);
    }

    public function testNewCourseEntitySuccess()
    {
        $newCourseEntity = new CourseEntity(
            '2020-02-02',
            '2020-05-01',
            'Course X',
            'Bob',
            'nothing much',
            1
        );
        $this->assertInstanceOf(CourseEntity::class, $newCourseEntity);
    }
}

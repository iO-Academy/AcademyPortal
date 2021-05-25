<?php

namespace Tests\Validators;

use Portal\Validators\DateTimeValidator;
use Tests\TestCase;

class DateTimeValidatorTest extends TestCase
{
    public function testValidateStartEndTimeSuccess()
    {
        $startTime = '18:00';
        $endTime = '20:00';
        $result = DateTimeValidator::validateStartEndTime($startTime, $endTime);
        $this->assertEquals($result, true);
    }

    public function testValidateStartEndTimeFailure()
    {
        $startTime = '22:00';
        $endTime = '20:00';
        $this->expectException(\Exception::class);
        DateTimeValidator::validateStartEndTime($startTime, $endTime);
    }

    public function testValidateTimeSuccess()
    {
        $time = '18:00';
        $result = DateTimeValidator::validateTime($time);
        $this->assertEquals($result, $time);
    }

    public function testValidateTimeFailure()
    {
        $time = 'This is not how time looks like';
        $this->expectException(\Exception::class);
        DateTimeValidator::validateTime($time);
    }

    public function testValidateDateSuccess()
    {
        $date = '2019-10-01';
        $result = DateTimeValidator::validateDate($date);
        $this->assertEquals($result, '2019-10-01');
    }

    public function testValidateDateFailure()
    {
        $date = 'This is not how date looks like';
        $this->expectException(\Exception::class);
        DateTimeValidator::validateDate($date);
    }

    public function testValidateDateTimeSuccess()
    {
        $dateTime = '2021-05-05T18:00';
        $result = DateTimeValidator::validateDateTime($dateTime);
        $this->assertEquals($result, $dateTime);
    }

    public function testValidateDateTimeFailure()
    {
        $dateTime = '202139301';
        $this->expectException(\Exception::class);
        DateTimeValidator::validateDateTime($dateTime);
    }
}

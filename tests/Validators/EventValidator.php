<?php

use PHPUnit\Framework\TestCase;
use Portal\Validators\EventValidator;

class EventValidatorTest extends TestCase
{

    public function test_validTime_success() {
        $this->assertEquals(EventValidator::validTime('14:23'), true);
        $this->assertEquals(EventValidator::validTime('23:59'), true);
        $this->assertEquals(EventValidator::validTime('00:00'), true);
    }

    public function test_validTime_fail_invalidTimes() {
        $this->assertEquals(EventValidator::validTime('49:87'), false);
        $this->assertEquals(EventValidator::validTime('25:61'), false);
        $this->assertEquals(EventValidator::validTime('99:44'), false);
    }

    public function test_validTime_malform_fail() {
        $this->assertEquals(EventValidator::validTime('12-32'), false);
        $this->assertEquals(EventValidator::validTime('87.99'), false);
        $this->assertEquals(EventValidator::validTime('squid'), false);
    }

    public function test_validTime_malform_exception() {
        $this->expectException(TypeError::class);
        EventValidator::validTime(null);
    }

    public function test_startAfterEndTime_success_true() {
        $this->assertEquals(EventValidator::startAfterEndTime('16:23', '14:24'),true);
        $this->assertEquals(EventValidator::startAfterEndTime('00:34', '00:23'),true);
        $this->assertEquals(EventValidator::startAfterEndTime('22:21', '19:30'),true);
    }

    public function test_startAfterEndTime_success_false() {
        $this->assertEquals(EventValidator::startAfterEndTime('14:24', '16:24'),false);
        $this->assertEquals(EventValidator::startAfterEndTime('00:34', '00:56'),false);
        $this->assertEquals(EventValidator::startAfterEndTime('22:21', '23:30'),false);
    }

    public function test_startAfterEndTime_malform_string_casting() {
        $this->assertEquals(EventValidator::startAfterEndTime('ab123', 'zx432'),true);
        $this->assertEquals(EventValidator::startAfterEndTime('22abc21', '19iuouoi30'),true);
    }

    public function test_startAfterEndTime_malform_string_parameter() {
        $this->expectException(TypeError::class);
        $this->assertEquals(EventValidator::startAfterEndTime(new stdClass(), null),true);

    }

    public function test_dateNotInPast_success_true() {
        $this->assertEquals(EventValidator::dateNotInPast('2019-05-03'),true);
        $this->assertEquals(EventValidator::dateNotInPast('2021-04-28'),true);
        $this->assertEquals(EventValidator::dateNotInPast('3000-01-01'), true);
    }

    public function test_dateNotInPast_success_false() {
        $this->assertEquals(EventValidator::dateNotInPast('2013-05-03'),false);
        $this->assertEquals(EventValidator::dateNotInPast('2012-04-28'),false);
        $this->assertEquals(EventValidator::dateNotInPast('1000-01-01'), false);
    }

    public function test_dateNotInPast_malform_wrongInput_string() {
        $this->assertEquals(EventValidator::dateNotInPast('2013.05.03'),false);
        $this->assertEquals(EventValidator::dateNotInPast('2012 04 28'),false);
        $this->assertEquals(EventValidator::dateNotInPast('1000:01:01'), false);
    }

    public function test_dateNotInPast_malform_wrongInput_type() {
        $this->expectException(TypeError::class);
        EventValidator::dateNotInPast(new stdClass());
    }

    public function test_isFieldEmpty_success_true() {
        $location = ' ';
        $eventName = '         ';
        $this->assertEquals(EventValidator::isFieldEmpty($location, $eventName), true);
    }

    public function test_checkFieldNotEmpty_success_false() {
        $location = 'Mayden House';
        $eventName = 'Tasty Session';
        $this->assertEquals(EventValidator::isFieldEmpty($location, $eventName), false);
    }

    public function test_checkFieldNotEmpty_malform() {
        $this->expectException(TypeError::class);
        $location = null;
        $eventName = 4.5;
        EventValidator::isFieldEmpty($location, $eventName);
    }



}
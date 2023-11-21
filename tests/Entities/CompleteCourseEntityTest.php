<?php

namespace Tests\Entities;

use Portal\Entities\CompleteCourseEntity;
use Tests\TestCase;

class CompleteCourseEntityTest extends TestCase
{
    public function testSuccessGetTotalAvailableSpacesGivenNull()
    {
        $testEntity = new CompleteCourseEntity();
        $case = $testEntity->getTotalAvailableSpaces();
        $expected = 'N/A';
        $this->assertSame($expected, $case);
    }

    public function testSuccessGetSpacesTakenGivenNull()
    {
        $testEntity = new CompleteCourseEntity();
        $case = $testEntity->getSpacesTaken();
        $expected = 'N/A';
        $this->assertSame($expected, $case);
    }
}

<?php

namespace Tests\Controllers\API;

use Tests\TestCase;
use Portal\Controllers\API\StudentPasswordModalController;
use Portal\Models\ApplicantModel;

class StudentPasswordModalControllerTest extends TestCase
{

    public function testConstruct()
    {
        $applicantModel = $this->createMock(ApplicantModel::class);

        $case = new StudentPasswordModalController('password', $applicantModel);
        $expected = StudentPasswordModalController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
<?php

namespace Tests\Controllers\API;

use Tests\TestCase;
use Portal\Controllers\API\StudentPasswordController;
use Portal\Models\ApplicantModel;
use Portal\Models\RandomPasswordModel;

class StudentPasswordModalControllerTest extends TestCase
{

    public function testConstruct()
    {
        $applicantModel = $this->createMock(ApplicantModel::class);
        $password = 'freaky fish were here again';
        $case = new StudentPasswordController($password, $applicantModel);
        $expected = StudentPasswordController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

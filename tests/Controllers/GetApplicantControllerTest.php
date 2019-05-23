<?php

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;

use Portal\Controllers\GetApplicantController;
use Portal\Models\ApplicantModel;

class GetApplicantControllerTest extends TestCase
{
    public function testConstruct()
    {
        $applicantModel = $this->createMock(ApplicantModel::class);
        $case = new GetApplicantController($applicantModel);
        $expected = GetApplicantController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

<?php

namespace Tests\Controllers\API;

use Tests\TestCase;
use Portal\Controllers\API\GetApplicantController;
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

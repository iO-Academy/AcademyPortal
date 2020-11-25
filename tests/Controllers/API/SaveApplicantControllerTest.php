<?php

namespace Tests\Controllers\API;

use Tests\TestCase;
use Portal\Controllers\API\SaveApplicantController;
use Portal\Models\ApplicantModel;

class SaveApplicantControllerTest extends TestCase
{

    public function testConstruct()
    {
        $applicantModel = $this->createMock(ApplicantModel::class);

        $case = new SaveApplicantController($applicantModel);
        $expected = SaveApplicantController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

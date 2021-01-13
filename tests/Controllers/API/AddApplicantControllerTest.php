<?php

namespace Tests\Controllers\API;

use Tests\TestCase;
use Portal\Controllers\API\AddApplicantController;
use Portal\Models\ApplicantModel;

class AddApplicantControllerTest extends TestCase
{

    public function testConstruct()
    {
        $applicantModel = $this->createMock(ApplicantModel::class);

        $case = new AddApplicantController($applicantModel);
        $expected = AddApplicantController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

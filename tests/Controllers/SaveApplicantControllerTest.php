<?php

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\SaveApplicantController;
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

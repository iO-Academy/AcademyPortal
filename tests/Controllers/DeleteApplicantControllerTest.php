<?php

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\DeleteApplicantController;
use Portal\Models\ApplicantModel;

class SaveApplicantControllerTest extends TestCase
{

    public function testConstruct()
    {
        $applicantModel = $this->createMock(ApplicantModel::class);

        $case = new DeleteApplicantController($applicantModel);
        $expected = DeleteApplicantController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
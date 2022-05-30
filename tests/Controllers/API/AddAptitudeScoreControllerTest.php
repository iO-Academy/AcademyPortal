<?php

namespace Tests\Controllers\API;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\API\AddAptitudeScoreController;
use Portal\Models\ApplicantModel;

class AddAptitudeScoreControllerTest extends TestCase
{
    public function testConstruct()
    {
        $applicantModel = $this->createMock(ApplicantModel::class);

        $case = new AddAptitudeScoreController($applicantModel);
        $expected = AddAptitudeScoreController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

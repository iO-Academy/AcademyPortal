<?php

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\DeleteApplicantController;
use Portal\Models\ApplicantModel;
use Slim\http\Response;

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

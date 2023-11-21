<?php

namespace Tests\Controllers\API;

use Tests\TestCase;
use Slim\Views\PhpRenderer;
use Portal\Models\ApplicantModel;
use Portal\Controllers\API\LockApplicantFieldController;

class LockApplicantFieldControllerTest extends TestCase
{
    public function testConstruct()
    {
        $applicantModel = $this->createMock(ApplicantModel::class);
        $case = new LockApplicantFieldController($applicantModel);
        $expected = LockApplicantFieldController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

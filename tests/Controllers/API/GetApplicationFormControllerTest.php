<?php

namespace Tests\Controllers\API;

use Tests\TestCase;
use Portal\Controllers\API\GetApplicationFormController;
use Portal\Models\ApplicationFormModel;

class GetApplicationFormControllerTest extends TestCase
{
    public function testConstruct()
    {
        $stub = $this->createMock(ApplicationFormModel::class);

        $case = new GetApplicationFormController($stub);
        $expected = GetApplicationFormController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

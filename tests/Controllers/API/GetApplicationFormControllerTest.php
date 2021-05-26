<?php

namespace Tests\Controllers\API;

use Tests\TestCase;
use Portal\Controllers\API\GetApplicationFormController;
use Portal\Models\ApplicationFormModel;
use Portal\Models\EventModel;

class GetApplicationFormControllerTest extends TestCase
{
    public function testConstruct()
    {
        $stub = $this->createMock(ApplicationFormModel::class);
        $stub2 = $this->createMock(EventModel::class);

        $case = new GetApplicationFormController($stub, $stub2);
        $expected = GetApplicationFormController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

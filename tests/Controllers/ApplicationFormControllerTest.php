<?php

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\ApplicationFormController;
use Portal\Models\ApplicationFormModel;

class ApplicationFormControllerTest extends TestCase
{
    public function testConstruct()
    {
        $stub = $this->createMock(ApplicationFormModel::class);

        $case = new ApplicationFormController($stub);
        $expected = ApplicationFormController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

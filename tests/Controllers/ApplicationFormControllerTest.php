<?php

use PHPUnit\Framework\TestCase;
use Portal\Controllers\ApplicationFormController;
use Portal\Models\ApplicationFormModel;
use Portal\Models\CohortModel;

class ApplicationFormControllerTest extends TestCase
{
    function testConstruct()
    {
        $applicationFormModel = $this->createMock(ApplicationFormModel::class);
        $cohortModel = $this->createMock(CohortModel::class);

        $case = new ApplicationFormController($applicationFormModel, $cohortModel);
        $expected = ApplicationFormController::class;
        $this->assertInstanceOf($expected, $case);
    }
}


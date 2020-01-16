<?php

namespace Tests\Models;

use Tests\TestCase;
use Portal\Models\ApplicationFormModel;

class ApplicationFormModelTest extends TestCase
{
    public function testConstruct()
    {
        $db = $this->createMock(\PDO::class);
            $case = new ApplicationFormModel($db);
            $expected = ApplicationFormModel::class;
            $this->assertInstanceOf($expected, $case);
    }
}

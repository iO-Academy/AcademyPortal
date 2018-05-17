<?php

use PHPUnit\Framework\TestCase;
use Portal\Models\ApplicationFormModel;

class ApplicationFormModelTest extends TestCase
{
    function testConstruct()
    {
        $db = $this->createMock(\PDO::class);
            $case = new ApplicationFormModel($db);
            $expected = ApplicationFormModel::class;
            $this->assertInstanceOf($expected, $case);
    }
}
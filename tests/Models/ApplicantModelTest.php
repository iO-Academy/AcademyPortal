<?php

namespace Tests\Models;

use Tests\TestCase;
use Portal\Models\ApplicantModel;

class ApplicantModelTest extends TestCase
{
    public function testConstruct()
    {
        $db = $this->createMock(\PDO::class);
        $case = new ApplicantModel($db);
        $expected = ApplicantModel::class;

        $this->assertInstanceOf($expected, $case);
    }
}

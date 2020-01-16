<?php

namespace Tests\Models;

use Tests\TestCase;
use Portal\Models\HiringPartnerModel;

class HiringPartnerModelTest extends TestCase
{
    public function testConstruct()
    {
        $db = $this->createMock(\PDO::class);
        $case = new HiringPartnerModel($db);
        $expected = HiringPartnerModel::class;
        $this->assertInstanceOf($expected, $case);
    }
}

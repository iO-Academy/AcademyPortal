<?php

use PHPUnit\Framework\TestCase;
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

    public function testGetDropdownData()
    {
        $db = $this->createMock(\PDO::class);
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->method('fetchAll')->willReturn(true);
        $db->method('query')->willReturn($stmt);
        $hp = new HiringPartnerModel($db);
        $result = $hp->getDropdownData();
        $this->assertTrue($result);
    }
}
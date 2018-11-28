<?php
/**
 * Created by PhpStorm.
 * User: imogen
 * Date: 28/11/2018
 * Time: 10:10
 */

use PHPUnit\Framework\TestCase;
use Portal\Models\HiringPartnerModel;

class HiringPartnerModelTest extends TestCase
{

    public function testConstruct() {
        $db = $this->createMock(\PDO::class);
        $case = new HiringPartnerModel($db);
        $expected = HiringPartnerModel::class;

        $this->assertInstanceOf($expected, $case);
    }

    public function testGetDropdownData() {
        $db = $this->createMock(\PDO::class);
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->method('fetchAll')->willReturn(true);
        $db->method('query')->willReturn($stmt);
        $hp = new HiringPartnerModel($db);
        $result = $hp->getDropdownData();
        $this->assertTrue($result);
    }
}
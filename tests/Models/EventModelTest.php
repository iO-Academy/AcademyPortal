<?php

use PHPUnit\Framework\TestCase;
use Portal\Models\EventModel;

class EventModelTest extends TestCase
{
    public function testConstruct() {
        $db = $this->createMock(\PDO::class);
        $case = new EventModel($db);
        $expected = EventModel::class;
        $this->assertInstanceOf($expected, $case);
    }
    public function testGetDropdownData() {
        $db = $this->createMock(\PDO::class);
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->method('fetchAll')->willReturn(true);
        $db->method('query')->willReturn($stmt);
        $hp = new EventModel($db);
        $result = $hp->getDropdownData();
        $this->assertTrue($result);
    }
}
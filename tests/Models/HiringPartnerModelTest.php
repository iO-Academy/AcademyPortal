<?php

namespace Tests\Models;


use PHPUnit\Framework\TestCase;
use Portal\Entities\HiringPartnerEntity;
use Portal\Models\HiringPartnerModel;

class HiringPartnerModelTest Extends TestCase
{
    function testConstruct()
    {
        $mockDb = $this->createMock(\PDO::class);

        $case = new HiringPartnerModel($mockDb);
        $expected = HiringPartnerModel::class;
        $this->AssertInstanceOf($expected, $case);
    }

    function testInsertNewHiringPartnerToDbSuccess()
    {
        $mockHPEntity = $this->createMock(HiringPartnerEntity::class);
        $mockDb = $this->createMock(\PDO::class);
        $mockStmt = $this->createMock(\PDOStatement::class);

        $mockStmt->expects($this->exactly(6))->method('bindParam');
        $mockStmt->method('execute')->willReturn(true);

        $mockHPEntity->method('getCompanyName');
        $mockHPEntity->method('getSize');
        $mockHPEntity->method('getTechStack');
        $mockHPEntity->method('getPostcode');
        $mockHPEntity->method('getPhoneNo');
        $mockHPEntity->method('getUrl');

        $mockDb
            ->method('prepare')
            ->with("
            INSERT INTO `hiringPartners` (`companyName`, `size`, `techStack`, `postcode`, `phoneNo`, `url`) 
            VALUES (:companyName, :size, :techStack, :postcode, :phoneNo, :url);")
            ->willReturn($mockStmt);

        $hiringPartnerModel = new HiringPartnerModel($mockDb);
        $result = $hiringPartnerModel->insertNewHiringPartnerToDb($mockHPEntity);
        $this->assertTrue($result);
    }

    function testInsertNewHiringPartnerToDbMalformed()
    {
        $mockHPEntity = [];
        $mockDb = $this->createMock(\PDO::class);

        $hiringPartnerModel = new HiringPartnerModel($mockDb);

        $this->expectException(\TypeError::class);
        $hiringPartnerModel->insertNewHiringPartnerToDb($mockHPEntity);
    }
}
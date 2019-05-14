<?php

use PHPUnit\Framework\TestCase;
use Portal\Controllers\GetCompanySizeController;
use Portal\Models\HiringPartnerModel;


class GetCompanySizeControllerTest extends TestCase
{
    public function testConstructor()
    {
        $mock = $this->createMock(HiringPartnerModel::class);
        $case = new GetCompanySizeController($mock);
        $expected = GetCompanySizeController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
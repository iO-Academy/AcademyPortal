<?php

namespace Tests\Controllers;


use PHPUnit\Framework\TestCase;
use Portal\Controllers\AddHiringPartnerController;
use Portal\Models\HiringPartnerModel;
use Slim\Http\Request;
use Slim\Http\Response;

class AddHiringPartnerControllerTest extends TestCase
{

    public $eventData = [
        "companyName" => "Mayden Academy",
        "size" => "3",
        "techStack" => "PHP and JS",
        "postcode" => "E4 0LY",
        "phoneNo" => "0930183",
        "url" => "www.google.com"
    ];

    public $successData = [
        'success' => true,
        'msg' => 'New hiring partner Mayden Academy added to the database',
        'data' => []
    ];

    public $failureData = [
        'success' => false,
        'msg' => 'Hiring partner not registered.',
        'data' => []
    ];

        function testConstruct()
        {
            $mockHiringPartnerModel = $this->createMock(HiringPartnerModel::class);

            $case = new AddHiringPartnerController($mockHiringPartnerModel);
            $expected = AddHiringPartnerController::class;
            $this->assertInstanceOf($expected, $case);
        }

        function testFailConstruct()
        {
            $this->expectException(\TypeError::class);
            new AddHiringPartnerController('not a database');
        }

        function testInvoke_success()
        {
            $mockRequest = $this->createMock(Request::class);
            $mockResponse = $this->createMock(Response::class);

            $mockRequest->method('getParsedBody')->willReturn($this->eventData);

            $mockHiringPartnerModel = $this->createMock(HiringPartnerModel::class);
            $mockHiringPartnerModel->method('insertNewHiringPartnerToDb')->willReturn(true);

            $mockResponse
                ->method('withJson')
                ->with($this->successData, 200)
                ->willReturn(true);

            $addHPController = new AddHiringPartnerController($mockHiringPartnerModel);

            $result = $addHPController($mockRequest, $mockResponse);

            $this->assertTrue($result);
        }

        function testInvoke_failure()
        {
            $mockRequest = $this->createMock(Request::class);
            $mockResponse = $this->createMock(Response::class);

            $mockRequest->method('getParsedBody')->willReturn($this->eventData);

            $mockHiringPartnerModel = $this->createMock(HiringPartnerModel::class);
            $mockHiringPartnerModel->method('insertNewHiringPartnerToDb')->willReturn(false);

            $mockResponse
                ->method('withJson')
                ->with($this->failureData, 406)
                ->willReturn(true);

            $addHPController = new AddHiringPartnerController($mockHiringPartnerModel);

            $result = $addHPController($mockRequest, $mockResponse);

            $this->assertTrue($result);
        }

        function testInvoke_malformed()
        {
            $mockRequest = $this->createMock(Request::class);
            $mockResponse = $this->createMock(Response::class);

            $mockRequest->method('getParsedBody')->willReturn([]);

            $mockHiringPartnerModel = $this->createMock(HiringPartnerModel::class);
            $mockHiringPartnerModel->method('insertNewHiringPartnerToDb')->willReturn(false);

            $mockResponse
                ->method('withJson')
                ->with($this->failureData, 406)
                ->willReturn(true);

            $addHPController = new AddHiringPartnerController($mockHiringPartnerModel);

            $result = $addHPController($mockRequest, $mockResponse);

            $this->assertTrue($result);
        }
}
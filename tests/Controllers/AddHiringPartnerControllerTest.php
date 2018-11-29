<?php

namespace Tests\Controllers;


use PHPUnit\Framework\TestCase;
use Portal\Controllers\AddHiringPartnerController;
use Portal\Models\HiringPartnerModel;
use Slim\Http\Request;
use Slim\Http\Response;

class AddHiringPartnerControllerTest extends TestCase
{

    public $hiringPartnerData = [
        "companyName" => "Mayden Academy",
        "size" => "3",
        "techStack" => "PHP and JS",
        "postcode" => "E4 0LY",
        "phoneNo" => "0930183",
        "url" => "http://www.google.com"
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

    public $eventSizeIds = [
        ['id' => '1'],
        ['id' => '2'],
        ['id' => '3'],
        ['id' => '4'],
        ['id' => '5'],
        ['id' => '6']
    ];

    function testConstructSuccess()
    {
        $mockHiringPartnerModel = $this->createMock(HiringPartnerModel::class);

        $case = new AddHiringPartnerController($mockHiringPartnerModel);
        $expected = AddHiringPartnerController::class;
        $this->assertInstanceOf($expected, $case);
    }

    function testConstructFail()
    {
        $this->expectException(\TypeError::class);
        new AddHiringPartnerController('not a database');
    }

    function testInvokeSuccess()
    {
        $mockRequest = $this->createMock(Request::class);
        $mockResponse = $this->createMock(Response::class);

        $mockRequest->method('getParsedBody')->willReturn($this->hiringPartnerData);

        $mockHiringPartnerModel = $this->createMock(HiringPartnerModel::class);
        $mockHiringPartnerModel->method('insertNewHiringPartnerToDb')->willReturn(true);
        $mockHiringPartnerModel->method('getCompanySizeBracketIds')->willReturn($this->eventSizeIds);


        $mockResponse
            ->method('withJson')
            ->with($this->successData, 200)
            ->willReturn(true);

        $addHPController = new AddHiringPartnerController($mockHiringPartnerModel);

        $result = $addHPController($mockRequest, $mockResponse);

        $this->assertTrue($result);
    }

    function testInvokeFailure_insertToDBReturnFalse()
    {
        $mockRequest = $this->createMock(Request::class);
        $mockResponse = $this->createMock(Response::class);

        $mockRequest->method('getParsedBody')->willReturn($this->hiringPartnerData);

        $mockHiringPartnerModel = $this->createMock(HiringPartnerModel::class);
        $mockHiringPartnerModel->method('getCompanySizeBracketIds')->willReturn($this->eventSizeIds);
        $mockHiringPartnerModel->method('insertNewHiringPartnerToDb')->willReturn(false);

        $mockResponse
            ->method('withJson')
            ->with($this->failureData, 406)
            ->willReturn(true);

        $addHPController = new AddHiringPartnerController($mockHiringPartnerModel);

        $result = $addHPController($mockRequest, $mockResponse);

        $this->assertTrue($result);
    }

    function testInvokeFailure_insertToDBThrowException()
    {
        $mockRequest = $this->createMock(Request::class);
        $mockResponse = $this->createMock(Response::class);

        $mockRequest->method('getParsedBody')->willReturn($this->hiringPartnerData);

        $mockHiringPartnerModel = $this->createMock(HiringPartnerModel::class);
        $mockHiringPartnerModel->method('getCompanySizeBracketIds')->willReturn($this->eventSizeIds);
        $mockHiringPartnerModel->method('insertNewHiringPartnerToDb')->willThrowException(new \Exception());

        $mockResponse
            ->method('withJson')
            ->with($this->failureData, 500)
            ->willReturn(true);

        $addHPController = new AddHiringPartnerController($mockHiringPartnerModel);

        $result = $addHPController($mockRequest, $mockResponse);

        $this->assertTrue($result);
    }

    function testInvokeMalformed_emptyPostData()
    {
        $mockRequest = $this->createMock(Request::class);
        $mockResponse = $this->createMock(Response::class);

        $mockRequest->method('getParsedBody')->willReturn([]);

        $mockHiringPartnerModel = $this->createMock(HiringPartnerModel::class);
        $mockHiringPartnerModel->method('getCompanySizeBracketIds')->willReturn($this->eventSizeIds);
        $mockHiringPartnerModel->method('insertNewHiringPartnerToDb')->willReturn(false);

        $mockResponse
            ->method('withJson')
            ->with($this->failureData, 406)
            ->willReturn(true);

        $addHPController = new AddHiringPartnerController($mockHiringPartnerModel);

        $result = $addHPController($mockRequest, $mockResponse);

        $this->assertTrue($result);
    }

    function testInvokeMalformed_invalidCompanySize()
    {
        $mockRequest = $this->createMock(Request::class);
        $mockResponse = $this->createMock(Response::class);

        $HpData = $this->hiringPartnerData;
        $HpData['size'] = 8;

        $mockRequest->method('getParsedBody')->willReturn($HpData);

        $mockHiringPartnerModel = $this->createMock(HiringPartnerModel::class);
        $mockHiringPartnerModel->method('getCompanySizeBracketIds')->willReturn($this->eventSizeIds);
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
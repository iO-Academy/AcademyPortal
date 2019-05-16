<?php

use PHPUnit\Framework\TestCase;
use Portal\Controllers\DisplayHiringPartnerContactPageController;
use Portal\Models\HiringPartnerContactsModel;
use Portal\Models\HiringPartnerModel;
use Slim\Views\PhpRenderer;

class DisplayHiringPartnerContactPageControllerTest extends TestCase
{

	public function testConstruct()
	{
		$mockRender = $this->createMock(PhpRenderer::class);
		$mockHiringPartnerModel = $this->createMock(HiringPartnerModel::class);
		$mockContactModel = $this->createMock(HiringPartnerContactsModel::class);
		$case = new DisplayHiringPartnerContactPageController($mockRender, $mockHiringPartnerModel, $mockContactModel);
		$expected = DisplayHiringPartnerContactPageController::class;
		$this->assertInstanceOf($expected, $case);
	}
}
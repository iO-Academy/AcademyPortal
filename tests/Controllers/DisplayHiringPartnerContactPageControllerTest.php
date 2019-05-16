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
		$case = new DisplayHiringPartnerContactPageController($mockRender, $mockHiringPartnerModel);
		$expected = DisplayHiringPartnerContactPageController::class;
		$this->assertInstanceOf($expected, $case);
	}
}
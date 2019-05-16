<?php

use PHPUnit\Framework\TestCase;
use Portal\Controllers\DisplayHiringPartnerContactPageController;
use Slim\Views\PhpRenderer;

class DisplayHiringPartnerContactPageControllerTest extends TestCase
{

	public function testConstruct()
	{
		$mockRender = $this->createMock(PhpRenderer::class);
		$case = new DisplayHiringPartnerContactPageController($mockRender);
		$expected = DisplayHiringPartnerContactPageController::class;
		$this->assertInstanceOf($expected, $case);
	}
}
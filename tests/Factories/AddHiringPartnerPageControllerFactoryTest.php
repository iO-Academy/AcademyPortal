<?php

use PHPUnit\Framework\TestCase;
use Portal\Factories\AddHiringPartnerPageControllerFactory;
use Portal\Controllers\AddHiringPartnerPageController;
use Slim\Views\PhpRenderer;
use Portal\Models\HiringPartnerModel;
use Psr\Container\ContainerInterface;

class AddHiringPartnerPageControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $renderer = $this->createMock(PhpRenderer::class);
        $hiringPartnerModel = $this->createMock(HiringPartnerModel::class);

        $container->renderer = $renderer;
        $container->HiringPartnerModel = $hiringPartnerModel;

        $factory = new AddHiringPartnerPageControllerFactory();

        $case = $factory($container);
        $expected = AddHiringPartnerPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
<?php

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Portal\Models\HiringPartnerContactsModel;
use Portal\Controllers\AssignMainContactController;
use Portal\Factories\AssignMainContactControllerFactory;

class AssignMainContactControllerFactoryTest extends TestCase {

    function testAssignMainContactControllerFactory()
    {
        $container = $this->createMock(ContainerInterface::class);
        $hiringPartnerContactsModel = $this->createMock(HiringPartnerContactsModel::class);
        $container->method('get')->willReturn($hiringPartnerContactsModel);
        $factory = new AssignMainContactControllerFactory();
        $case = $factory($container);
        $expected = AssignMainContactController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
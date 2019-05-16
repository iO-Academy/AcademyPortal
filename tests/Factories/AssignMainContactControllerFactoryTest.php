<?php

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class AssignMainContactControllerFactoryTest extends TestCase {

    function testAssignMainContactControllerFactory()
    {
        $container = $this->createMock(ContainerInterface::class);
        $hiringPartnerContactsModel = $this->createMock(\Portal\Models\HiringPartnerContactsModel::class);
        $container->method('get')->willReturn($hiringPartnerContactsModel);
        $factory = new \Portal\Factories\AssignMainContactControllerFactory();
        $case = $factory($container);
        $expected = \Portal\Factories\AssignMainContactControllerFactory::class;
        $this->assertInstanceOf($expected, $case);
    }
}
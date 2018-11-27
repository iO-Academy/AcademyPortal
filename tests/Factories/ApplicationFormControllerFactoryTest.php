<?php

use PHPUnit\Framework\TestCase;
use Portal\Factories\ApplicationFormControllerFactory;
use Portal\Controllers\ApplicationFormController;
use Portal\Models\ApplicationFormModel;
use Psr\Container\ContainerInterface;

class ApplicationFormControllerFactoryTest extends TestCase
{
    function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $applicationForm = $this->createMock(ApplicationFormModel::class);
        $container->method('get')
                         ->willReturn($applicationForm);

        $factory = new ApplicationFormControllerFactory;
        $case = $factory($container);
        $expected = ApplicationFormController::class;
        $this->assertInstanceOf($expected, $case);
    }

}


<?php

namespace Tests\Factories\Controllers\API;

use Tests\TestCase;
use Portal\Factories\Controllers\API\ApplicationFormControllerFactory;
use Portal\Controllers\API\ApplicationFormController;
use Portal\Models\ApplicationFormModel;
use Psr\Container\ContainerInterface;

class ApplicationFormControllerFactoryTest extends TestCase
{
    public function testInvoke()
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

<?php

namespace Tests\Factories\Controllers\API;

use Tests\TestCase;
use Portal\Factories\Controllers\API\GetApplicationFormControllerFactory;
use Portal\Controllers\API\GetApplicationFormController;
use Portal\Models\ApplicationFormModel;
use Psr\Container\ContainerInterface;

class GetApplicationFormControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $applicationForm = $this->createMock(ApplicationFormModel::class);
        $container->method('get')
                         ->willReturn($applicationForm);

        $factory = new GetApplicationFormControllerFactory();
        $case = $factory($container);
        $expected = GetApplicationFormController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

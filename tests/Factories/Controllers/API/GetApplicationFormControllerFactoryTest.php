<?php

namespace Tests\Factories\Controllers\API;

use Tests\TestCase;
use Portal\Factories\Controllers\API\GetApplicationFormControllerFactory;
use Portal\Controllers\API\GetApplicationFormController;
use Portal\Models\ApplicationFormModel;
use Portal\Models\EventModel;
use Psr\Container\ContainerInterface;

class GetApplicationFormControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $applicationForm = $this->createMock(ApplicationFormModel::class);
        $eventModel = $this->createMock(EventModel::class);
        $container->expects($this->at(0))
            ->method('get')
            ->with($this->equalTo('ApplicationFormModel'))
            ->willReturn($applicationForm);
        $container->expects($this->at(1))
            ->method('get')
            ->with($this->equalTo('EventModel'))
            ->willReturn($eventModel);

        $factory = new GetApplicationFormControllerFactory();
        $case = $factory($container);
        $expected = GetApplicationFormController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

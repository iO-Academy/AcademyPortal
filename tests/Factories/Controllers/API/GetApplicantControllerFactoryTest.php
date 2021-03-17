<?php

namespace Tests\Factories\Controllers\API;

use Tests\TestCase;
use Portal\Factories\Controllers\API\GetApplicantControllerFactory;
use Portal\Models\ApplicantModel;
use Portal\Controllers\API\GetApplicantController;
use Psr\Container\ContainerInterface;

class GetApplicantControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $applicationModel = $this->createMock(ApplicantModel::class);
        $container->method('get')
            ->willReturn($applicationModel);

        $factory = new GetApplicantControllerFactory();
        $case = $factory($container);
        $expected = GetApplicantController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

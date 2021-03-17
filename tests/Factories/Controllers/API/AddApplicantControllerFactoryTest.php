<?php

namespace Tests\Factories\Controllers\API;

use Tests\TestCase;
use Portal\Models\ApplicantModel;
use Psr\Container\ContainerInterface;
use Portal\Controllers\API\AddApplicantController;
use Portal\Factories\Controllers\API\AddApplicantControllerFactory;

class AddApplicantControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $applicant = $this->createMock(ApplicantModel::class);
        $container->method('get')
            ->willReturn($applicant);

        $factory = new AddApplicantControllerFactory();
        $case = $factory($container);
        $expected = AddApplicantController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

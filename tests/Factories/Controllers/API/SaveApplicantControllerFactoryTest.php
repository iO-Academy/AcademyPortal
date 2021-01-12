<?php

namespace Tests\Factories\Controllers\API;

use Tests\TestCase;
use Portal\Models\ApplicantModel;
use Psr\Container\ContainerInterface;
use Portal\Controllers\API\SaveApplicantController;
use Portal\Factories\Controllers\API\SaveApplicantControllerFactory;

class SaveApplicantControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $applicant = $this->createMock(ApplicantModel::class);
        $container->method('get')
            ->willReturn($applicant);

        $factory = new SaveApplicantControllerFactory;
        $case = $factory($container);
        $expected = SaveApplicantController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

<?php

namespace Tests\Factories;

use PHPUnit\Framework\TestCase;
use Portal\Models\ApplicantModel;
use Psr\Container\ContainerInterface;
use Portal\Controllers\SaveApplicantController;
use Portal\Factories\SaveApplicantControllerFactory;

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

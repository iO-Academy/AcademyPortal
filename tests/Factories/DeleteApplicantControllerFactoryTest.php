<?php

namespace Tests\Factories;

use PHPUnit\Framework\TestCase;
use Portal\Models\ApplicantModel;
use Psr\Container\ContainerInterface;
use Portal\Controllers\DeleteApplicantController;
use Portal\Factories\DeleteApplicantControllerFactory;

class DeleteApplicantControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $applicant = $this->createMock(ApplicantModel::class);
        $container->method('get')
            ->willReturn($applicant);

        $factory = new DeleteApplicantControllerFactory;
        $case = $factory($container);
        $expected = DeleteApplicantController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

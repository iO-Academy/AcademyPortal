<?php

namespace Tests\Factories\Controllers\API;

use Portal\Models\RandomPasswordModel;
use Tests\TestCase;
use Portal\Models\ApplicantModel;
use Psr\Container\ContainerInterface;
use Portal\Controllers\API\StudentPasswordModalController;
use Portal\Factories\Controllers\API\StudentPasswordModalControllerFactory;

class StudentPasswordModalControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $password = $this->createMock(RandomPasswordModel::class);
        $applicant = $this->createMock(ApplicantModel::class);
        $container->method('get')
            ->willReturn($password, $applicant);

        $factory = new StudentPasswordModalControllerFactory();
        $case = $factory($container);
        $expected = StudentPasswordModalController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
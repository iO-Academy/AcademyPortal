<?php

namespace Tests\Factories\Controllers\API;

use Portal\Models\RandomPasswordModel;
use Tests\TestCase;
use Portal\Models\ApplicantModel;
use Psr\Container\ContainerInterface;
use Portal\Controllers\API\StudentPasswordController;
use Portal\Factories\Controllers\API\StudentPasswordControllerFactory;

class StudentPasswordControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $password = 'freaky fish were here';
        $applicant = $this->createMock(ApplicantModel::class);
        $container->method('get')
            ->willReturn($password, $applicant);

        $factory = new StudentPasswordControllerFactory();
        $case = $factory($container);
        $expected = StudentPasswordController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

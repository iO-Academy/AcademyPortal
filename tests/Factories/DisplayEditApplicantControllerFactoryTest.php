<?php


namespace Tests\Factories;

use Portal\Controllers\FrontEnd\DisplayEditApplicantController;
use Portal\Factories\DisplayEditApplicantControllerFactory;
use Portal\Models\ApplicantModel;
use Portal\Models\StageModel;
use Psr\Container\ContainerInterface;
use Tests\TestCase;

class DisplayEditApplicantControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $stage = $this->createMock(StageModel::class);
        $applicant = $this->createMock(ApplicantModel::class);
        $container->method('get')
            ->willReturn($stage, $applicant);

        $factory = new DisplayEditApplicantControllerFactory;
        $case = $factory($container);
        $expected = DisplayEditApplicantController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

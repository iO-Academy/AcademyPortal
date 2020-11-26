<?php


namespace Tests\Factories;

use Portal\Controllers\FrontEnd\DisplayEditApplicantController;
use Portal\Factories\DisplayEditApplicantControllerFactory;
use Portal\Models\ApplicantModel;
use Portal\Models\StageModel;
use Psr\Container\ContainerInterface;
use Slim\Views\PhpRenderer;
use Tests\TestCase;

class DisplayEditApplicantControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $renderer = $this->createMock(PhpRenderer::class);
        $container = $this->createMock(ContainerInterface::class);
        $stage = $this->createMock(StageModel::class);
        $applicant = $this->createMock(ApplicantModel::class);
        $container->method('get')
            ->with(['StageModel'])
            ->willReturn($stage);
        $container->method('get')
            ->with(['ApplicantModel'])
            ->willReturn($applicant);
        $container->method('get')
            ->with(['renderer'])
            ->willReturn($renderer);

        $factory = new DisplayEditApplicantControllerFactory;
        $case = $factory($container);
        $expected = DisplayEditApplicantController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

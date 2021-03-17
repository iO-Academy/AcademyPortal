<?php

namespace Tests\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\EditApplicantPageController;
use Portal\Factories\Controllers\FrontEnd\EditApplicantPageControllerFactory;
use Portal\Models\ApplicantModel;
use Portal\Models\StageModel;
use Psr\Container\ContainerInterface;
use Slim\Views\PhpRenderer;
use Tests\TestCase;

class EditApplicantPageControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $renderer = $this->createMock(PhpRenderer::class);
        $container = $this->createMock(ContainerInterface::class);
        $stage = $this->createMock(StageModel::class);
        $applicant = $this->createMock(ApplicantModel::class);
        $container->expects($this->at(0))
            ->method('get')
            ->with($this->equalTo('renderer'))
            ->willReturn($renderer);
        $container->expects($this->at(1))
            ->method('get')
            ->with($this->equalTo('ApplicantModel'))
            ->willReturn($applicant);
        $container->expects($this->at(2))
            ->method('get')
            ->with($this->equalTo('StageModel'))
            ->willReturn($stage);


        $factory = new EditApplicantPageControllerFactory();
        $case = $factory($container);
        $expected = EditApplicantPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

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
        $container->method('get')
            ->withConsecutive(
                [$this->equalTo('renderer')],
                [$this->equalTo('ApplicantModel')],
                [$this->equalTo('StageModel')]
            )
            ->willReturnOnConsecutiveCalls($renderer, $applicant, $stage);

        $factory = new EditApplicantPageControllerFactory();
        $case = $factory($container);
        $expected = EditApplicantPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

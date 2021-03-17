<?php

namespace Tests\Factories\Controllers\API;

use Portal\Controllers\API\EditApplicantStageController;
use Portal\Factories\Controllers\API\EditApplicantStageControllerFactory;
use Portal\Models\ApplicantModel;
use Portal\Models\StageModel;
use Psr\Container\ContainerInterface;
use Tests\TestCase;

class EditApplicantStageControllerFactoryTest extends TestCase
{

    /**
     * Success test for __invoke() method on EditApplicantStageControllerFactory class.
     */

    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $stage = $this->createMock(StageModel::class);
        $applicant = $this->createMock(ApplicantModel::class);
        $container->method('get')
            ->willReturn($stage, $applicant);

        $factory = new EditApplicantStageControllerFactory();
        $case = $factory($container);
        $expected = EditApplicantStageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

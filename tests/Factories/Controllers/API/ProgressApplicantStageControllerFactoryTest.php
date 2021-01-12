<?php


namespace Tests\Factories\Controllers\API;

use Portal\Controllers\API\ProgressApplicantStageController;
use Portal\Factories\Controllers\API\ProgressApplicantStageControllerFactory;
use Portal\Models\ApplicantModel;
use Portal\Models\StageModel;
use Psr\Container\ContainerInterface;
use Tests\TestCase;

class ProgressApplicantStageControllerFactoryTest extends TestCase
{

    /**
     * Success test for __invoke() method on ProgressApplicantStageControllerFactory class.
     */

    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $stage = $this->createMock(StageModel::class);
        $applicant = $this->createMock(ApplicantModel::class);
        $container->method('get')
            ->willReturn($stage, $applicant);

        $factory = new ProgressApplicantStageControllerFactory;
        $case = $factory($container);
        $expected = ProgressApplicantStageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
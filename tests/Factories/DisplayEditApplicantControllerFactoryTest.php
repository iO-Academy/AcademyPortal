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
            ->willReturn($stage, $applicant, $renderer);

        $factory = new DisplayEditApplicantControllerFactory;
        $case = $factory($container);
        $expected = DisplayEditApplicantController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
// 1) Tests\Factories\DisplayEditApplicantControllerFactoryTest::testInvoke
//TypeError: Argument 2 passed to Portal\Controllers\FrontEnd\DisplayEditApplicantController::__construct() must be an instance of Portal\Models\StageModel, null given, called in /var/www/html/src/Factories/DisplayEditApplicantControllerFactory.php on line 16
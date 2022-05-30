<?php

namespace Tests\Factories\Controllers\API;

use Portal\Controllers\API\AddAptitudeScoreController;
use Portal\Factories\Controllers\API\AddAptitudeScoreControllerFactory;
use Portal\Models\ApplicantModel;
use Psr\Container\ContainerInterface;
use Tests\TestCase;

class AddAptitudeScoreControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $model = $this->createMock(ApplicantModel::class);
        $container->method('get')
            ->willReturn($model);

        $factory = new AddAptitudeScoreControllerFactory();
        $case = $factory($container);
        $expected = AddAptitudeScoreController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

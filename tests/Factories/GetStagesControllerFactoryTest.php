<?php

namespace Tests\Factories;

use PHPUnit\Framework\TestCase;
use Portal\Models\StageModel;
use Psr\Container\ContainerInterface;
use Portal\Controllers\API\GetStagesController;
use Portal\Factories\GetStagesControllerFactory;

class GetStagesControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $stage = $this->createMock(StageModel::class);
        $container->method('get')
            ->willReturn($stage);

        $factory = new GetStagesControllerFactory;
        $case = $factory($container);
        $expected = GetStagesController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

<?php

namespace Tests\Factories\Controllers\API;

use PHPUnit\Framework\TestCase;
use Portal\Models\StageModel;
use Psr\Container\ContainerInterface;
use Portal\Controllers\API\DeleteStageController;
use Portal\Factories\Controllers\API\DeleteStageControllerFactory;

class DeleteStageControllerFactoryTest extends TestCase
{
    /**
     * Success test for __invoke() method on DeleteStageControllerFactory class.
     */
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $stage = $this->createMock(StageModel::class);
        $container->method('get')
            ->willReturn($stage);

        $factory = new DeleteStageControllerFactory();
        $case = $factory($container);
        $expected = DeleteStageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

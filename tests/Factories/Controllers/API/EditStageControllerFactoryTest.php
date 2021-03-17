<?php

namespace Tests\Factories\Controllers\API;

use PHPUnit\Framework\TestCase;
use Portal\Models\StageModel;
use Psr\Container\ContainerInterface;
use Portal\Controllers\API\EditStageController;
use Portal\Factories\Controllers\API\EditStageControllerFactory;

class EditStageControllerFactoryTest extends TestCase
{
    /**
     * Success test for __invoke() method on EditStageControllerFactory class.
     */
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $stage = $this->createMock(StageModel::class);
        $container->method('get')
            ->willReturn($stage);

        $factory = new EditStageControllerFactory();
        $case = $factory($container);
        $expected = EditStageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

<?php

namespace Tests\Factories\Models;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Portal\Factories\Models\StageModelFactory;
use Portal\Models\StageModel;

class StageModelFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $db = $this->createMock(\PDO::class);
        $container->method('get')
            ->willReturn($db);
        $factory = new StageModelFactory();
        $case = $factory($container);
        $expected = StageModel::class;
        $this->assertInstanceOf($expected, $case);
    }
}

<?php


namespace Tests\Factories;

use PHPUnit\Framework\TestCase;
use Portal\Factories\CohortModelFactory;
use Portal\Models\CohortModel;
use Psr\Container\ContainerInterface;

class CohortModelFactoryTest extends TestCase
{
    function testInvoke()
    {
        $db = $this->createMock(\PDO::class);
        $container = $this->createMock(ContainerInterface::class);
        $container->method('get')
            ->willReturn($db);

        $factory = new CohortModelFactory();
        $case = $factory($container);
        $expected = CohortModel::class;
        $this->assertInstanceOf($expected, $case);
    }

}
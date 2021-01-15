<?php

namespace Tests\Factories\Models;

use Tests\TestCase;
use Psr\Container\ContainerInterface;
use Portal\Factories\Models\CourseModelFactory;
use Portal\Models\CourseModel;

class CourseModelFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $db = $this->createMock(\PDO::class);
        $container->method('get')
            ->willReturn($db);
        $factory = new CourseModelFactory();
        $case = $factory($container);
        $expected = CourseModel::class;
        $this->assertInstanceOf($expected, $case);
    }
}

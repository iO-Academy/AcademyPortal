<?php

namespace Tests\Factories\Models;

use Tests\TestCase;
use Portal\Factories\Models\ApplicationFormModelFactory;
use Portal\Models\ApplicationFormModel;
use Psr\Container\ContainerInterface;

class ApplicationFormModelFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $db = $this->createMock(\PDO::class);
        $container = $this->createMock(ContainerInterface::class);
        $container->method('get')
            ->willReturn($db);

        $factory = new ApplicationFormModelFactory();
        $case = $factory($container);
        $expected = ApplicationFormModel::class;
        $this->assertInstanceOf($expected, $case);
    }
}

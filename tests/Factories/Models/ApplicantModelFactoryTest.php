<?php

namespace Tests\Factories\Models;

use Psr\Container\ContainerInterface;
use Tests\TestCase;
use Portal\Factories\Models\ApplicantModelFactory;
use Portal\Models\ApplicantModel;

class ApplicantModelFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $db = $this->createMock(\PDO::class);
        $container = $this->createMock(ContainerInterface::class);
        $container->method('get')
            ->willReturn($db);

        $factory = new ApplicantModelFactory();
        $case = $factory($container);
        $expected = ApplicantModel::class;
        $this->assertInstanceOf($expected, $case);
    }
}

<?php

namespace Test\Factories;

use PHPUnit\Framework\TestCase;
use Portal\Factories\CreateStageControllerFactory;

class CreateStageControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $factory = new CreateStageControllerFactory();
        $expected = CreateStageControllerFactory::class;
        $this->assertInstanceOf($expected, $factory);
    }
}

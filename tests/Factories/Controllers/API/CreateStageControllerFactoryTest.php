<?php

namespace Tests\Factories\Controllers\API;

use PHPUnit\Framework\TestCase;
use Portal\Factories\Controllers\API\CreateStageControllerFactory;

class CreateStageControllerFactoryTest extends TestCase
{
    public function testSuccessInvoke()
    {
        $factory = new CreateStageControllerFactory();
        $expected = CreateStageControllerFactory::class;
        $this->assertInstanceOf($expected, $factory);
    }
}

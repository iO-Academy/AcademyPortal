<?php

namespace Tests\Factories\Controllers\API;

use PHPUnit\Framework\TestCase;
use Portal\Factories\Controllers\API\AddStageControllerFactory;

class CreateStageControllerFactoryTest extends TestCase
{
    public function testSuccessInvoke()
    {
        $factory = new AddStageControllerFactory();
        $expected = AddStageControllerFactory::class;
        $this->assertInstanceOf($expected, $factory);
    }
}

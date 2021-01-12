<?php

namespace Tests\Factories\Controllers\API;

use Tests\TestCase;
use Portal\Factories\Controllers\API\CreateHiringPartnerControllerFactory;

class CreateHiringPartnerControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $factory = new CreateHiringPartnerControllerFactory();
        $expected = CreateHiringPartnerControllerFactory::class;
        $this->assertInstanceOf($expected, $factory);
    }
}

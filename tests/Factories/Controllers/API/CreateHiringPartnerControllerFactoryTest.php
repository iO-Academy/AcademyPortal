<?php

namespace Tests\Factories\Controllers\API;

use Tests\TestCase;
use Portal\Factories\Controllers\API\AddHiringPartnerControllerFactory;

class CreateHiringPartnerControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $factory = new AddHiringPartnerControllerFactory();
        $expected = AddHiringPartnerControllerFactory::class;
        $this->assertInstanceOf($expected, $factory);
    }
}

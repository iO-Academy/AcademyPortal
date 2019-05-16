<?php

use PHPUnit\Framework\TestCase;
use Portal\Factories\CreateHiringPartnerControllerFactory;

class CreateHiringPartnerControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $factory = new CreateHiringPartnerControllerFactory();
        $expected = CreateHiringPartnerControllerFactory::class;
        $this->assertInstanceOf($expected, $factory);
    }
}
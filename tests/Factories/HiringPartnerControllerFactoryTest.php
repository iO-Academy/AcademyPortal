<?php

use PHPUnit\Framework\TestCase;
use Portal\Factories\HiringPartnerControllerFactory;

class HiringPartnerControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $factory = new HiringPartnerControllerFactory();
        $expected = HiringPartnerControllerFactory::class;
        $this->assertInstanceOf($expected, $factory);
    }
}
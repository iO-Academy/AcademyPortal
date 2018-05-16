<?php

use PHPUnit\Framework\TestCase;
use Portal\Factories\AdminControllerFactory;
use Slim\Views\PhpRenderer;

class AdminControllerFactoryTest extends TestCase
{
    function testInvoke()
    {
        $stub = $this->createMock(PhpRenderer::class);

        $case = new AdminControllerFactory($stub);
        $expected = AdminControllerFactory::class;
        $this->assertInstanceOf($expected, $case);
    }
}
